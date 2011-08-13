<?php use_helper('jQuery'); ?>
<?php  if ($producto != null):?>
    <h1 class="titulo_principal">Modificar Producto: <?php echo $producto->getProNombre(); ?></h1>
    <?php include_partial('form', array('form' => $form)) ?>
<?php else: ?>
<h1 class="titulo_principal"> Modificar Producto: </h1>
    <div class="ui-widget">
                 <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
                     <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .7em;"></span>
                          <strong> No existen resultados para presentar. </strong>
                     </p>
                 </div>
    </div>
<?php endif; ?>
 
<!-- Llamado a la funcion agregar validaciones -->
 <script type="text/javascript">
     agregarValidacionesProducto();
 </script>