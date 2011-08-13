<?php

/*************************************************
  * NOMBRE: Producto.class.php
  * DESCRIPCION: Clase que manejara los datos de los proveedores y metododos de
 *               consulta a la base de datos.
  * FECHA DE CREACION: 19-07-2011
  * AUTOR: Jaime Castells
   **************************************************/

class Proveedor extends BaseProveedor
{
 
     public function __toString(){
        return sprintf($this->getPrvNombre());
        
    }
    
     /*************************************************
    *Nombre: obtenerNombre($id_codigo)
    *Parametros:
	      - $id_codigo : Representa el codigo de un proveedor.
              
    *Descripción: Esta funcion realiza una consulta en la base de datos y verifica
                  la existencia de un proveedor con código igual al recibido como
                  parámetro y retorna el nombre de dicho Proveedor.
    * Autor: Jaime Castells Pérez
 **************************************************/
    
    public static function obtenerNombre($id_codigo){
        $proveedor=Doctrine_Core::getTable('Proveedor')
                            ->createQuery('p')
                            ->where('p.prv_id= ?',$id_codigo)
                            ->fetchOne();
        return $proveedor->getPrvNombre(); 
    }
    
     /*************************************************
    *Nombre: borrarProveedor($proveedor)
    *Parametros:
	      - $proveedor : Representa el proveedor a eliminar.
              
    *Descripción: Esta función establece como estado del proveedor el valor de -1,
                    que representa que el proveedor está inactivo.
    * Autor: Jaime Castells Pérez
 **************************************************/
    
    public static function borrarProveedor($proveedor){
        $proveedor->setPrvEstado(-1);
        $proveedor->save();
        return;
    }
    
     /*************************************************
    *Nombre: obtenerProveedor($id_codigo)
    *Parametros:
	      - $id_codigo : Representa el codigo de un proveedor.
              
    *Descripción: Busca en la base de datos un proveedor, que tenga el mismo
                  código al mandado como parámetro, y retorna dicho proveedor.
    * Autor: Jaime Castells Pérez
 **************************************************/
    
    public static function obtenerProveedor($id_codigo){
        $proveedor=Doctrine_Core::getTable('Proveedor')
                            ->createQuery('p')
                            ->where('p.prv_id= ?',$id_codigo)
                            ->fetchOne();
        return $proveedor; 
    }
    
     /*************************************************
    *Nombre: consultarProveedorPorNombre($nombre)
    *Parametros:
	      - $nombre : El texto mandado como nombre del proveedor.
              
    *Descripción: Busca en la base de datos todos los proveedores que coincidan
                  con el texto mandado y que no tengan valor de -1, y retorna
                  dicha lista de proveedores.
    * Autor: Jaime Castells Pérez
 **************************************************/
    
     public static function consultarProveedorPorNombre($nombre){
        $proveedores=Doctrine_Core::getTable('Proveedor')
                            ->createQuery('p')
                            ->where('p.prv_nombre like ?',$nombre.'%')
                            //->where('p.prv_nombre = ?',$nombre)
                            ->andWhere('p.prv_estado != -1')
                            ->execute();
        return $proveedores;
    }
    
     /*************************************************
    *Nombre: xmlStringDataProveedores($proveedores,$edit,$delete)
    *Parametros:
	      - $proveedores : Representa la lista de proveedores.
              - $edit : Representa si se ha mandado como orden a editar los proveedores.
              - $delete : Representa si se ha mandado como orden a eliminar los proveedores
              
    *Descripción: Esta función crea un XML con los datos de los proveedores mandandos en el parámetro,
                  y dependiendo de los valores de $edit y $delete, pone los hipervínculos respectivos
                  para editar o eliminar respectivamente.
    * Autor: Jaime Castells Pérez
 **************************************************/

        public static function xmlStringDataProveedores($proveedores,$edit,$delete){
        $output = "<?xml version='1.0' encoding='utf-8'?>" . "\n";
        $output = "<rows>";
        $output .= "\n" . "<page>1</page>" . "\n";
        $output .= "<total>1</total>" . "\n";
        $output .= "<records>" . count($proveedores) . "</records>" . "\n";
        foreach ($proveedores as $proveedor) {
            $output .= "<row id='" . $proveedor->getPrvId() . "'>" . "\n";
            if (strcasecmp($edit,"true")==0)
                $output .= "<cell><![CDATA[<a style='color:#007ED9; text-decoration:underline;' target='_blank' href='" . url_for('Proveedor/edit?prv_id='.$proveedor->getPrvId()) . "'>".strtoupper($proveedor->getPrvNombre())."</a>]]></cell>" . "\n";
            else if (strcasecmp($delete,"true")==0)
                $output .= "<cell><![CDATA[<a style='color:#007ED9; text-decoration:underline;' target='_blank' href='" . url_for('Proveedor/deleteProveedor?prv_id='.$proveedor->getPrvId()) . "'>".strtoupper($proveedor->getPrvNombre())."</a>]]></cell>" . "\n";
            else
                $output .= "<cell><![CDATA[<a style='color:#007ED9; text-decoration:underline;' target='_blank' href='" . url_for('Proveedor/show?prv_id='.$proveedor->getPrvId()) . "'>".strtoupper($proveedor->getPrvNombre())."</a>]]></cell>" . "\n";
            $output .= "<cell>" . $proveedor->getPrvRuc() . "</cell>" . "\n";
            $output .= "<cell>" . ucwords($proveedor->getPrvDireccion()) . "</cell>" . "\n";
            $output .= "<cell>" . $proveedor->getPrvTelefono() . "</cell>" . "\n";
            $output .= "<cell>" . ucwords($proveedor->getPrvResponsable()) . "</cell>" . "\n";
            $output .= "</row>" . "\n";
        }

        $output .= "</rows>" . "\n";
        return $output;

    }
    
}