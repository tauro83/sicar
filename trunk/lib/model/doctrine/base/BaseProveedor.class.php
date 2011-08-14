<?php

/**
 * BaseProveedor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $prv_id
 * @property string $prv_nombre
 * @property string $prv_direccion
 * @property string $prv_telefono
 * @property string $prv_correo
 * @property integer $prv_estado
 * @property integer $prv_fax
 * @property string $prv_responsable
 * @property timestamp $prv_fecha_ingreso
 * @property string $prv_nombre_banco
 * @property string $prv_numero_cuenta
 * @property DocumentoDeFacturacion $DocumentoProveedor
 * @property Doctrine_Collection $ProductoProveedor
 * 
 * @method integer                getPrvId()              Returns the current record's "prv_id" value
 * @method string                 getPrvNombre()          Returns the current record's "prv_nombre" value
 * @method string                 getPrvDireccion()       Returns the current record's "prv_direccion" value
 * @method string                 getPrvTelefono()        Returns the current record's "prv_telefono" value
 * @method string                 getPrvCorreo()          Returns the current record's "prv_correo" value
 * @method integer                getPrvEstado()          Returns the current record's "prv_estado" value
 * @method integer                getPrvFax()             Returns the current record's "prv_fax" value
 * @method string                 getPrvResponsable()     Returns the current record's "prv_responsable" value
 * @method timestamp              getPrvFechaIngreso()    Returns the current record's "prv_fecha_ingreso" value
 * @method string                 getPrvNombreBanco()     Returns the current record's "prv_nombre_banco" value
 * @method string                 getPrvNumeroCuenta()    Returns the current record's "prv_numero_cuenta" value
 * @method DocumentoDeFacturacion getDocumentoProveedor() Returns the current record's "DocumentoProveedor" value
 * @method Doctrine_Collection    getProductoProveedor()  Returns the current record's "ProductoProveedor" collection
 * @method Proveedor              setPrvId()              Sets the current record's "prv_id" value
 * @method Proveedor              setPrvNombre()          Sets the current record's "prv_nombre" value
 * @method Proveedor              setPrvDireccion()       Sets the current record's "prv_direccion" value
 * @method Proveedor              setPrvTelefono()        Sets the current record's "prv_telefono" value
 * @method Proveedor              setPrvCorreo()          Sets the current record's "prv_correo" value
 * @method Proveedor              setPrvEstado()          Sets the current record's "prv_estado" value
 * @method Proveedor              setPrvFax()             Sets the current record's "prv_fax" value
 * @method Proveedor              setPrvResponsable()     Sets the current record's "prv_responsable" value
 * @method Proveedor              setPrvFechaIngreso()    Sets the current record's "prv_fecha_ingreso" value
 * @method Proveedor              setPrvNombreBanco()     Sets the current record's "prv_nombre_banco" value
 * @method Proveedor              setPrvNumeroCuenta()    Sets the current record's "prv_numero_cuenta" value
 * @method Proveedor              setDocumentoProveedor() Sets the current record's "DocumentoProveedor" value
 * @method Proveedor              setProductoProveedor()  Sets the current record's "ProductoProveedor" collection
 * 
 * @package    SICAR
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProveedor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('proveedor');
        $this->hasColumn('prv_id', 'integer', 6, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             'unique' => true,
             'length' => 6,
             ));
        $this->hasColumn('prv_nombre', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('prv_direccion', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('prv_telefono', 'string', 11, array(
             'type' => 'string',
             'length' => 11,
             ));
        $this->hasColumn('prv_correo', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('prv_estado', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             ));
        $this->hasColumn('prv_fax', 'integer', 9, array(
             'type' => 'integer',
             'length' => 9,
             ));
        $this->hasColumn('prv_responsable', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('prv_fecha_ingreso', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('prv_nombre_banco', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('prv_numero_cuenta', 'string', 13, array(
             'type' => 'string',
             'length' => 13,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('DocumentoDeFacturacion as DocumentoProveedor', array(
             'local' => 'prv_id',
             'foreign' => 'doc_proveedor_id'));

        $this->hasMany('Producto as ProductoProveedor', array(
             'local' => 'prv_id',
             'foreign' => 'pro_ultimo_proveedor_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}