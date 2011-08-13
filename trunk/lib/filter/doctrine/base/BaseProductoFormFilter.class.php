<?php

/**
 * Producto filter form base class.
 *
 * @package    SICAR
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProductoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pro_codigo'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pro_nombre'              => new sfWidgetFormFilterInput(),
      'pro_descripcion'         => new sfWidgetFormFilterInput(),
      'pro_marca'               => new sfWidgetFormFilterInput(),
      'pro_categoria'           => new sfWidgetFormFilterInput(),
      'pro_stock'               => new sfWidgetFormFilterInput(),
      'pro_estado'              => new sfWidgetFormFilterInput(),
      'pro_ultima_venta'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'pro_ultima_compra'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'pro_precio_unitario'     => new sfWidgetFormFilterInput(),
      'pro_precio_nota_venta'   => new sfWidgetFormFilterInput(),
      'pro_precio_factura'      => new sfWidgetFormFilterInput(),
      'pro_bodega'              => new sfWidgetFormFilterInput(),
      'pro_origen'              => new sfWidgetFormFilterInput(),
      'pro_ultimo_proveedor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'add_empty' => true)),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'pro_codigo'              => new sfValidatorPass(array('required' => false)),
      'pro_nombre'              => new sfValidatorPass(array('required' => false)),
      'pro_descripcion'         => new sfValidatorPass(array('required' => false)),
      'pro_marca'               => new sfValidatorPass(array('required' => false)),
      'pro_categoria'           => new sfValidatorPass(array('required' => false)),
      'pro_stock'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pro_estado'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pro_ultima_venta'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'pro_ultima_compra'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'pro_precio_unitario'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'pro_precio_nota_venta'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'pro_precio_factura'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'pro_bodega'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pro_origen'              => new sfValidatorPass(array('required' => false)),
      'pro_ultimo_proveedor_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Proveedor'), 'column' => 'prv_id')),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('producto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Producto';
  }

  public function getFields()
  {
    return array(
      'pro_id'                  => 'Number',
      'pro_codigo'              => 'Text',
      'pro_nombre'              => 'Text',
      'pro_descripcion'         => 'Text',
      'pro_marca'               => 'Text',
      'pro_categoria'           => 'Text',
      'pro_stock'               => 'Number',
      'pro_estado'              => 'Number',
      'pro_ultima_venta'        => 'Date',
      'pro_ultima_compra'       => 'Date',
      'pro_precio_unitario'     => 'Number',
      'pro_precio_nota_venta'   => 'Number',
      'pro_precio_factura'      => 'Number',
      'pro_bodega'              => 'Number',
      'pro_origen'              => 'Text',
      'pro_ultimo_proveedor_id' => 'ForeignKey',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
