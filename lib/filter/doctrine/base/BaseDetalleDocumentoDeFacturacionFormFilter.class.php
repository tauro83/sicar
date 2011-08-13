<?php

/**
 * DetalleDocumentoDeFacturacion filter form base class.
 *
 * @package    SICAR
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDetalleDocumentoDeFacturacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'det_codigo'         => new sfWidgetFormFilterInput(),
      'det_cantidad'       => new sfWidgetFormFilterInput(),
      'det_descripcion'    => new sfWidgetFormFilterInput(),
      'det_valor_unitario' => new sfWidgetFormFilterInput(),
      'det_valor_total'    => new sfWidgetFormFilterInput(),
      'det_documento_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DocumentoDeFacturacion'), 'add_empty' => true)),
      'det_producto_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Producto'), 'add_empty' => true)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'det_codigo'         => new sfValidatorPass(array('required' => false)),
      'det_cantidad'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'det_descripcion'    => new sfValidatorPass(array('required' => false)),
      'det_valor_unitario' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'det_valor_total'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'det_documento_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('DocumentoDeFacturacion'), 'column' => 'doc_id')),
      'det_producto_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Producto'), 'column' => 'pro_id')),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('detalle_documento_de_facturacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleDocumentoDeFacturacion';
  }

  public function getFields()
  {
    return array(
      'det_id'             => 'Number',
      'det_codigo'         => 'Text',
      'det_cantidad'       => 'Number',
      'det_descripcion'    => 'Text',
      'det_valor_unitario' => 'Number',
      'det_valor_total'    => 'Number',
      'det_documento_id'   => 'ForeignKey',
      'det_producto_id'    => 'ForeignKey',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
