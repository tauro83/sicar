<?php

/**
 * DocumentoDeFacturacion filter form base class.
 *
 * @package    SICAR
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDocumentoDeFacturacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'doc_codigo'          => new sfWidgetFormFilterInput(),
      'doc_fecha_emision'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'doc_cliente_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cliente'), 'add_empty' => true)),
      'doc_proveedor_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'add_empty' => true)),
      'doc_responsable'     => new sfWidgetFormFilterInput(),
      'doc_sub_total'       => new sfWidgetFormFilterInput(),
      'doc_total_documento' => new sfWidgetFormFilterInput(),
      'doc_iva'             => new sfWidgetFormFilterInput(),
      'doc_tipo'            => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'doc_codigo'          => new sfValidatorPass(array('required' => false)),
      'doc_fecha_emision'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'doc_cliente_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Cliente'), 'column' => 'cli_id')),
      'doc_proveedor_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Proveedor'), 'column' => 'prv_id')),
      'doc_responsable'     => new sfValidatorPass(array('required' => false)),
      'doc_sub_total'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'doc_total_documento' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'doc_iva'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'doc_tipo'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('documento_de_facturacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DocumentoDeFacturacion';
  }

  public function getFields()
  {
    return array(
      'doc_id'              => 'Number',
      'doc_codigo'          => 'Text',
      'doc_fecha_emision'   => 'Date',
      'doc_cliente_id'      => 'ForeignKey',
      'doc_proveedor_id'    => 'ForeignKey',
      'doc_responsable'     => 'Text',
      'doc_sub_total'       => 'Number',
      'doc_total_documento' => 'Number',
      'doc_iva'             => 'Number',
      'doc_tipo'            => 'Number',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
