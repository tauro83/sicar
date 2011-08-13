<?php

/*************************************************
  * NOMBRE: ProductoActions.class.php
  * DESCRIPCION: Clase que maneja los procesos de Productos del lado del servidor
                 de productos
  * FECHA DE CREACION: 10-06-2011
  * AUTOR: Jhonny Pincay Nieves, Ronnny Andrade Parra.
   **************************************************/



class ProductoActions extends sfActions
{
  /*************************************************
    *Nombre: executeIndex(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.
              
    *Descripción: Realiza consulta a la base de datos para extraer todos los productos contenidos
                  para luego presentarlos
    * Autor: Ronny Andrade Parra
 **************************************************/

  public function executeIndex(sfWebRequest $request)
  {
    $this->productos = Doctrine_Core::getTable('Producto')
      ->createQuery('a')
      ->execute();
  }

  /*************************************************
    *Nombre: executeShow(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Realiza consulta a la base de datos para extraer un producto con
                  id recibido a través de $request, para luego pasar a la respectiva vista.
    * Autor: Ronny Andrade Parra
 **************************************************/
  public function executeShow(sfWebRequest $request)
  {
    $this->producto = Doctrine_Core::getTable('Producto')->find(array($request->getParameter('pro_id')));
    $this->forward404Unless($this->producto);

  }

  /*************************************************
    *Nombre: executeNew(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Permite instanciar un nuevo producto y un nuevo formulario de producto
                  se establecen valores predeterminados para ciertos atributos del nuevo objeto.
                  y  luego pasa a la respectiva vista.
    * Autor: Jhonny Pincay Nieves
 **************************************************/

  public function executeNew(sfWebRequest $request)
  {
    $producto=new Producto();
    $producto->setProStock(0);
    $producto->setProEstado(0);
    $producto->setProBodega(1);
    $producto->setProPrecioUnitario(0.00);
    $producto->setProPrecioNotaVenta(0.00);
    $producto->setProPrecioFactura(0.00);
    
    $this->form = new ProductoForm($producto);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProductoForm();
    
    $this->processForm($request, $this->form);
    
    $this->setTemplate('new');
   
    
  }


   /*************************************************
    *Nombre: executeEdit(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Realiza una consulta por codigo de producto, siendo el objeto
                  recuperado el que será modificado posteriormente para luego pasar a la respectiva vista.
    * Autor: Sumba Jose
 **************************************************/

