<?php use_helper('Date') ?>
<?php  if ($producto != null):?>
    <h1 class="titulo_principal"> Producto  cor C&oacute;digo: <?php echo $producto->getProCodigo(); ?></h1>
    <?php include_partial('showProducto', array('producto' => $producto)) ?>
<?php else: ?>
 <h1 class="titulo_principal"> Producto  por C&oacute;digo </h1>
    <div class="ui-widget">
                 <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
                     <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .7em;"></span>
                          <strong> No existen resultados para presentar. </strong>
                     </p>
                 </div>
    </div>
<?php endif; ?>