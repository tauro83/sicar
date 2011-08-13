<h1 class="titulo_principal"> Modificar Proveedor: <?php echo $nombre ?></h1>

<?php include_partial('form', array('form' => $form)) ?>
<!-- Llamado a la funcion agregar validaciones -->
 <script type="text/javascript">
     agregarValidacionesProveedor();
 </script>