  public function executeEdit(sfWebRequest $request)
  {
//    $this->forward404Unless($producto = Doctrine_Core::getTable('Producto')->find(array($request->getParameter('txt_codigo_producto'))), sprintf('Object producto does not exist (%s).', $request->getParameter('pro_id')));
      $this->producto=Producto::consultarProductoPorCodigo($request->getParameter('txt_codigo_producto'));
      if($this->producto!= null):
        $this->form = new ProductoForm($this->producto);
      endif;   
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($producto = Doctrine_Core::getTable('Producto')->find(array($request->getParameter('pro_id'))), sprintf('Object producto does not exist (%s).', $request->getParameter('pro_id')));
    $this->producto=$producto;
    $this->form = new ProductoForm($producto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  /*************************************************
    *Nombre: executeDelete(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Invoca a las funciones necesarias para hacer la eliminacion.
    *
    * Autor: José Sumba Zhongor
 **************************************************/


  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->producto=Producto::consultarProductoPorCodigo($request->getParameter('codigo_producto'));
    
     if($this->producto!= null):
         Producto::borrarProducto($this->producto);
          //$this->producto->borrarProducto();
      endif;

    //$this->redirect('Producto/index');
    $this->setTemplate('notificacionBorrador');
    //$this->forward404Unless($producto = Doctrine_Core::getTable('Producto')->find(array($request->getParameter('pro_id'))), sprintf('Object producto does not exist (%s).', $request->getParameter('pro_id')));
    //$producto->delete();

    
  }

     /*************************************************
    *Nombre: executeDeleteProducto(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Realiza una consulta por codigo de producto, siendo elobjeto
                  recuperado el que será eliminado posteriormente
    *
    * Autor: José Sumba Zhongor
 **************************************************/

  public function executeDeleteProducto(sfWebRequest $request){
      $this->producto=Producto::consultarProductoPorCodigo($request->getParameter('txt_codigo_producto'));
      if($this->producto!= null):
        $this->form = new ProductoForm($this->producto);
      endif;
  }


    /*************************************************
    *Nombre: executeConsultaGenerica(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Acción que lee los parametros enviados en el request
                  que serán empleados luego en la visa para mostrar la consulta a ejecutar.
    *
    * Autor: José Sumba Zhongor
 **************************************************/

   public function executeConsultaGenerica(sfWebRequest $request)
  {
        $this->tipo_consulta=$request->getParameter('tipo_consulta');
        $this->edit=$request->getParameter('edit');
        $this->delete=$request->getParameter('delete');
  }


   /*************************************************
    *Nombre: executeConsultaPorCodigo($request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Invoca los metodos necesarios para realizar la consulta por
                  codigo de producto
    * Autor: Ronny Andrade Parra
 **************************************************/


  public function executeConsultaPorCodigo(sfWebRequest $request)
  {
        $idcodigo=$request->getParameter('txt_codigo_producto');
        $this->producto=Producto::consultarProductoPorCodigo($idcodigo);
  }

   /*************************************************
    *Nombre: executeConsultaPorMarca($request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Invoca los metodos necesarios para realizar la consulta por
                  marca de producto
    * Autor: Jhonny Pincay Nieves
 **************************************************/

   public function executeConsultaPorMarca(sfWebRequest $request)
  {
        $marca=$request->getParameter('txt_marca_producto');
        $this->productos=Producto::consultarProductosPorMarca($marca);
        $this->titulo='Productos con Marca: '.$marca;
        
        $this->setTemplate('resultadoConsulta');
  }

  /*************************************************
    *Nombre: executeConsultaPorNombre$request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Invoca los metodos necesarios para realizar la consulta por
                  nombre de producto
    * Autor: Jaime Castells Pérez
 **************************************************/

   public function executeConsultaPorNombre(sfWebRequest $request)
  {
        $nombre=$request->getParameter('txt_nombre_producto');
        $this->productos=Producto::consultarProductosPorNombre($nombre);
        $this->titulo='Productos con Nombre '.$nombre;
        $this->setTemplate('resultadoConsulta');
  }


  /*************************************************
    *Nombre: executeConsultaPorMarcaNombre$request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Invoca los metodos necesarios para realizar la consulta por
                  nombre y marca de producto
    * Autor: Jaime Castells Perez
 **************************************************/

   public function executeConsultaPorMarcaNombre(sfWebRequest $request)
  {
        $marca=$request->getParameter('txt_marca_producto');
        $nombre=$request->getParameter('txt_nombre_producto');
        if(strlen($nombre)==0):
           $this->productos=Producto::consultarProductosPorMarca($marca);
           $this->titulo='Productos con Marca: '.$marca;
        else:
            $this->productos=Producto::consultarProductosPorMarcaNombre($marca,$nombre);
            $this->titulo='Productos con Marca: '.$marca.' y Nombre: '.$nombre;
        endif;

        $this->setTemplate('resultadoConsulta');
  }

   /*************************************************
    *Nombre: executeConsultaPorCategoria($request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Invoca los metodos necesarios para realizar la consulta por
                  categoria del producto.
    * Autor: Jose Sumba Zhongor
 **************************************************/
   public function executeConsultaPorCategoria(sfWebRequest $request)
  {
        $categoria=$request->getParameter('txt_categoria_producto');
        $this->productos=Producto::consultarProductosPorCategoria($categoria);
        $this->titulo='Productos con Categoría: '.$categoria;
        $this->setTemplate('resultadoConsulta');
  }

   /*************************************************
    *Nombre: executeObtenerXMLMarcas(sfWebRequest $request)
    *Parametros:
            - $request : Objeto de tipo sfWebRequest.
    *Descripción: Invoca los métodos necesarios para generar xml con las marcas
                  diferentes de productos.
    * Autor: Jaime Castells Pérez
 **************************************************/

  public function executeObtenerXMLMarcas(sfWebRequest $request){
      $marcas=Producto::getMarcas();
      $this->getResponse()->setContentType('text/xml');
        $output = '<marcas>';
        $i=0;
        for($i=0;$i<count($marcas);$i++){
            $output.="\n" . '<marca>' . "\n" . '<nombre>' . $marcas[$i]->getProMarca() . '</nombre>' . "\n";
            $output .='</marca>' . "\n";
        }
        $output.='</marcas>';
        echo $output;
        return sfView::NONE;

  }


  /*************************************************
    *Nombre: executeObtenerXMLCategorias(sfWebRequest $request)
    *Parametros:
            - $request : Objeto de tipo sfWebRequest.
    *Descripción: Invoca los métodos necesarios para generar xml con las categorias
                  diferentes productos.
    * Autor: Jaime Castells Pérez
 **************************************************/


   public function executeObtenerXMLCategorias(sfWebRequest $request){
      $categorias=Producto::getCategorias();
      $this->getResponse()->setContentType('text/xml');
        $output = '<categorias>';
        $i=0;
        for($i=0;$i<count($categorias);$i++){
            $output.="\n" . '<categoria>' . "\n" . '<nombre>' . $categorias[$i]->getProCategoria() . '</nombre>' . "\n";
            $output .='</categoria>' . "\n";
        }
        $output.='</categorias>';
        echo $output;
        return sfView::NONE;

  }

  /*************************************************
    *Nombre: executeObtenerXMLOrigenes(sfWebRequest $request)
    *Parametros:
            - $request : Objeto de tipo sfWebRequest.
    *Descripción: Invoca los métodos necesarios para generar xml con las categorias
                  diferentes productos.
    * Autor: José Sumba Zhongor
 **************************************************/

  public function executeObtenerXMLOrigenes(sfWebRequest $request){
      $origenes=Producto::getOrigenes();
      $this->getResponse()->setContentType('text/xml');
        $output = '<origenes>';
        $i=0;
        for($i=0;$i<count($origenes);$i++){
            $output.="\n" . '<origen>' . "\n" . '<nombre>' . $origenes[$i]->getProOrigen() . '</nombre>' . "\n";
            $output .='</origen>' . "\n";
        }
        $output.='</origenes>';
        echo $output;
        return sfView::NONE;
  }

  /*************************************************
    *Nombre: executeObtenerXMLProductoCodigo(sfWebRequest $request)
    *Parametros:
            - $request : Objeto de tipo sfWebRequest.
    *Descripción: Invoca los métodos necesarios para generar xml con los datos de un producto
    * Autor: Jhonny Pincay Nieves
 **************************************************/
  public function executeObtenerXMLProductoCodigo(sfWebRequest $request){
       $idcodigo=$request->getParameter('codigo_prod');
       $this->producto=Producto::consultarProductoPorCodigo($idcodigo);
       $this->getResponse()->setContentType('text/xml');
       $output=Producto::xmlProductoCodigo($this->producto);
       echo $output;
       return sfView::NONE;
  }

  
 /*************************************************
    *Nombre: processForm(sfWebRequest $request, sfForm $form)
    *Parametros:
            - $request : Objeto de tipo sfWebRequest.
    *Descripción: Realiza el procesamiento del form, para mapear los datos ingresados
                 a los objetos respectivos cuando el proceso es exitoso redirige al
                 show del producto
    * Autor: Ronny Andrade Parra
 **************************************************/
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $producto = $form->save();

      $this->redirect('Producto/show?pro_id='.$producto->getProId());
    }
  }



  /***************************************************************************
    *Nombre: executeGuardarPdf(sfWebRequest $request, sfForm $form)
    *Parametros:
            - $request : Objeto de tipo sfWebRequest.
    *Descripción: Accede al html enviado como parametro en $request, se creo n pdf
            con el html, se agrega un estilo mediante productoConsultaPDF.css.
    * Autor: José Sumba Zhongor
    ****************************************************************************/
  public function executeGuardarPdf(sfWebRequest $request)
  {
        $html = $request->getPostParameter('html');
        $mpdf = new mPDF('es_ES','Letter','','',25,25,15,25,16,13);
        $mpdf->useOnlyCoreFonts = true;
        $stylesheet = file_get_contents(sfConfig::get('sf_web_dir').'/css/productoConsultaPDF.css'); //load a stylesheet
        $mpdf->WriteHTML($stylesheet,1); // el parámetro le dice que sólo es css y no contenido html
        $mpdf->WriteHTML($html,2);
        $mpdf->Output('ConsultaProducto.pdf','I');
        throw new sfStopException();
  }
  
    /*************************************************
    *Nombre: executeCodigosLibres(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Presenta una lista de códigos de productos libres.
    * Autor: Jaime Castells
 **************************************************/
  
  public function executeCodigosLibres(sfWebRequest $request){
      $this->productos = Producto::consultarProductosPorNombre("");
  }
  
}
