<?php

/*************************************************
  * NOMBRE: ClienteForm.class.php
  * DESCRIPCION: Clase que invoca a los formularios usados para ingreso de datos,
                 de clientes que se  encuentran mapeados a los descrito en el archivo schema.yml
  * FECHA DE CREACION: 24-06-2011
  * AUTOR: José Sumba Zhongor
   **************************************************/

class ClienteForm extends BaseClienteForm
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
                $this['created_at'], $this['updated_at']
        );
      $this->widgetSchema['cli_estado'] = new sfWidgetFormInputHidden();
      $this->widgetSchema->setLabels(array(
           'cli_identificacion' => 'Identificación',
           'cli_apellido' => 'Apellidos',
           'cli_nombre' => 'Nombres',
           'cli_direccion' => 'Dirección',
           'cli_telefono' => 'Teléfono',
           'cli_celular' => 'Celular',
           'cli_correo' => 'Correo',
       ));

//      $this->validatorSchema->setPostValidator(
//      new sfValidatorAnd(array(
//              new sfValidatorDoctrineUnique(array('model' => 'Cliente', 'column' => array('cli_identificacion')),array('invalid' => 'Identificación Ingresada Anteriormente')),
//      ))
//    );


    }

  public function  doBind(array $values)
    {

            $this->validatorSchema['cli_identificacion']->setOption('required', false);
//            $this->validatorSchema->setPostValidator(
//                new sfValidatorSchemaCompare('date_from', '<', 'date_to', array('throw_global_error' => true), array('invalid' => 'La fecha de comienzo debe ser menor que la de fin'))
//

        return parent::doBind($values);
    }

   
}

