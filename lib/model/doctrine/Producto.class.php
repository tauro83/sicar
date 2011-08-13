<?php

/*************************************************
  * NOMBRE: Producto.class.php
  * DESCRIPCION: Clase que manejara los datos de los productos y metododos de
 *               consulta a la base de datos.
  * FECHA DE CREACION: 10-06-2011
  * AUTOR: Jhonny Pincay Nieves
   **************************************************/



class Producto extends BaseProducto
{

 /*************************************************
    *Nombre: consultarProductoPorCodigo($id_codigo)
    *Parametros:
	      - $id_codigo : Representa el codigo de un producto.
              
    *Descripción: Esta funcion realiza una consulta en la base de datos y verifica
                  la existencia de un producto con codigo igual al recibido como parametro
                  y cuyo estado sea diferente de -1, es decir que no esté eliminado.
    * Autor: Ronny Andrade Parra
 **************************************************/

    public static function consultarProductoPorCodigo($id_codigo){
        $producto=Doctrine_Core::getTable('Producto')
                            ->createQuery('p')
                            ->where('p.pro_codigo= ?',$id_codigo)
                            ->andWhere('p.pro_estado != -1')
                            ->fetchOne();
       
        return $producto;
    }


/*************************************************
    *Nombre: consultarProductoPorMarca($marca)
    *Parametros:
	      - $marca : Representa una marca de un producto a ser consultado.

    *Descripción: Esta funcion realiza una consulta en la base de datos y verifica
                  la existencia de  productos con marca igual a la recibida como parametro
                  y cuyo estado sea diferente de -1, es decir que no estén eliminados.
    * Autor: Jhonny Pincay Nieves
 **************************************************/

     public static function consultarProductosPorMarca($marca){
        $productos=Doctrine_Core::getTable('Producto')
                            ->createQuery('p')
                            ->where('p.pro_marca like ?','%'.$marca.'%')
                            ->andWhere('p.pro_estado != -1')
                            ->execute();
        return $productos;
    }

/*************************************************
    *Nombre: consultarProductoPorMarcaNombre($marca, $nombre)
    *Parametros:
	      - $marca : Representa una marca de un producto a ser consultado.
              - $nombre: Representa el nombre dee un producton a ser consultado.

    *Descripción: Esta funcion realiza una consulta en la base de datos y verifica
                  la existencia de  productos con marca y nombre igual a los recibidos como parametro
                  y cuyo estado sea diferente de -1, es decir que no estén eliminados.
    * Autor: Jaime Castells Pérez
 **************************************************/


    public static function consultarProductosPorMarcaNombre($marca,$nombre){
        $productos=Doctrine_Core::getTable('Producto')
                            ->createQuery('p')
                            ->where('p.pro_marca like ?','%'.$marca.'%')
                            ->andWhere('p.pro_nombre like ?','%'.$nombre.'%')
                            ->andWhere('p.pro_estado != -1')
                            ->execute();
        return $productos;
    }

/*************************************************
    *Nombre: consultarProductoPorNombre($nombre)
    *Parametros:

              - $nombre: Representa el nombre dee un producton a ser consultado.

    *Descripción: Esta funcion realiza una consulta en la base de datos y verifica
                  la existencia de  productos con  nombre igual a lo recibido como parametro
                  y cuyo estado sea diferente de -1, es decir que no estén eliminados.
    * Autor: Jaime Castells Pérez
 **************************************************/
     public static function consultarProductosPorNombre($nombre){
        $productos=Doctrine_Core::getTable('Producto')
                            ->createQuery('p')
                            ->where('p.pro_nombre like ?','%'.$nombre.'%')
                            ->andWhere('p.pro_estado != -1')
                            ->orderBy('p.pro_codigo')
                            ->execute();
        return $productos;
    }

/*************************************************
    *Nombre: consultarProductoPorCategoria($categoria)
    *Parametros:
	      - $categoria : Representa una categoria de un producto a ser consultado.


    *Descripción: Esta funcion realiza una consulta en la base de datos y verifica
                  la existencia de  productos con categoria igual a la recibida como parametro
                  y cuyo estado sea diferente de -1, es decir que no estén eliminados.
    * Autor: Jose Sumba Zhongor
 **************************************************/

    public static function consultarProductosPorCategoria($categoria){
        $productos=Doctrine_Core::getTable('Producto')
                            ->createQuery('p')
                            ->where('p.pro_categoria like ?','%'.$categoria.'%')
                           ->andWhere('p.pro_estado != -1')
                            ->execute();
        return $productos;
    }
    

