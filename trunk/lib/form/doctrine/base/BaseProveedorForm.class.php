<?php

/**
 * Proveedor form base class.
 *
 * @method Proveedor getObject() Returns the current form's model object
 *
 * @package    SICAR
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProveedorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'prv_id'            => new sfWidgetFormInputHidden(),
      'prv_nombre'        => new sfWidgetFormInputText(),
      'prv_direccion'     => new sfWidgetFormInputText(),
      'prv_telefono'      => new sfWidgetFormInputText(),
      'prv_correo'        => new sfWidgetFormInputText(),
      'prv_estado'        => new sfWidgetFormInputText(),
      'prv_fax'           => new sfWidgetFormInputText(),
      'prv_responsable'   => new sfWidgetFormInputText(),
      'prv_fecha_ingreso' => new sfWidgetFormDateTime(),
      'prv_nombre_banco'  => new sfWidgetFormInputText(),
      'prv_numero_cuenta' => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'prv_id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('prv_id')), 'empty_value' => $this->getObject()->get('prv_id'), 'required' => false)),
      'prv_nombre'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'prv_direccion'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'prv_telefono'      => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'prv_correo'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'prv_estado'        => new sfValidatorInteger(array('required' => false)),
      'prv_fax'           => new sfValidatorInteger(array('required' => false)),
      'prv_responsable'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'prv_fecha_ingreso' => new sfValidatorDateTime(array('required' => false)),
      'prv_nombre_banco'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'prv_numero_cuenta' => new sfValidatorString(array('max_length' => 13, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Proveedor', 'column' => array('prv_id')))
    );

    $this->widgetSchema->setNameFormat('proveedor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proveedor';
  }

}
