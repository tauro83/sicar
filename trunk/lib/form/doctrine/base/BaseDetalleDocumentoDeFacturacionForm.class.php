<?php

/**
 * DetalleDocumentoDeFacturacion form base class.
 *
 * @method DetalleDocumentoDeFacturacion getObject() Returns the current form's model object
 *
 * @package    SICAR
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDetalleDocumentoDeFacturacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'det_id'             => new sfWidgetFormInputHidden(),
      'det_codigo'         => new sfWidgetFormInputText(),
      'det_cantidad'       => new sfWidgetFormInputText(),
      'det_descripcion'    => new sfWidgetFormInputText(),
      'det_valor_unitario' => new sfWidgetFormInputText(),
      'det_valor_total'    => new sfWidgetFormInputText(),
      'det_documento_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DocumentoDeFacturacion'), 'add_empty' => true)),
      'det_producto_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Producto'), 'add_empty' => true)),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'det_id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('det_id')), 'empty_value' => $this->getObject()->get('det_id'), 'required' => false)),
      'det_codigo'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'det_cantidad'       => new sfValidatorInteger(array('required' => false)),
      'det_descripcion'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'det_valor_unitario' => new sfValidatorNumber(array('required' => false)),
      'det_valor_total'    => new sfValidatorNumber(array('required' => false)),
      'det_documento_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DocumentoDeFacturacion'), 'required' => false)),
      'det_producto_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Producto'), 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'DetalleDocumentoDeFacturacion', 'column' => array('det_id')))
    );

    $this->widgetSchema->setNameFormat('detalle_documento_de_facturacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleDocumentoDeFacturacion';
  }

}