 /*************************************************
    *Nombre: xmlStringDataProductos($productos)
    *Parametros:
	      - $productos : Representa una colección de objetos producto.


    *Descripción: Esta funcion forma una cadena que representa un xml, llenado con datos
                  de los productos contenidos en la coleccion. Este xml será posteriormente
                  empleado para llenar un grid donde se mostraran los datos.
    * Autor: Jaime Castells Pérez
 **************************************************/

    public static function xmlStringDataProductos($productos){
        $output = "<?xml version='1.0' encoding='utf-8'?>" . "\n";
        $output = "<rows>";
        $output .= "\n" . "<page>1</page>" . "\n";
        $output .= "<total>1</total>" . "\n";
        $output .= "<records>" . count($productos) . "</records>" . "\n";
        foreach ($productos as $producto) {
            $output .= "<row id='" . $producto->getProId() . "'>" . "\n";
            $output .= "<cell>" . $producto->getProCodigo() . "</cell>" . "\n";
            $output .= "<cell>" . strtoupper($producto->getProNombre()) . "</cell>" . "\n";
            $output .= "<cell>" . $producto->getProPrecioUnitario() . "</cell>" . "\n";
            $output .= "<cell>" . $producto->getProPrecioNotaVenta() . "</cell>" . "\n";
            $output .= "<cell>" . $producto->getProPrecioFactura() . "</cell>" . "\n";
            $output .= "</row>" . "\n";
        }

        $output .= "</rows>" . "\n";
        return $output;

    }

    /*************************************************
    *Nombre: getMarcas()
    *Parametros:

    *Descripción: Esta funcion realiza una consulta a la tabla Producto retorna todas las
                  marcas diferentes existentes en la base de dato.
    * Autor: Jaime Castells Pérez
 **************************************************/
    public static function getMarcas() {
        $q = new Doctrine_RawSql();

         $q->select('{p.pro_marca}')
          ->from('Producto p')
          ->addComponent('p', 'Producto')
          ->distinct(true)
          ->orderBy('p.pro_marca');

         return $q->execute();
    }


     /*************************************************
    *Nombre: getCategorias()
    *Parametros:

    *Descripción: Esta funcion realiza una consulta a la tabla Producto retorna todas las
                  categorias diferentes existentes en la base de dato.
    * Autor: Jhonny Pincay Nieves
 **************************************************/
    public static function getCategorias() {
        $q = new Doctrine_RawSql();

         $q->select('{p.pro_categoria}')
          ->from('Producto p')
          ->addComponent('p', 'Producto')
          ->distinct(true)
          ->orderBy('p.pro_categoria');

       return $q->execute();

    }

 /*************************************************
    *Nombre: getOrigenes()
    *Parametros:

    *Descripción: Esta funcion realiza una consulta en la base de datos retorna todas los
                  origenes diferentes existentes en la base de dato.
    * Autor: Jose Sumba Zhongor
 **************************************************/
    public static function getOrigenes() {
        $q = new Doctrine_RawSql();

         $q->select('{p.pro_origen}')
          ->from('Producto p')
          ->addComponent('p', 'Producto')
          ->distinct(true)
          ->orderBy('p.pro_origen');

       return $q->execute();
    }

     /*************************************************
    *Nombre: xmlProductoCodigo($producto)
    *Parametros:
	      -$producto: Representa un objeto Producto
    *Descripción: Esta funcion devuelve una cadena que representa un xml
                  con los datos del producto enviado como parámetro
    * Autor: Ronny Andrade Parra
 **************************************************/
    public static function xmlProductoCodigo($producto){

        if($producto){
            $output = '<producto>';
            $output.="\n" . '<id>'.$producto->getProId().'</id>' . "\n";
            $output.='<nombre>'.$producto->getProNombre().'</nombre>' . "\n";
            $output.='<precioUnit>'.$producto->getProPrecioFactura().'</precioUnit>' . "\n";
            $output.='<precioNV>'.$producto->getProPrecioNotaVenta().'</precioNV>' . "\n";
            $output.='<stock>'.$producto->getProStock().'</stock>' . "\n";
            $output.='<mensaje>Producto Encontrado</mensaje>' . "\n";
            $output.='</producto>';
            return $output;
        }else{
            $output = '<producto>';
            $output.='<mensaje>Producto No Encontrado</mensaje>' . "\n";
            $output.='</producto>';
            return $output;
        }

    }

