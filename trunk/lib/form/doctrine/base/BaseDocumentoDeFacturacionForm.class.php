<?php

/**
 * DocumentoDeFacturacion form base class.
 *
 * @method DocumentoDeFacturacion getObject() Returns the current form's model object
 *
 * @package    SICAR
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDocumentoDeFacturacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'doc_id'              => new sfWidgetFormInputHidden(),
      'doc_codigo'          => new sfWidgetFormInputText(),
      'doc_fecha_emision'   => new sfWidgetFormDateTime(),
      'doc_cliente_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cliente'), 'add_empty' => true)),
      'doc_proveedor_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'add_empty' => true)),
      'doc_responsable'     => new sfWidgetFormInputText(),
      'doc_sub_total'       => new sfWidgetFormInputText(),
      'doc_total_documento' => new sfWidgetFormInputText(),
      'doc_iva'             => new sfWidgetFormInputText(),
      'doc_tipo'            => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'doc_id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('doc_id')), 'empty_value' => $this->getObject()->get('doc_id'), 'required' => false)),
      'doc_codigo'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'doc_fecha_emision'   => new sfValidatorDateTime(array('required' => false)),
      'doc_cliente_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cliente'), 'required' => false)),
      'doc_proveedor_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'required' => false)),
      'doc_responsable'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'doc_sub_total'       => new sfValidatorNumber(array('required' => false)),
      'doc_total_documento' => new sfValidatorNumber(array('required' => false)),
      'doc_iva'             => new sfValidatorNumber(array('required' => false)),
      'doc_tipo'            => new sfValidatorInteger(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'DocumentoDeFacturacion', 'column' => array('doc_id'))),
        new sfValidatorDoctrineUnique(array('model' => 'DocumentoDeFacturacion', 'column' => array('doc_codigo'))),
      ))
    );

    $this->widgetSchema->setNameFormat('documento_de_facturacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DocumentoDeFacturacion';
  }

}
