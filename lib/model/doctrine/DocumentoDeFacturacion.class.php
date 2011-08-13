<?php

/*************************************************
  * NOMBRE: DocumentoDeFacturacion.class.php
  * DESCRIPCION: Clase que manejara los datos de los documentos de facturacion y metododos de
 *               consulta a la base de datos.
  * FECHA DE CREACION: 10-06-2011
  * AUTOR: Ronny Andrade Parra
   **************************************************/
class DocumentoDeFacturacion extends BaseDocumentoDeFacturacion
{

//    public function save(Doctrine_Connection $conn = null) {
//        if ($this->isNew()) {
//           // $this->DetalleDocumento[0]->save();
//        }
//        parent::save($conn);
//        $this->DetalleDocumento[0]->setDetDocumentoId($this->getDocId());
//        return parent::save($conn);
//    }
    /*************************************************
    *Nombre: consultarDocumentoPorCodigo($id_codigo)
    *Parametros:
	      - $id_codigo : Representa el codigo de un documento.

    *Descripción: Esta funcion realiza una consulta en la base de datos y verifica
                  la existencia de un documento  con codigo igual al recibido como parametro
                  
    * Autor: Ronny Andrade Parra
 **************************************************/

    public static function consultarDocumentoPorCodigo($id_codigo){
        $doc_facturacion=Doctrine_Core::getTable('DocumentoDeFacturacion')
                            ->createQuery('d')
                            ->where('d.doc_codigo= ?',$id_codigo)
                            //->andWhere('p.pro_estado != -1')
                            ->fetchOne();

        return $doc_facturacion;
    }

     /*************************************************
    *Nombre: consultarDocumentoPorFechas($fecha_inicio,$fecha_fin)
    *Parametros:
	      - $fecha_inicio : Fecha inicio de la búsqueda.
              - $fecha_fin: Fecha fin de la búsqueda.

    *Descripción: Esta funcion realiza una consulta en la base de datos y verifica
                  la existencia de un documento  con fecha de emisión entre las fechas
                  recibidas como parámetro.

    * Autor: Jhonny Pincay
 **************************************************/

    public static function consultarDocumentoPorFechas($fecha_inicio,$fecha_fin){
        $dfs=Doctrine_Core::getTable('DocumentoDeFacturacion')
                            ->createQuery('d')
                            ->where('d.doc_fecha_emision>= ?',$fecha_inicio)
                            ->andWhere('d.doc_fecha_emision<= ?',$fecha_fin)
                            ->execute();
        return $dfs;
    }
    
    public static function consultarDetallesEntreFechasYPorProducto($fecha_inicio,$fecha_fin,$producto){
        $detalles = Doctrine_Core::getTable('DetalleDocumentoDeFacturacion')
                            ->createQuery('p')
                            ->leftJoin('p.Producto pr')
                            ->andWhere('p.det_codigo = pr.pro_codigo')
                            ->leftJoin('p.DocumentoDeFacturacion d')
                            ->andWhere('p.det_documento_id = d.doc_id')
                            ->andWhere('d.doc_fecha_emision>= ?',$fecha_inicio)
                            ->andWhere('d.doc_fecha_emision<= ?',$fecha_fin)
                            ->andWhere('p.det_codigo = ?', $producto) 
                            ->andWhere('d.doc_tipo <> 3')
                            ->execute();
        return $detalles;
    }
    
    public static function consultarProductosKardex2($dfs){
      $output = "<?xml version='1.0' encoding='utf-8'?>" . "\n";
       $output = "<rows>";
       $output .= "\n" . "<page>1</page>" . "\n";
       $output .= "<total>1</total>" . "\n";
       $output .= "<records>" . count($dfs) . "</records>" . "\n";
        foreach($dfs as $df):
                     if($df->DocumentoDeFacturacion->getDocTipo()==1||$df->DocumentoDeFacturacion->getDocTipo()==2):
                        $trans="Venta";
                     else:
                        $trans="Compra";
                     endif;
                    $output .= "<row id='" . $df->getDetId() . "'>" . "\n";
                    $output .= "<cell>" . Fechas::getFechaPersonalizada($df->DocumentoDeFacturacion->getDocFechaEmision())."</cell>" . "\n";
                    $output .= "<cell>" .$trans."</cell>" . "\n";
                    $output .= "<cell>" .$df->getDetCantidad()."</cell>" . "\n";
                    $output .= "<cell>" .$df->getDetValorTotal()."</cell>" . "\n";
                    $output .= "<cell>" .$df->DocumentoDeFacturacion->getDocCodigo()."</cell>" . "\n";
                    $output .= "</row>" . "\n";
          endforeach;
       $output .= "</rows>" . "\n";
       return $output;
    }

    public static function consultarProductosKardex($dfs,$codigo_producto){
       $output = "<?xml version='1.0' encoding='utf-8'?>" . "\n";
       $output = "<rows>";
       $output .= "\n" . "<page>1</page>" . "\n";
       $output .= "<total>1</total>" . "\n";
       $output .= "<records>" . count($dfs) . "</records>" . "\n";
        foreach($dfs as $df):
           if($df->getDocTipo()!=3):
               $detalles=$df->DetalleDocumento;
               foreach($detalles as $det):
                     $producto=$det->Producto;
                     if($producto->getProCodigo()==$codigo_producto):
                          $band=1;
                         if($df->getDocTipo()==1||$df->getDocTipo()==2):
                            $trans="Venta";
                         else:
                            $trans="Compra";
                         endif;
                        $output .= "<row id='" . $producto->getProId() . "'>" . "\n";
                        $output .= "<cell>" . Fechas::getFechaPersonalizada($df->getDocFechaEmision())."</cell>" . "\n";
                        $output .= "<cell>" .$trans."</cell>" . "\n";
                        $output .= "<cell>" .$det->getDetCantidad()."</cell>" . "\n";
                        $output .= "<cell>" .$det->getDetValorTotal()."</cell>" . "\n";
                        $output .= "<cell>" .$df->getDocCodigo()."</cell>" . "\n";
                        $output .= "</row>" . "\n";
                     endif;
               endforeach;
           endif;
       endforeach;
       $output .= "</rows>" . "\n";
       return $output;

    }



