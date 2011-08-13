<?php use_helper('jQuery')?>
<h1 class="titulo_principal">Nuevo Proveedor</h1>
<?php include_partial('form', array('form' => $form)) ?>
<div id="proveedor_mensaje_confir"></div>
<!-- Llamado a la funcion agregar validaciones -->
 <script type="text/javascript">
     agregarValidacionesProveedor();
 </script>