<?php

/**
 * Cliente form base class.
 *
 * @method Cliente getObject() Returns the current form's model object
 *
 * @package    SICAR
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClienteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cli_id'             => new sfWidgetFormInputHidden(),
      'cli_identificacion' => new sfWidgetFormInputText(),
      'cli_nombre'         => new sfWidgetFormInputText(),
      'cli_apellido'       => new sfWidgetFormInputText(),
      'cli_direccion'      => new sfWidgetFormInputText(),
      'cli_celular'        => new sfWidgetFormInputText(),
      'cli_telefono'       => new sfWidgetFormInputText(),
      'cli_correo'         => new sfWidgetFormInputText(),
      'cli_estado'         => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'cli_id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cli_id')), 'empty_value' => $this->getObject()->get('cli_id'), 'required' => false)),
      'cli_identificacion' => new sfValidatorString(array('max_length' => 13)),
      'cli_nombre'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cli_apellido'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cli_direccion'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cli_celular'        => new sfValidatorString(array('max_length' => 9, 'required' => false)),
      'cli_telefono'       => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'cli_correo'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cli_estado'         => new sfValidatorInteger(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Cliente', 'column' => array('cli_id')))
    );

    $this->widgetSchema->setNameFormat('cliente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cliente';
  }

}
