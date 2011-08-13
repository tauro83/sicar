<?php

/*************************************************
  * NOMBRE: DetalleDocumentoDeFacturacionForm.class.php
  * DESCRIPCION: Clase que invoca a los formularios usados para ingreso de datos,
                 de detalles de documentos de facturacion
                 se encuentran mapeados a los descrito en el archivo schema.yml
  * FECHA DE CREACION: 10-06-2011
  * AUTOR: Jaime Castells Pérez, José Sumba Zhongor
   **************************************************/

class DetalleDocumentoDeFacturacionForm extends BaseDetalleDocumentoDeFacturacionForm
{
    /*************************************************
    *Nombre: configure()
    *Parametros:

    *Descripción: Se realizan personalizaciones a los formularios generados por
                  defecto por el framework. Se establecen labels para los campos,
                  se cambia el tipo de widget de acuerdo a las necesidades se deshabilita campos
                  se establecen atributos de los widgets, que a la larga se convertiran en
                  tags de html.
    * Autor: Jaime Castells Pérez, Jose Sumba Zhongor
 **************************************************/
  public function configure()
  {
      unset(
                $this['created_at'], $this['updated_at']
        );
      $this->widgetSchema['det_producto_id'] = new sfWidgetFormInputText();
      $this->widgetSchema['det_documento_id'] = new sfWidgetFormInputText();
     // $this->getWidget('det_codigo')->setAttribute('onkeypress','consultarDetallesProducto(event)');
      $this->getWidget('det_valor_total')->setAttribute('readonly','readonly');

  }

  protected function doSave($con = null)
      {
        $this->getObject()->setDetDocumentoId($this->getObject()->DocumentoDeFacturacion->getDocId());
        return parent::doSave($con);
      }
}
