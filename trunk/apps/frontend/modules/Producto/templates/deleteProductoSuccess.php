<?php use_helper('jQuery'); ?>
<?php  if ($producto != null):?>
    <h1 class="titulo_principal">Eliminar Producto: <?php echo $producto->getProNombre(); ?></h1>

    <?php include_partial('showProducto', array('producto' => $producto)) ?>
    <div id="Eliminar">
        <?php echo link_to('Eliminar', 'Producto/delete?codigo_producto='.$producto->getProCodigo(), array('method' => 'delete', 'confirm' => '¿Está seguro que desea eliminar el producto?')) ?>
    </div>

 <?php else: ?>
 <h1 class="titulo_principal"> Eliminar Producto: </h1>
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
     /*************************************************
        Llama a la funcion agregarValidaciones que corre los scripts necesarios
        realizar validaciones de los campos.
     **************************************************/
     agregarValidaciones();
 </script>