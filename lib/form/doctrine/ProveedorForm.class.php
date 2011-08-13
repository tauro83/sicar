<?php

/*************************************************
  * NOMBRE: ProveedorForm.class.php
  * DESCRIPCION: Clase que invoca a los formularios usados para ingreso de datos,
                 de proveedores encuentran mapeados a los descrito en el archivo schema.yml
  * FECHA DE CREACION: 23-07-2011
  * AUTOR: Jaime Castells
   **************************************************/
class ProveedorForm extends BaseProveedorForm
{
    /*************************************************
    *Nombre: configure()
    *Parametros:

    *Descripción: Se realizan personalizaciones a los formularios generados por
                  defecto por el framework. Se establecen labels para los campos,
                  se cambia el tipo de widget de acuerdo a las necesidades se deshabilita campos
                  se establecen atributos de los widgets, que a la larga se convertiran en
                  tags de html.
    * Autor: Jaime Castells
 **************************************************/
  public function configure()
  {
      unset(
         $this['created_at'],$this['updated_at']
       );
      $this->widgetSchema['prv_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['prv_fecha_ingreso'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['prv_estado'] = new sfWidgetFormInputHidden();
      $this->widgetSchema->setLabels(array(
            'prv_nombre'=>'Nombre',
            'prv_ruc'=>'RUC',
            'prv_direccion' => 'Dirección',
            'prv_telefono' => 'Teléfono',
            'prv_correo' => 'Correo',
            'prv_fax' => 'Fax',
            'prv_responsable' => 'Responsable',
            'prv_nombre_banco' => 'Nombre Banco',
            'prv_numero_cuenta' => 'Número de Cuenta',
        ));

     }
}
