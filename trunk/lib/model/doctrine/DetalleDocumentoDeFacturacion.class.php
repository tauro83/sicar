<?php

/*************************************************
  * NOMBRE: Producto.class.php
  * DESCRIPCION: Clase que manejara los datos de los detallesde documentos de facturacion
  *                y metododos de consulta a la base de datos.
  * FECHA DE CREACION: 10-06-2011
  * AUTOR: Jaime Castells 
   **************************************************/

class DetalleDocumentoDeFacturacion extends BaseDetalleDocumentoDeFacturacion
{

   /*************************************************
    *Nombre: limpiar()
    *Parametros:

    *Descripción: Esta funcion borra de la base de datos detalles que se crean vacíos
    *             al crear  un nuevo documento de facturación.
    * Autor: Jhonny PIncay
     **************************************************/
    public static function limpiar(){
        $detalles=Doctrine_Core::getTable('DetalleDocumentoDeFacturacion')
                            ->createQuery('d')
                            ->where('d.det_codigo=""')
                            ->execute();

       foreach($detalles as $detalle){
           $detalle->delete();
       }
    }
}