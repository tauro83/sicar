<?php

/*************************************************
  * NOMBRE: ProductoForm.class.php
  * DESCRIPCION: Clase que invoca a los formularios usados para ingreso de datos,
                 de productos encuentran mapeados a los descrito en el archivo schema.yml
  * FECHA DE CREACION: 10-06-2011
  * AUTOR: Jhonny Pincay Nieves, José Sumba Zhongor
   **************************************************/
class ProductoForm extends BaseProductoForm
{
    /*************************************************
    *Nombre: configure()
    *Parametros:

    *Descripción: Se realizan personalizaciones a los formularios generados por
                  defecto por el framework. Se establecen labels para los campos,
                  se cambia el tipo de widget de acuerdo a las necesidades se deshabilita campos
                  se establecen atributos de los widgets, que a la larga se convertiran en
                  tags de html.
    * Autor: Jhonny Pincay Nieves, Jose Sumba Zhongor
 **************************************************/
  public function configure()
  {
      unset(
         $this['created_at'],$this['updated_at']
       );
      $this->widgetSchema['pro_ultimo_proveedor_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'query' => Doctrine_Query::create()->select('*')->from('Proveedor')->where('prv_estado!=-1'), 'add_empty' => false));

      $this->widgetSchema['pro_marca'] = new sfWidgetFormChoice(array('choices'  => array(''),));
      $this->widgetSchema['pro_categoria'] = new sfWidgetFormChoice(array('choices'  => array(''),));
      $this->widgetSchema['pro_origen'] = new sfWidgetFormChoice(array('choices'  => array(''),));
      $this->widgetSchema['pro_estado'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['pro_stock'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['pro_precio_unitario'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['pro_precio_nota_venta'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['pro_precio_factura'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['pro_bodega'] = new sfWidgetFormInputHidden();
       $this->widgetSchema['pro_descripcion']= new sfWidgetFormTextarea();
      $this->widgetSchema->setLabels(array(
            'pro_codigo'=>'Código',
            'pro_nombre' => 'Nombre',
            'pro_descripcion' => 'Descripición',
            'pro_marca' => 'Marca',
            'pro_categoria' => 'Categoria',
            'pro_stock' => 'Stock',
            'pro_descripcion' => 'Descripición',
            'pro_precio_unitario' => 'Precio Unitario',
            'pro_precio_nota_venta' => 'Precio Nota de Venta',
            'pro_precio_factura' => 'Precio Factura',
            'pro_ultimo_proveedor_id' => 'Último Proveedor',
            'pro_origen' => 'Origen',
        ));

//       $this->validatorSchema->setPostValidator(array('doc_codigo'=> new sfValidatorDoctrineUnique(
//                            array( 'model' => 'Producto',
//                                   'column' => array('pro_codigo')
//                                   ),
//                            array('invalid' => "!Código Ingresado ya Existe¡")
//                          )
//                         ));

      $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
              new sfValidatorDoctrineUnique(array('model' => 'Producto', 'column' => array('pro_codigo')),array('invalid' => 'Código Ingresado Anteriormente')),
      ))
    );


      $this->getWidget('pro_marca')->setAttribute('id', 'cmb_marca_producto');
      $this->getWidget('pro_categoria')->setAttribute('id', 'cmb_categoria_producto');
      $this->getWidget('pro_origen')->setAttribute('id', 'cmb_origen_producto');

     }
}