    /*************************************************
    *Nombre: xmlProductoDocumentos($dfs)
    *Parametros:
	      -$dfs: Representa una colección de documentos de facturacion
    *Descripción: Esta funcion devuelve una cadena que representa un xml
                  con los datos del producto enviado como parámetro
    * Autor: Jhonny Pincay
 **************************************************/


     public static function xmlStringDataDocumentos($dfs){
        $output = "<?xml version='1.0' encoding='utf-8'?>" . "\n";
        $output = "<rows>";
        $output .= "\n" . "<page>1</page>" . "\n";
        $output .= "<total>1</total>" . "\n";
        $output .= "<records>" . count($dfs) . "</records>" . "\n";
        foreach ($dfs as $df) {
            if($df->getDocTipo()==1):
                    $tipo="Factura";
            elseif($df->getDocTipo()==2):
                    $tipo="Nota de Venta";
            else:
                    $tipo="Proforma";
            endif;
            $output .= "<row id='" . $df->getDocId() . "'>" . "\n";
            //$output .= "<cell>" . $df->getDocCodigo() . "</cell>" . "\n";
            $output .= "<cell><![CDATA[<a target='_blank' href='" . url_for('DocumentoDeFacturacion/show?doc_id='.$df->getDocId()) . "'>".$df->getDocCodigo()."</a>]]></cell>" . "\n";
            $output .= "<cell>" . Fechas::getFechaPersonalizada($df->getDocFechaEmision()). "</cell>" . "\n";
            $output .= "<cell>" . $df->getDocTotalDocumento() . "</cell>" . "\n";
            $output .= "<cell>" . $df->Cliente->getCliNombre().' '.$df->Cliente->getCliApellido(). "</cell>" . "\n";
            $output .= "<cell>" .$tipo."</cell>" . "\n";
            $output .= "</row>" . "\n";
        }
        $output .= "</rows>" . "\n";
        return $output;

    }

     /*************************************************
    *Nombre: getNextId()
    *Parametros:

    *Descripción: Esta funcion devuelve el siguiente id´mas uno de los deocumentos
                  guardados en la base de datos.
    * Autor: Jhonny Pincay
 **************************************************/

    public static function getNextId(){

       $doc = Doctrine_Query::create()
        ->select('MAX(doc_id) AS doc_id')
        ->from('DocumentoDeFacturacion')
        ->execute();
       return $doc->getFirst()->getDocId()+1;

    }

     /*************************************************
    *Nombre: limpiar()
    *Parametros:

    *Descripción: Esta funcion borra de la base de datos documentos de facturacion
                  creados en blanco.
    * Autor: Jhonny Pincay
     **************************************************/

     public static function limpiar(){
        $docs=Doctrine_Core::getTable('DocumentoDeFacturacion')
                            ->createQuery('d')
                            ->where('d.doc_codigo is NULL')
                            ->execute();

       foreach($docs as $doc){
           $doc->delete();
       }
    }
    
    public static function obtenerReporteDelDia(){
        $productos=Doctrine_Core::getTable('DetalleDocumentoDeFacturacion')
                            ->createQuery('p')
                            ->leftJoin('p.Producto pr')
                            ->andWhere('p.det_codigo = pr.pro_codigo')
                            ->leftJoin('p.DocumentoDeFacturacion d')
                            ->andWhere('p.det_documento_id = d.doc_id')
                            ->andWhere('d.doc_fecha_emision=? ', date("Y-m-d"))
                            ->execute();
        return $productos;
    }
    
    public static function xmlReporteDelDia($lista){
        $output = "<?xml version='1.0' encoding='utf-8'?>" . "\n";
        $output = "<rows>";
        $output .= "\n" . "<page>1</page>" . "\n";
        $output .= "<total>1</total>" . "\n";
        $output .= "<records>" . count($lista) . "</records>" . "\n";
        foreach ($lista as $detalle) {
            $utilidad = ($detalle->getDetValorUnitario() - $detalle->Producto->getProPrecioUnitario());
            $output .= "<row>";
            $output .= "<cell>" . strtoupper($detalle->Producto->getProNombre()) . "</cell>" . "\n";
            $output .= "<cell>" . $detalle->getDetCantidad() . "</cell>" . "\n";
            $output .= "<cell>" . $detalle->getDetValorUnitario() . "</cell>" . "\n";
            $output .= "<cell>" . $detalle->Producto->getProPrecioUnitario() . "</cell>" . "\n";
            $output .= "<cell>" . $utilidad . "</cell>" . "\n";
            $output .= "<cell>" . ($utilidad * $detalle->getDetCantidad()) . "</cell>" . "\n"; 
            $output .= "<cell>" . round(($utilidad * 100) / $detalle->Producto->getProPrecioUnitario(),2) .'%' . "</cell>" . "\n";
            $output .= "<cell>" . $detalle->DocumentoDeFacturacion->getDocResponsable() . "</cell>" . "\n";
            $output .= "</row>" . "\n";
        }

        $output .= "</rows>" . "\n";
        return $output;
    }
    
}