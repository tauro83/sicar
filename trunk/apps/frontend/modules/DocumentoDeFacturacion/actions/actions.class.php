<?php

/*************************************************
  * NOMBRE: DocumentoDeFacturacionActions.class.php
  * DESCRIPCION: Clase que maneja los procesos de DocumentoDeFacturacion del lado del servidor
               
  * FECHA DE CREACION: 10-06-2011
  * AUTOR: Jose Sumba Zhongor, Ronnny Andrade Parra.
   **************************************************/
class DocumentoDeFacturacionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->documento_de_facturacions = Doctrine_Core::getTable('DocumentoDeFacturacion')
      ->createQuery('a')
      ->execute();
  }


  /*************************************************
    *Nombre: executeShow(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Realiza consulta a la base de datos para extraer un producto con
                  id recibido a través de $request
    * Autor: Sumba Zhongor
 **************************************************/

  public function executeShow(sfWebRequest $request)
  {
    $this->df = Doctrine_Core::getTable('DocumentoDeFacturacion')->find(array($request->getParameter('doc_id')));
    $this->forward404Unless($this->df);
  }

  /*************************************************
    *Nombre: executeNew(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Permite instanciar un nuevo documento de facturacion y un nuevo formulario del mismo
                  se establecen valores predeterminados para ciertos atributos del nuevo objeto.
                  y  luego pasa a la respectiva vista.
    * Autor: ROnny Andrade
 **************************************************/

  public function executeNew(sfWebRequest $request)
  {
    $documento=new DocumentoDeFacturacion();
    $documento->setDocTipo(1);
    $documento->setDocResponsable($this->getUser()->getGuardUser()->getUsername()); // Nombre del Autor
    $documento->Cliente->setCliEstado(1);
    $this->form = new DocumentoDeFacturacionForm($documento);
    //$next_id=  DocumentoDeFacturacion::getNextId();
    //echo $next_id;
    //$documento->setDocId($next_id);
    $this->df=$documento;
    $this->titulo="Ingreso de Factura";
    $documento->save();
  }


  /*************************************************
    *Nombre: executeNew(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Permite instanciar un nuevo documento de facturacion y un nuevo formulario del mismo
                  se establecen valores predeterminados para ciertos atributos del nuevo objeto.
                  y  luego pasa a la respectiva vista.
    * Autor: ROnny Andrade
 **************************************************/

  public function executeNewFacturaCompra(sfWebRequest $request)
  {
    $documento=new DocumentoDeFacturacion();
    $documento->setDocTipo(4); // 4 tipo de factura de compras
    $documento->setDocResponsable($this->getUser()->getGuardUser()->getUsername()); // Nombre del Autor
    $documento->setDocClienteId(1); 
    $this->form = new DocumentoDeFacturacionForm($documento);
    $this->df=$documento;
    $this->titulo="Ingreso de Factura de Compras";
    $documento->save();
  }

  /*************************************************
    *Nombre: executeNewNotaVenta(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Permite instanciar un nuevo documento de facturacion y un nuevo formulario del mismo
                  se establecen valores predeterminados para ciertos atributos del nuevo objeto.
                  y  luego pasa a la respectiva vista.
    * Autor: Jhonny Pincay
 **************************************************/

   public function executeNewNotaVenta(sfWebRequest $request)
   {
        $documento=new DocumentoDeFacturacion();
        $documento->setDocTipo(2); // Tipo de Nota de Venta
        $documento->setDocResponsable($this->getUser()->getGuardUser()->getUsername()); // Nombre del Autor
        $documento->setDocClienteId(1); // Id del cliente Default
        $this->form = new DocumentoDeFacturacionForm($documento);
        $documento->save();
        $this->titulo="Ingreso de Nota de Venta";
        $this->df=$documento;
        $this->setTemplate('new');
   }

    /*************************************************
    *Nombre: executeNewProforma(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Permite instanciar un nuevo documento de facturacion y un nuevo formulario del mismo
                  se establecen valores predeterminados para ciertos atributos del nuevo objeto.
                  y  luego pasa a la respectiva vista.
    * Autor: Jhonny Pincay
 **************************************************/

   public function executeNewProforma(sfWebRequest $request)
   {
        $documento=new DocumentoDeFacturacion();
        $documento->setDocTipo(3); // Tipo Proforma
        $documento->setDocResponsable($this->getUser()->getGuardUser()->getUsername()); // Nombre del Autor
        $documento->Cliente->setCliEstado(1);
        $this->form = new DocumentoDeFacturacionForm($documento);
        $documento->save();
        $this->titulo="Ingreso de Proforma";
        $this->df=$documento;
        $this->setTemplate('new');
   }


  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DocumentoDeFacturacionForm();

    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  /*************************************************
    *Nombre: executeEdit(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Realiza una consulta por codigo de documento siendo el objeto
                  recuperado el que será modificado posteriormente para luego pasar a la respectiva vista.
    * Autor: Jhonny PIncay
 **************************************************/

  public function executeEdit(sfWebRequest $request)
  {
     $this->df=DocumentoDeFacturacion::consultarDocumentoPorCodigoEdit($request->getParameter('txt_codigo_documento'));

        if($this->df!= null):
            $this->form = new DocumentoDeFacturacionForm($this->df);
        endif;

//    $this->forward404Unless($documento_de_facturacion = Doctrine_Core::getTable('DocumentoDeFacturacion')->find(array($request->getParameter('doc_id'))), sprintf('Object documento_de_facturacion does not exist (%s).', $request->getParameter('doc_id')));
//    $this->form = new DocumentoDeFacturacionForm($documento_de_facturacion);
//    $this->df=$documento_de_facturacion;
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($documento_de_facturacion = Doctrine_Core::getTable('DocumentoDeFacturacion')->find(array($request->getParameter('doc_id'))), sprintf('Object documento_de_facturacion does not exist (%s).', $request->getParameter('doc_id')));
    $this->form = new DocumentoDeFacturacionForm($documento_de_facturacion);

    $this->processForm($request, $this->form);
    $this->df=$documento_de_facturacion;
    $this->setTemplate('edit');
  }

   /*************************************************
    *Nombre: executeDelete(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Invoca a las funciones necesarias para hacer la eliminacion.
    *
    * Autor: Jhonny Pincay
 **************************************************/

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($documento_de_facturacion = Doctrine_Core::getTable('DocumentoDeFacturacion')->find(array($request->getParameter('doc_id'))), sprintf('Object documento_de_facturacion does not exist (%s).', $request->getParameter('doc_id')));
    $documento_de_facturacion->delete();

    $this->redirect('DocumentoDeFacturacion/index');
  }

     /*************************************************
    *Nombre: executeConsultaPorCodigo($request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Invoca los metodos necesarios para realizar la consulta por
                  codigo de documento
    * Autor: Ronny Andrade Parra
 **************************************************/

  public function executeConsultaPorCodigo(sfWebRequest $request)
  {
        $id_codigo=$request->getParameter('txt_codigo_documento'); //refinardespues
        $this->documento_de_facturacion=DocumentoDeFacturacion::consultarDocumentoPorCodigo($id_codigo);

  }

 


  /*************************************************
    *Nombre: executeConsultaPorFechas($request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Invoca los metodos necesarios para realizar la consulta por
                  fechas de documento
    * Autor: Jhonny Pincay
 **************************************************/

  public function executeConsultaPorFechas(sfWebRequest $request)
  {
        sfContext::getInstance()->getConfiguration()
                        ->loadHelpers('Date');
        sfContext::getInstance()->getConfiguration()
                        ->loadHelpers('jQuery');
        
        $fecha_inicio=$request->getParameter('txt_fecha_inicio_documento');
        $fecha_fin=$request->getParameter('txt_fecha_fin_documento');
        $this->dfs=DocumentoDeFacturacion::consultarDocumentoPorFechas($fecha_inicio,$fecha_fin);
        $this->titulo='Documentos entre: '.Fechas::getFechaPersonalizada($fecha_inicio).' y '.Fechas::getFechaPersonalizada($fecha_fin);
        $this->setTemplate('resultadoConsulta');

  }

  public function executeKardex(sfWebRequest $request)
  {
        sfContext::getInstance()->getConfiguration()
                        ->loadHelpers('Date');
        sfContext::getInstance()->getConfiguration()
                        ->loadHelpers('jQuery');
        $codigo_producto=$request->getParameter('txt_producto_documento');
        $fecha_inicio=$request->getParameter('txt_fecha_inicio_documento');
        $fecha_fin=$request->getParameter('txt_fecha_fin_documento');
        //$dfs=DocumentoDeFacturacion::consultarDocumentoPorFechas($fecha_inicio,$fecha_fin);
        $dfs = DocumentoDeFacturacion::consultarDetallesEntreFechasYPorProducto($fecha_inicio, $fecha_fin, $codigo_producto);
        $this->band=0;
        $this->str_kardex=DocumentoDeFacturacion::consultarProductosKardex2($dfs);
        $this->titulo='Kárdex entre:'.Fechas::getFechaPersonalizada($fecha_inicio).' y '.Fechas::getFechaPersonalizada($fecha_fin);
        $this->cad=strstr($this->str_kardex,'<cell>');
        //echo $this->cad;
       // die();
   }





  /*************************************************
    *Nombre: executeConsultaGenerica($request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Permite obtener un parametro para saber el tipo de consulta que se está haciendo 
    * Autor: Jhonny Pincay
 **************************************************/

  public function executeConsultaGenerica(sfWebRequest $request)
  {
        $this->tipo_consulta=$request->getParameter('tipo_consulta');
        $this->edit=$request->getParameter('edit');
        //$this->delete=$request->getParameter('delete');
  }


