<?php

/*************************************************
  * NOMBRE: Cliente.class.php
  * DESCRIPCION: Clase que manejara los datos de los clientes
  *                y metododos de consulta a la base de datos.
  * FECHA DE CREACION: 20-07-2011
  * AUTOR: Jose Sumba
   **************************************************/

class Cliente extends BaseCliente
{
      /*************************************************
        *Nombre: consultarClientePorIdentificacion($id_identificacion)
        *Parametros:
                  - $id_identificacion : Representa la identificacion de un cliente.

        *Descripción: Esta funcion realiza una consulta en la base de datos y verifica
                      la existencia de un producto con identificacion igual al recibido como parametro
                      y cuyo estado sea diferente de -1, es decir que no esté eliminado.
        * Autor: Jose Sumba
     **************************************************/

    public static function consultarClientePorIdentificacion($id_identificacion){
        $cliente=Doctrine_Core::getTable('Cliente')
                            ->createQuery('c')
                            ->where('c.cli_identificacion= ?',$id_identificacion)
                            ->andWhere('c.cli_estado = 1')
                            ->fetchOne();
        return $cliente;
    }

     public static function consultarClientePorApellidos($apellido){
        $clientes=Doctrine_Core::getTable('Cliente')
                            ->createQuery('c')
                            ->where('c.cli_apellido like ?',$apellido.'%')
                            ->andWhere('c.cli_estado = 1')
                            ->execute();
        return $clientes;
    }


    /*************************************************
    *Nombre: borrarCliente($producto)
    *Parametros:
	      -$producto: Representa un objeto Producto
    *Descripción: Esta funcion establece el estado de un cliente  como -1,
                  con el objetivo de realizar un borrado logico del cliente.
    * Autor: Jose Sumba Zhongor
     **************************************************/

    public static function borrarCliente($cliente){
        $cliente->setCliEstado(-1);
        $cliente->save();
        return;
    }

    public static function xmlStringDataClientes($clientes){
        $output = "<?xml version='1.0' encoding='utf-8'?>" . "\n";
        $output = "<rows>";
        $output .= "\n" . "<page>1</page>" . "\n";
        $output .= "<total>1</total>" . "\n";
        $output .= "<records>" . count($clientes) . "</records>" . "\n";
        foreach ($clientes as $cliente) {
            $output .= "<row id='" . $cliente->getCliId() . "'>" . "\n";
            $output .= "<cell>" .$cliente->getCliIdentificacion(). "</cell>" . "\n";
            $output .= "<cell>" . ucwords($cliente->getCliApellido()).' '.ucwords($cliente->getCliNombre()). "</cell>" . "\n";
            $output .= "<cell>" . ucwords($cliente->getCliTelefono()) . "</cell>" . "\n";
            $output .= "</row>" . "\n";
        }

        $output .= "</rows>" . "\n";
        return $output;

    }

}