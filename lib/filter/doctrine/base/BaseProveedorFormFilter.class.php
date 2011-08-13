<?php

/**
 * Proveedor filter form base class.
 *
 * @package    SICAR
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProveedorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'prv_ruc'           => new sfWidgetFormFilterInput(),
      'prv_nombre'        => new sfWidgetFormFilterInput(),
      'prv_direccion'     => new sfWidgetFormFilterInput(),
      'prv_telefono'      => new sfWidgetFormFilterInput(),
      'prv_correo'        => new sfWidgetFormFilterInput(),
      'prv_estado'        => new sfWidgetFormFilterInput(),
      'prv_fax'           => new sfWidgetFormFilterInput(),
      'prv_responsable'   => new sfWidgetFormFilterInput(),
      'prv_fecha_ingreso' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'prv_nombre_banco'  => new sfWidgetFormFilterInput(),
      'prv_numero_cuenta' => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'prv_ruc'           => new sfValidatorPass(array('required' => false)),
      'prv_nombre'        => new sfValidatorPass(array('required' => false)),
      'prv_direccion'     => new sfValidatorPass(array('required' => false)),
      'prv_telefono'      => new sfValidatorPass(array('required' => false)),
      'prv_correo'        => new sfValidatorPass(array('required' => false)),
      'prv_estado'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'prv_fax'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'prv_responsable'   => new sfValidatorPass(array('required' => false)),
      'prv_fecha_ingreso' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'prv_nombre_banco'  => new sfValidatorPass(array('required' => false)),
      'prv_numero_cuenta' => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('proveedor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proveedor';
  }

  public function getFields()
  {
    return array(
      'prv_id'            => 'Number',
      'prv_ruc'           => 'Text',
      'prv_nombre'        => 'Text',
      'prv_direccion'     => 'Text',
      'prv_telefono'      => 'Text',
      'prv_correo'        => 'Text',
      'prv_estado'        => 'Number',
      'prv_fax'           => 'Number',
      'prv_responsable'   => 'Text',
      'prv_fecha_ingreso' => 'Date',
      'prv_nombre_banco'  => 'Text',
      'prv_numero_cuenta' => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
