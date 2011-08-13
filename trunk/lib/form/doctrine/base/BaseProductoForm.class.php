<?php

/**
 * Producto form base class.
 *
 * @method Producto getObject() Returns the current form's model object
 *
 * @package    SICAR
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProductoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pro_id'                  => new sfWidgetFormInputHidden(),
      'pro_codigo'              => new sfWidgetFormInputText(),
      'pro_nombre'              => new sfWidgetFormInputText(),
      'pro_descripcion'         => new sfWidgetFormInputText(),
      'pro_marca'               => new sfWidgetFormInputText(),
      'pro_categoria'           => new sfWidgetFormInputText(),
      'pro_stock'               => new sfWidgetFormInputText(),
      'pro_estado'              => new sfWidgetFormInputText(),
      'pro_ultima_venta'        => new sfWidgetFormDateTime(),
      'pro_ultima_compra'       => new sfWidgetFormDateTime(),
      'pro_precio_unitario'     => new sfWidgetFormInputText(),
      'pro_precio_nota_venta'   => new sfWidgetFormInputText(),
      'pro_precio_factura'      => new sfWidgetFormInputText(),
      'pro_bodega'              => new sfWidgetFormInputText(),
      'pro_origen'              => new sfWidgetFormInputText(),
      'pro_ultimo_proveedor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'add_empty' => true)),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'pro_id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('pro_id')), 'empty_value' => $this->getObject()->get('pro_id'), 'required' => false)),
      'pro_codigo'              => new sfValidatorString(array('max_length' => 10)),
      'pro_nombre'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'pro_descripcion'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'pro_marca'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'pro_categoria'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'pro_stock'               => new sfValidatorInteger(array('required' => false)),
      'pro_estado'              => new sfValidatorInteger(array('required' => false)),
      'pro_ultima_venta'        => new sfValidatorDateTime(array('required' => false)),
      'pro_ultima_compra'       => new sfValidatorDateTime(array('required' => false)),
      'pro_precio_unitario'     => new sfValidatorNumber(array('required' => false)),
      'pro_precio_nota_venta'   => new sfValidatorNumber(array('required' => false)),
      'pro_precio_factura'      => new sfValidatorNumber(array('required' => false)),
      'pro_bodega'              => new sfValidatorInteger(array('required' => false)),
      'pro_origen'              => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'pro_ultimo_proveedor_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Producto', 'column' => array('pro_id'))),
        new sfValidatorDoctrineUnique(array('model' => 'Producto', 'column' => array('pro_codigo'))),
      ))
    );

    $this->widgetSchema->setNameFormat('producto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Producto';
  }

}