/*************************************************
    *Nombre: processForm(sfWebRequest $request, sfForm $form)
    *Parametros:
            - $request : Objeto de tipo sfWebRequest.
    *Descripción: Realiza el procesamiento del form, para mapear los datos ingresados
                 a los objetos respectivos cuando el proceso es exitoso redirige al
                 show del documento
    * Autor: Ronny Andrade Parra
 **************************************************/
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $documento_de_facturacion = $form->save();
      DetalleDocumentoDeFacturacion::limpiar();
      DocumentoDeFacturacion::limpiar();

      if($documento_de_facturacion->getDocTipo()!= 3 && $documento_de_facturacion->getDocTipo()!=4): // Si es proforma no se debe disminuir stock  ni actualizar ultima fecha de venta
         Producto::disminuirStockProducto($documento_de_facturacion);
         Producto::actualizarFechaUltimaVenta($documento_de_facturacion);
         Cliente::limpiar($documento_de_facturacion);
      elseif($documento_de_facturacion->getDocTipo()==3):
              Cliente::limpiar($documento_de_facturacion);
      elseif($documento_de_facturacion->getDocTipo()==4):
         Producto::aumentarStockProducto($documento_de_facturacion);
         Producto::actualizarFechaUltimaCompra($documento_de_facturacion);
         Producto::actualizarUltimoProveedor($documento_de_facturacion);
      endif;
      $this->redirect('DocumentoDeFacturacion/show?doc_id='.$documento_de_facturacion->getDocId());
     // $this->redirect('DocumentoDeFacturacion/notificacionCreacion');
    }
  }



   /*****************************************************************************
    *Nombre: executeGuardarPdf(sfWebRequest $request, sfForm $form)
    *Parametros:
            - $request : Objeto de tipo sfWebRequest.
    *Descripción: Accede al html enviado como parametro en $request, se creo un pdf
            con el html y se agrega un estilo mediante factura_style.
    *Autor: José Sumba Zhongor
    ******************************************************************************/
  public function executeGuardarPdf(sfWebRequest $request)
  {
    $html = $request->getPostParameter('html');
    $mpdf = new mPDF('es_ES','Letter','','',25,25,15,25,16,13);
    $mpdf->useOnlyCoreFonts = true;
    // load a stylesheet
    $stylesheet = file_get_contents(sfConfig::get('sf_web_dir').'/css/factura_style.css');
    $mpdf->WriteHTML($stylesheet,1); // el parámetro le dice que sólo es css y no contenido html
    $mpdf->WriteHTML($html,2);
    $mpdf->Output('Factura.pdf','I');
    throw new sfStopException();
  }
  
    /*****************************************************************************
    *Nombre: executeReporteDelDia(sfWebRequest $request, sfForm $form)
    *Parametros:
            - $request : Objeto de tipo sfWebRequest.
    *Descripción: Accede a la página para mostrar el reporte del día, mientras
   * busca en la base de datos todos los productos vendidos hoy.
    *Autor: Jaime Castells
    ******************************************************************************/
  
  
    public function executeReporteDelDia(sfWebRequest $request){
      $this->lista = DocumentoDeFacturacion::obtenerReporteDelDia();
  }
   
}

