<?php

/*************************************************
  * NOMBRE: ProveedorActions.class.php
  * DESCRIPCION: Clase que maneja los procesos de Proveedor del lado del servidor
                 de proveedor
  * FECHA DE CREACION: 19-07-2011
  * AUTOR: Jhonny Pincay Nieves, Jaime Castells Pérez.
   **************************************************/


class ProveedorActions extends sfActions
{
   /*************************************************
    *Nombre: executeIndex(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.
              
    *Descripción: Realiza consulta a la base de datos para extraer todos los proveedores contenidos
                  para luego presentarlos
    * Autor: Jaime Castells Pérez
 **************************************************/

    
  public function executeIndex(sfWebRequest $request)
  {
    $this->proveedors = Doctrine_Core::getTable('Proveedor')
      ->createQuery('a')
      ->execute();
  }
  
    /*************************************************
    *Nombre: executeShow(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Realiza consulta a la base de datos para extraer un proveedor con
                  id recibido a través de $request, para luego pasar a la respectiva vista.
    * Autor: Jaime Castells Pérez
 **************************************************/

  public function executeShow(sfWebRequest $request)
  {
    $this->proveedor = Doctrine_Core::getTable('Proveedor')->find(array($request->getParameter('prv_id')));
    $this->forward404Unless($this->proveedor);
  }
  
    /*************************************************
    *Nombre: executeShow(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Realiza la creación de un nuevo proveedor para mostrar un formulario
                  para llenar sus datos. Se inicializa el valor de 1 en PrvEstado que indica que está activo.
    * Autor: Jaime Castells Pérez
 **************************************************/

  public function executeNew(sfWebRequest $request)
  {
    $proveedor=new Proveedor();
    $proveedor->setPrvEstado(1);
    $this->form = new ProveedorForm($proveedor);
  }
  
    /*************************************************
    *Nombre: executeEliminar(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Obtiene el identificador del proveedor mandado como parámetro, busca el proveedor en la base
                   y lo elimina, mostrando un mensaje de operación satisfactoria.
    * Autor: Jaime Castells Pérez
 **************************************************/
  
  public function executeEliminar(sfWebRequest $request){
      $proveedor = Proveedor::obtenerProveedor($request->getParameter('prv_id'));
      Proveedor::borrarProveedor($proveedor);
      $this->mensaje="Proveedor: ".Proveedor::obtenerNombre($proveedor->getPrvId()) ." eliminado satisfactoriamente.";
  }
  
    /*************************************************
    *Nombre: executeCreate(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Muestra un formulario para crear un Proveedor.
    * Autor: Jaime Castells Pérez
 **************************************************/

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProveedorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
  
    /*************************************************
    *Nombre: executeEdit(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Llama al formulario para editar un Proveedor, cuyo id es capturado
                  en el request. El nombre se lo obtiene para ser mostrado en pantalla.
    * Autor: Jaime Castells Pérez
 **************************************************/

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($proveedor = Doctrine_Core::getTable('Proveedor')->find(array($request->getParameter('prv_id'))), sprintf('Object proveedor does not exist (%s).', $request->getParameter('prv_id')));
    $this->form = new ProveedorForm($proveedor);
    $this->nombre =  Proveedor::obtenerNombre($request->getParameter('prv_id'));
  }
  
    /*************************************************
    *Nombre: executeUpdate(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Realiza el proceso de mostrar el formulario para actualizar
                  un proveedor.
    * Autor: Jaime Castells
 **************************************************/

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($proveedor = Doctrine_Core::getTable('Proveedor')->find(array($request->getParameter('prv_id'))), sprintf('Object proveedor does not exist (%s).', $request->getParameter('prv_id')));
    $this->form = new ProveedorForm($proveedor);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
    /*************************************************
    *Nombre: executeDelete(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Realiza la función de eliminar un proveedor, obteniendo su id en el request
                   y buscándolo en la base de datos.
    * Autor: Jaime Castells Pérez
 **************************************************/

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->proveedor=Proveedor::obtenerProveedor($request->getParameter('prv_id'));
     if($this->proveedor!= null):
         Proveedor::borrarProveedor($this->proveedor);
      endif;
    $this->setTemplate('notificacionBorrador');
  }

  public function executeDeleteProveedor(sfWebRequest $request){
      $this->proveedor=Proveedor::obtenerProveedor($request->getParameter('prv_id'));
      if($this->proveedor!= null):
        $this->form = new ProveedorForm($this->Proveedor);
      endif;
 }

  
    /*************************************************
    *Nombre: executeConsulta(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Obtiene los valores de edit y delete del request para ser procesados
                  posteriormente.
    * Autor: Jaime Castells Pérez
 **************************************************/
  
   public function executeConsulta(sfWebRequest $request)
  {
       $this->edit = $request->getParameter('edit');
       $this->delete = $request->getParameter('delete');
  }
  
    /*************************************************
    *Nombre: executeConsultaPorNombre(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Busca todos los proveedores con la cadena mandada en el request,
     *            y inicializa los valores de consulta y delete para ser procesados luego.
    * Autor: Jaime Castells Pérez
 **************************************************/
  
  public function executeConsultaPorNombre(sfWebRequest $request){
        $nombre=$request->getParameter('txt_nombre_proveedor');
        $this->proveedores=Proveedor::consultarProveedorPorNombre($nombre);
        $this->titulo="Proveedores por Nombre: ".$nombre;
        $this->consulta=$request->getParameter('edit');
        $this->delete=$request->getParameter('delete');
  }
  
  /*************************************************
    *Nombre: processForm(sfWebRequest $request, sfForm $form)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.
              - $form : Objeto de tipo sfForm.

    *Descripción: Realiza el proceso de grabado correspondiente luego de la creación
                  de un proveedor, y muestra luego los datos de dicho proveedor en pantalla.
    * Autor: Jaime Castells Pérez
 **************************************************/

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $proveedor = $form->save();

      $this->redirect('Proveedor/show?prv_id='.$proveedor->getPrvId());
    }
  }
  
}
