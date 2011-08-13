<?php

/*************************************************
  * NOMBRE: DetalleDocumentoDeFacturacionActions.class.php
  * DESCRIPCION: Clase que maneja los procesos de DetalleDocumentoDeFacturacion del lado del servidor
  * FECHA DE CREACION: 10-06-2011
  * AUTOR: Jose Sumba Zhongor, Ronnny Andrade Parra.
   **************************************************/

class DetalleDocumentoDeFacturacionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->detalle_documento_de_facturacions = Doctrine_Core::getTable('DetalleDocumentoDeFacturacion')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->detalle_documento_de_facturacion = Doctrine_Core::getTable('DetalleDocumentoDeFacturacion')->find(array($request->getParameter('det_id')));
    $this->forward404Unless($this->detalle_documento_de_facturacion);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DetalleDocumentoDeFacturacionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DetalleDocumentoDeFacturacionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($detalle_documento_de_facturacion = Doctrine_Core::getTable('DetalleDocumentoDeFacturacion')->find(array($request->getParameter('det_id'))), sprintf('Object detalle_documento_de_facturacion does not exist (%s).', $request->getParameter('det_id')));
    $this->form = new DetalleDocumentoDeFacturacionForm($detalle_documento_de_facturacion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($detalle_documento_de_facturacion = Doctrine_Core::getTable('DetalleDocumentoDeFacturacion')->find(array($request->getParameter('det_id'))), sprintf('Object detalle_documento_de_facturacion does not exist (%s).', $request->getParameter('det_id')));
    $this->form = new DetalleDocumentoDeFacturacionForm($detalle_documento_de_facturacion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($detalle_documento_de_facturacion = Doctrine_Core::getTable('DetalleDocumentoDeFacturacion')->find(array($request->getParameter('det_id'))), sprintf('Object detalle_documento_de_facturacion does not exist (%s).', $request->getParameter('det_id')));
    $detalle_documento_de_facturacion->delete();

    $this->redirect('DetalleDocumentoDeFacturacion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $detalle_documento_de_facturacion = $form->save();

      $this->redirect('DetalleDocumentoDeFacturacion/edit?det_id='.$detalle_documento_de_facturacion->getDetId());
    }
  }
}