    /*************************************************
    *Nombre: borrarProducto($producto)
    *Parametros:
	      -$producto: Representa un objeto Producto
    *Descripción: Esta funcion establece el estado de un producto como -1,
                  con el objetivo de realizar un borrado logico del producto.
    * Autor: Jose Sumba Zhongor
     **************************************************/
    public static function borrarProducto($producto){
        $producto->setProEstado(-1);
        $producto->save();
        return;
    }


    /*************************************************
    *Nombre: disminuirStock($producto)
    *Parametros:
	      -$producto: Representa un objeto Producto
              -$cantidad: Representa el valor a ser diminuido del stock
    *Descripción: Esta funcion disminuye el stock de un producto en la medida
                  enviada como parametro a traves de cantidad.
    * Autor: Jose Sumba Zhongor
     **************************************************/
    public static function disminuirStockProducto($documento_de_facturacion){
        $detalles=$documento_de_facturacion->DetalleDocumento;
        foreach($detalles as $detalle):
            $stock_actual=$detalle->Producto->getProStock();
            $cantidad=$detalle->getDetCantidad();
            $detalle->Producto->setProStock($stock_actual - $cantidad);
            $detalle->Producto->actualizarEstado();
            $detalle->Producto->save();
        endforeach;

        return;
    }

     /*************************************************
    *Nombre: actualizarFechaUltimaVenta($documento_de_facturacion)
    *Parametros:
	      -$documento_de_facturacion: Representa un documento existente.
    *Descripción: Esta funcion obtiene todos los productos que se han vendido en
                  un documento de facturacion y actualiza su ultima fecha de venta
                  con la fecha de emision del documento.
    * Autor: Jose Sumba Zhongor
     **************************************************/

    public static function actualizarFechaUltimaVenta($documento_de_facturacion){
        $detalles=$documento_de_facturacion->DetalleDocumento;
        foreach($detalles as $detalle):
            $detalle->Producto->setProUltimaVenta($documento_de_facturacion->getDocFechaEmision());
            $detalle->Producto->save();
        endforeach;

        return;
    }
    

    /*************************************************
    *Nombre: disminuirStock($producto)
    *Parametros:
	      -$producto: Representa un objeto Producto
              -$cantidad: Representa el valor a ser diminuido del stock
    *Descripción: Esta funcion disminuye el stock de un producto en la medida
                  enviada como parametro a traves de cantidad.
    * Autor: Jose Sumba Zhongor
     **************************************************/
    public static function aumentarStockProducto($documento_de_facturacion){
        $detalles=$documento_de_facturacion->DetalleDocumento;
        foreach($detalles as $detalle):
            $stock_actual=$detalle->Producto->getProStock();
            $cantidad=$detalle->getDetCantidad();
            $detalle->Producto->setProStock($stock_actual + $cantidad);
            $detalle->Producto->actualizarEstado();
            $detalle->Producto->save();
        endforeach;

        return;
    }

     /*************************************************
    *Nombre: actualizarFechaUltimaVenta($documento_de_facturacion)
    *Parametros:
	      -$documento_de_facturacion: Representa un documento existente.
    *Descripción: Esta funcion obtiene todos los productos que se han vendido en
                  un documento de facturacion y actualiza su ultima fecha de venta
                  con la fecha de emision del documento.
    * Autor: Jose Sumba Zhongor
     **************************************************/

    public static function actualizarFechaUltimaCompra($documento_de_facturacion){
        $detalles=$documento_de_facturacion->DetalleDocumento;
        foreach($detalles as $detalle):
            $detalle->Producto->setProUltimaCompra($documento_de_facturacion->getDocFechaEmision());
            $detalle->Producto->save();
        endforeach;

        return;
    }

     /*************************************************
    *Nombre: actualizarFechaUltimaVenta($documento_de_facturacion)
    *Parametros:
	      -$documento_de_facturacion: Representa un documento existente.
    *Descripción: Esta funcion obtiene todos los productos que se han vendido en
                  un documento de facturacion y actualiza su ultima fecha de venta
                  con la fecha de emision del documento.
    * Autor: Jose Sumba Zhongor
     **************************************************/

    public static function actualizarUltimoProveedor($documento_de_facturacion){
        $detalles=$documento_de_facturacion->DetalleDocumento;
        foreach($detalles as $detalle):
            $detalle->Producto->setProUltimoProveedorId($documento_de_facturacion->Proveedor->getPrvId());
            $detalle->Producto->save();
        endforeach;

        return;
    }

    public function actualizarEstado(){
        if($this->getProStock()==0):
            $this->setProEstado(0);
        elseif($this->getProStock()<=5):
             $this->setProEstado(1);
        else:
            $this->setProEstado(2);
        endif;

    }

}