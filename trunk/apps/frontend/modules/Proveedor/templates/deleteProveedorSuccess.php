<?php use_helper('jQuery'); ?>
<?php  if ($proveedor != null):?>
    <h1 class="titulo_principal">Eliminar Proveedor: <?php echo $proveedor->getPrvNombre(); ?></h1>

    <?php include_partial('showProveedor', array('proveedor' => $proveedor)) ?>
    <div id="Eliminar">
        <?php echo link_to('Eliminar', 'Proveedor/delete?prv_id='.$proveedor->getPrvId(), array('method' => 'delete', 'confirm' => '¿Está seguro que desea eliminar el proveedor?')) ?>
    </div>

 <?php else: ?>
 <h1 class="titulo_principal"> Eliminar Proveedor </h1>
    <div class="ui-widget">
                 <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
                     <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .7em;"></span>
                          <strong> No existen resultados para presentar. </strong>
                     </p>
                 </div>
    </div>
<?php endif; ?>
