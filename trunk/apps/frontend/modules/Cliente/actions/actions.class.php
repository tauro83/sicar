<?php

/*************************************************
  * NOMBRE: actions.class.php
  * DESCRIPCION: Clase que maneja los procesos de cliente del lado del servidor
  * FECHA DE CREACION: 21-07-2011
  * AUTOR: José Luis Sumba
   **************************************************/

class ClienteActions extends sfActions
{
    /***************************************************************************
    *Nombre: executeIndex(sfWebRequest $request)
    *Parametros:
          - $request : Objeto de tipo sfWebRequest.

    *Descripción: Realiza consulta a la base de datos para extraer todos los clientes contenidos
                para luego presentarlos
    * Autor: Jose Sumba
    ****************************************************************************/
    public function executeIndex(sfWebRequest $request)
    {
        $this->clientes = Doctrine_Core::getTable('Cliente')
        ->createQuery('a')
        ->execute();
    }

    /*************************************************
        *Nombre: executeShow(sfWebRequest $request)
        *Parametros:
                  - $request : Objeto de tipo sfWebRequest.

        *Descripción: Realiza consulta a la base de datos para extraer un cliente con
                      id recibido a través de $request, para luego pasar a la respectiva vista.
       * Autor: José Luis Sumba
    ***************************************************/
    public function executeShow(sfWebRequest $request)
    {
        $this->cliente = Doctrine_Core::getTable('Cliente')->find(array($request->getParameter('cli_id')));
        $this->forward404Unless($this->cliente);
    }



    /*************************************************
    *Nombre: executeNew(sfWebRequest $request)
    *Parametros:
              - $request : Objeto de tipo sfWebRequest.

    *Descripción: Permite instanciar un nuevo cliente y un nuevo formulario de cliente
                  se establece el estado con un valor predeterminado del nuevo cliente.
                  y  luego pasa a la respectiva vista.
    * Autor: Jhonny Pincay Nieves
    **************************************************/
    public function executeNew(sfWebRequest $request)
    {
        $cliente = new Cliente();
        $cliente->setCliEstado(1);
        $this->form = new ClienteForm($cliente);
    }



    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ClienteForm();


        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }



    /*************************************************
    *Nombre: executeEdit(sfWebRequest $request)
    *Parametros:
              - $request : Objeto de tipo sfWebRequest.

    *Descripción: Realiza una consulta por identificación de cliente, Dicho objeto es enviado en un formulario a
                la vista correspondiente.
    * Autor: José Luis Sumba
    **************************************************/
    public function executeEdit(sfWebRequest $request)
    {
        $this->cliente=Cliente::consultarClientePorIdentificacion($request->getParameter('txt_codigo_cliente'));
        if($this->cliente!= null):
            $this->form = new ClienteForm($this->cliente);
        endif;
    }




  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($cliente = Doctrine_Core::getTable('Cliente')->find(array($request->getParameter('cli_id'))), sprintf('Object cliente does not exist (%s).', $request->getParameter('cli_id')));
    $this->form = new ClienteForm($cliente);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }



    /*************************************************
    *Nombre: executeDelete(sfWebRequest $request)
    *Parametros:
              - $request : Objeto de tipo sfWebRequest.

    *Descripción: Se invoca a los métodos necesarios para la eliminación
    * Autor: José Luis Sumba
    **************************************************/
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();
        $this->cliente=Cliente::consultarClientePorIdentificacion($request->getParameter('codigo_cliente'));
        if($this->cliente!= null):
                Cliente::borrarCliente($this->cliente);
        endif;
        $this->setTemplate('notificacionBorrador');
    }


     /**************************************************************************
    *Nombre: executeDeleteCliente(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción:  Se consulta el objeto a modificar, se elimina el objeto.
    *
    * Autor: José Sumba Zhongor
    ****************************************************************************/
    public function executeDeleteCliente(sfWebRequest $request){
        $this->cliente=Cliente::consultarClientePorIdentificacion($request->getParameter('txt_codigo_cliente'));
        if($this->cliente!= null):
            $this->form = new ClienteForm($this->cliente);
        endif;
    }



    /***************************************************************************
    *Nombre: processForm(sfWebRequest $request, sfForm $form)
    *Parametros:
            - $request : Objeto de tipo sfWebRequest.
    *Descripción: Realiza el procesamiento del form, para mapear los datos ingresados
                 a los objetos respectivos cuando el proceso es exitoso redirige al
                 show del cliente para mostrar los detalles.
    * Autor: Ronny Andrade Parra
    ****************************************************************************/
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $cliente = $form->save();
            $this->redirect('Cliente/show?cli_id='.$cliente->getCliId());
        }
    }


    /***************************************************************************
    *Nombre: executeConsultaGenerica(sfWebRequest $request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Acción que lee los parametros enviados en el request
                  para realizar o la consulta o la modificación o la eliminación.
    *
    * Autor: José Sumba Zhongor
    ****************************************************************************/
    public function executeConsultaGenerica(sfWebRequest $request)
    {
        $this->tipo_consulta=$request->getParameter('tipo_consulta');
        $this->edit=$request->getParameter('edit');
        $this->delete=$request->getParameter('delete');
    }

     public function executeConsultaCliente(sfWebRequest $request)
    {
        
    }



    /***************************************************************************
    *Nombre: executeConsultaPorIdentificacion($request)
    *Parametros:
	      - $request : Objeto de tipo sfWebRequest.

    *Descripción: Invoca los metodos necesarios para realizar la consulta por
                  identificacíón del cliente
    * Autor: Ronny Andrade Parra
    ****************************************************************************/
    public function executeConsultaPorIdentificacion(sfWebRequest $request)
    {
        $idcodigo=$request->getParameter('txt_codigo_cliente');
        $this->cliente=Cliente::consultarClientePorIdentificacion($idcodigo);
    }

     public function executeConsultaPorApellidos(sfWebRequest $request)
    {
        $apellido=$request->getParameter('txt_apellido_cliente');
        $this->clientes=Cliente::consultarClientePorApellidos($apellido);
        $this->titulo="Clientes con apellido: ".$apellido;
    }

    public function executeObtenerXMLClienteCedula(sfWebRequest $request){
       $cedcliente=$request->getParameter('cedula_cli');
       $this->cliente=Cliente::consultarClientePorIdentificacion($cedcliente);
       $this->getResponse()->setContentType('text/xml');
       $output=Cliente::xmlStringDataCliente($this->cliente);
       echo $output;
       return sfView::NONE;
  }
    
}