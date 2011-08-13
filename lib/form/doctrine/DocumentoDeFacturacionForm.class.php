<?php

/*************************************************
  * NOMBRE: DocumentoDeFacturacionForm.class.php
  * DESCRIPCION: Clase que invoca a los formularios usados para ingreso de datos,
                 de documentos de facturacion, se  encuentran mapeados a los descrito en el archivo schema.yml
  * FECHA DE CREACION: 10-06-2011
  * AUTOR: Ronny Andrade Parra, Jaime Castells Pérez
   **************************************************/
class DocumentoDeFacturacionForm extends BaseDocumentoDeFacturacionForm
{
    /*************************************************
    *Nombre: configure()
    *Parametros:

    *Descripción: Se realizan personalizaciones a los formularios generados por
                  defecto por el framework. Se establecen labels para los campos,
                  se cambia el tipo de widget de acuerdo a las necesidades se deshabilita campos
                  se establecen atributos de los widgets, que a la larga se convertiran en
                  tags de html.

                  Se embeben un formulario de cliente y 10 formularios de detalle de documento.
    * Autor: Ronny Andrade Parra, José Sumba Zhongor
 **************************************************/

  public function configure()
  {
       unset(
                $this['created_at'], $this['updated_at']
        );
       $this->widgetSchema['doc_responsable'] = new sfWidgetFormInputHidden();
       $this->widgetSchema['doc_tipo'] = new sfWidgetFormInputHidden();
       $this->widgetSchema['doc_cliente_id'] = new sfWidgetFormInputHidden();
       $this->widgetSchema['doc_fecha_emision']= new sfWidgetFormInput();

        $this->widgetSchema['doc_proveedor_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'query' => Doctrine_Query::create()->select('*')->from('Proveedor')->where('prv_estado!=-1'), 'add_empty' => false));

       $this->widgetSchema->setLabels(array(
           'doc_fecha_emision' => 'Fecha de Emisión',
           'doc_codigo' => 'Código',
           'doc_sub_total' => 'Subtotal',
           'doc_total_documento' => 'Total',
           'doc_fecha_emision' => 'Fecha Emisión',
           'doc_iva' => 'IVA 12%',

       ));
//       $this->setValidators(array('doc_codigo'=> new sfValidatorDoctrineUnique(
//                            array( 'model' => 'DocumentoDeFacturacion',
//                                   'column' => 'doc_codigo',
//                                   'throw_global_error' => true),
//                            array('invalid' => "!Código Ingresado ya Existe¡")
//                          )
//                         ));

      $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
              new sfValidatorDoctrineUnique(array('model' => 'DocumentoDeFacturacion', 'column' => array('doc_codigo')),array('invalid' => 'Código Ingresado Anteriormente')),
      ))
    );
       $this->getWidget('doc_sub_total')->setAttribute('readonly','readonly');
       $this->getWidget('doc_total_documento')->setAttribute('readonly','readonly');
       $this->getWidget('doc_iva')->setAttribute('readonly','readonly');
       $this->getWidget('doc_fecha_emision')->setAttribute('readonly','readonly');

        // Embebemos el formulario de Cliente
        $sub_form = new sfForm();
        $cliente_form = new ClienteForm($this->getObject()->Cliente);
        $sub_form->embedForm(0, $cliente_form);
        $this->embedForm('cliente', $sub_form);

       //Embebemos 10 Detalles de Factura
      $i=1;
        for($i=1;$i<=10;$i++){
            $sub_form = new sfForm();
            $detalle_docu_form = new DetalleDocumentoDeFacturacionForm(null,array("DocumentoDeFacturacion",$this->getObject()));
           // $sub_form->embedForm($i, $detalle_docu_form);
            $this->embedForm('detalle_'.$i, $detalle_docu_form);
       }
  }


//  protected function doSave($con = null)
//      {
//         // $arr=$this->getEmbeddedForms();
//          $ar=$this->getEmbeddedForm('cliente');
//          echo $ar->getObject()->setDetDocumentoId(1);
//          //die();
//
//
////        $alg=$this->getEmbeddedForm('detalle_1')->getEmbeddedForms();
////        echo $alg[0];
////        die();
//
//        return parent::doSave($con);
//      }

}