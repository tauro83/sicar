<?php

/**
 * BaseCliente
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cli_id
 * @property string $cli_identificacion
 * @property string $cli_nombre
 * @property string $cli_apellido
 * @property string $cli_direccion
 * @property string $cli_celular
 * @property string $cli_telefono
 * @property string $cli_correo
 * @property integer $cli_estado
 * @property DocumentoDeFacturacion $DocumentoCliente
 * 
 * @method integer                getCliId()              Returns the current record's "cli_id" value
 * @method string                 getCliIdentificacion()  Returns the current record's "cli_identificacion" value
 * @method string                 getCliNombre()          Returns the current record's "cli_nombre" value
 * @method string                 getCliApellido()        Returns the current record's "cli_apellido" value
 * @method string                 getCliDireccion()       Returns the current record's "cli_direccion" value
 * @method string                 getCliCelular()         Returns the current record's "cli_celular" value
 * @method string                 getCliTelefono()        Returns the current record's "cli_telefono" value
 * @method string                 getCliCorreo()          Returns the current record's "cli_correo" value
 * @method integer                getCliEstado()          Returns the current record's "cli_estado" value
 * @method DocumentoDeFacturacion getDocumentoCliente()   Returns the current record's "DocumentoCliente" value
 * @method Cliente                setCliId()              Sets the current record's "cli_id" value
 * @method Cliente                setCliIdentificacion()  Sets the current record's "cli_identificacion" value
 * @method Cliente                setCliNombre()          Sets the current record's "cli_nombre" value
 * @method Cliente                setCliApellido()        Sets the current record's "cli_apellido" value
 * @method Cliente                setCliDireccion()       Sets the current record's "cli_direccion" value
 * @method Cliente                setCliCelular()         Sets the current record's "cli_celular" value
 * @method Cliente                setCliTelefono()        Sets the current record's "cli_telefono" value
 * @method Cliente                setCliCorreo()          Sets the current record's "cli_correo" value
 * @method Cliente                setCliEstado()          Sets the current record's "cli_estado" value
 * @method Cliente                setDocumentoCliente()   Sets the current record's "DocumentoCliente" value
 * 
 * @package    SICAR
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCliente extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cliente');
        $this->hasColumn('cli_id', 'integer', 6, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             'unique' => true,
             'length' => 6,
             ));
        $this->hasColumn('cli_identificacion', 'string', 13, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 13,
             ));
        $this->hasColumn('cli_nombre', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cli_apellido', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cli_direccion', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cli_celular', 'string', 9, array(
             'type' => 'string',
             'length' => 9,
             ));
        $this->hasColumn('cli_telefono', 'string', 11, array(
             'type' => 'string',
             'length' => 11,
             ));
        $this->hasColumn('cli_correo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cli_estado', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('DocumentoDeFacturacion as DocumentoCliente', array(
             'local' => 'cli_id',
             'foreign' => 'doc_cliente_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}