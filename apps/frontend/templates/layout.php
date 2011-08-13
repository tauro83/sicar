<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link rel="SHORTCUT ICON" href="/images/img/8086.ico" type="image/x-icon" />
        <title>SICAR</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
         <?php use_stylesheet('main.css') ?>
        <?php use_stylesheet('factura_pantalla.css') ?>
         <?php use_stylesheet('ui.jqgrid.css') ?>
        <?php use_stylesheet('jquery-ui-1.8.7.custom.css') ?>
         <?php include_stylesheets() ?>

         <?php use_javascript('jquery-1.5.2.min.js') ?>
         <?php use_javascript('jquery-ui-1.8.12.custom.min.js') ?>
         <?php //use_javascript('jquery-1.6.1.js') ?>
         <?php use_javascript('i18n/grid.locale-es.js') ?>
         <?php use_javascript('jquery.jqGrid.min.js') ?>
         <?php use_javascript('liveValidation.js') ?>

         <?php use_javascript('botones.js') ?>
         <?php use_javascript('popup.js') ?>
         <?php use_javascript('validaciones.js') ?>

         <?php include_javascripts() ?>

        <script type="text/javascript">
           $(document).ready(function() {
                dialogs();
            });
        </script>
    </head>
	<body>
            <div id="header">
                <div id="header-inner" style="left: 0px; top: 0px">
                    <img id="logoImg" width="150" height="100" name="logoImg" alt="Logo" src="/images/logo.gif" />
                    <div id="logo-titulo">
                        <h1>SICAR</h1>
                        <h4>Sistema de Inventario y Contabilidad para Automotriz ROLFER</h4>
                    </div>
                </div>
                <?php if ($sf_user->isAuthenticated()): ?>
                  <?php $sf_user->clearCredentials();
                  if ($sf_user->getGuardUser()->getGroupNames() == null){
                      
                  }
                  else
                  {
                      $grupos = $sf_user->getGuardUser()->getGroupNames();
                      for ($i = 0; $i < sizeof($grupos); ++$i)
                      {
                         $sf_user->addCredential($grupos[$i]);
                      }
                  }
                  ?>
                  <div id="menu2">
                      <p><img id="punto" src="/images/punto.png" /> Bienvenido  <?php echo ucwords($sf_user->getGuardUser()->getUsername()) ?> </p>
                       <p id="header-links"><?php if ($sf_user->getGuardUser()->getIsSuperAdmin()){
                           echo link_to('Usuarios', '@sf_guard_user');
                           echo ' | '; } ?>
                        <?php echo link_to('Cerrar sesión', '@sf_guard_signout') ?> </p>


                  </div>
                <?php endif; ?>
<!--                    <img id="banner" src="/images/img/banner.png" />-->
                <?php if ($sf_user->isAuthenticated()): ?>
            <div id="navigation">

                    <ul id="menu" class="menu">
                        <li><a class="non" title="#"></a></li>
                        <li><a href="<?php echo url_for("Inicio/index") ?>">Inicio</a></li>
                        <li><a href="#" >Productos</a>
                            <ul>
                                <li><a href="<?php echo url_for("Producto/new") ?>">Ingresar Producto</a></li>
                                <li><a href='<?php echo url_for("Producto/consultaGenerica?tipo_consulta=codigo&edit=true&delete=false") ?>'>Modificaci&oacute;n de Productos</a></li>
                                <li><a href='<?php echo url_for("Producto/consultaGenerica?tipo_consulta=codigo&edit=false&delete=true") ?>'>Eliminaci&oacute;n de Productos</a></li>
                             </ul>
                        </li>
                        <li><a href="#" >Facturación</a>
                            <ul>
                                <li><a href='<?php echo url_for("DocumentoDeFacturacion/newFacturaCompra") ?>'>Ingreso Factura de Compra</a></li>
                                <li><a href='<?php echo url_for("DocumentoDeFacturacion/new") ?>'>Ingreso Factura</a></li>
                                <li><a href='<?php echo url_for("DocumentoDeFacturacion/newNotaVenta") ?>'>Ingreso Nota de Venta</a></li>
                                <li><a href='<?php echo url_for("DocumentoDeFacturacion/newProforma") ?>'>Ingreso Proforma</a></li>
                                <li>Modificaci&oacute;n de Documento</li>
                                <li><a href='<?php echo url_for("DocumentoDeFacturacion/consultaGenerica?tipo_consulta=codigo") ?>'>Reporte por C&oacute;digo</a></li>
                                <li><a href='<?php echo url_for("DocumentoDeFacturacion/reporteDelDia") ?>'>Reporte del D&iacute;a</a></li>
                                <li><a href='<?php echo url_for("DocumentoDeFacturacion/consultaGenerica?tipo_consulta=fecha") ?>'>Reporte por Fecha</a></li>
                                <li><a href='<?php echo url_for("DocumentoDeFacturacion/consultaGenerica?tipo_consulta=kardex") ?>'>K&aacute;rdex</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Proveedor</a>
                            <ul>
                                <li><a href='<?php echo url_for("Proveedor/new") ?>'>Ingreso de Proveedor</a></li>
                                <li><a href='<?php echo url_for("Proveedor/consulta?edit=false&delete=false") ?>'>Consultar Proveedores</a></li>
                                <li><a href='<?php echo url_for("Proveedor/consulta?edit=true&delete=false") ?>'>Modificar Proveedor</a></li>
                                <li><a href='<?php echo url_for("Proveedor/consulta?edit=false&delete=true") ?>'>Eliminar Proveedor</a></li>
                            </ul>
                        </li>
                        <li><a href="#" >Cliente</a>
                            <ul>
                                <li><a href='<?php echo url_for("Cliente/new")?>'>Ingreso de Cliente</a></li>
                                <li><a href='<?php echo url_for("Cliente/consultaGenerica?tipo_consulta=codigo&edit=false&delete=false")?>'>Consultar Cliente por Identificaci&oacute;n</a></li>
                               <li><a href='<?php echo url_for("Cliente/consultaCliente")?>'>Consultar Cliente por Apellido</a></li>
                                <li><a href='<?php echo url_for("Cliente/consultaGenerica?tipo_consulta=codigo&edit=true&delete=false")?>'>Modificar Cliente</a></li>
                                <li><a href='<?php echo url_for("Cliente/consultaGenerica?tipo_consulta=codigo&edit=false&delete=true")?>'>Eliminar Cliente</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Consulta de productos</a>
                            <ul>
                                <li><a href='<?php echo url_for("Producto/consultaGenerica?tipo_consulta=codigo&edit=false&delete=false") ?>'>Productos por C&oacute;digo</a></li>
                                <li><a href='<?php echo url_for("Producto/consultaGenerica?tipo_consulta=marca&edit=false&delete=false") ?>'>Productos por Marca</a></li>
                                <li><a href='<?php echo url_for("Producto/consultaGenerica?tipo_consulta=nombre&edit=false&delete=false") ?>'>Productos por Nombre</a></li>
                                <li><a href='<?php echo url_for("Producto/consultaGenerica?tipo_consulta=categoria&edit=false&delete=false") ?>'>Productos por Categoría</a></li>
                                <li><a href='<?php echo url_for("Producto/consultaGenerica?tipo_consulta=marca_nombre&edit=false&delete=false") ?>'>Productos por Marca y Nombre</a></li>
                                <li><a href='<?php echo url_for("Producto/codigosLibres") ?>'>Códigos Libres</a></li>
                            </ul>
                        </li>
                    </ul>

                    </div>
                    <?php endif; ?>
            </div>

            <div id="wrapper">                 
<!--              <div id="outer">-->
            
                    <div id="main">
                        <div id="contenido">
                                <?php echo $sf_content ?>
                        </div>
                    </div>
<!--                </div>-->
            
            </div>

            <div id="footer">
                <div class="corners_foot">
                    <span class="right"></span>
                    <?php if ($sf_user->isAuthenticated()): ?>
                    <p>
                        <a href="<?php echo url_for("Inicio/index") ?>" title="#">Inicio&nbsp;|&nbsp;</a>
                        <a href="<?php echo url_for("Producto/new") ?>" title="#">Productos&nbsp;|&nbsp;</a>
                        <a href="<?php echo url_for("DocumentoDeFacturacion/new") ?>" title="#">Facturación&nbsp;|&nbsp;</a>
                        <a href="#" title="#">Proveedor&nbsp;|&nbsp;</a>
                        <a href="#" title="#">Cliente</a>
                    </p>
                    <?php endif; ?>
                    <span class="left"></span>
                </div>
                <div id="copyright">
                    &copy; 2011 DESARROLLADORES. Todos los derechos reservados. <br />
                    Queda prohibida la reporducción total o parcial de este software sin permiso de los autores
                </div>
                <div id="apDiv1"><img  src="/images/desarrolladores.png" width="115" height="72" alt="" />
                </div>
            </div>
	</body>
</html>
