<?php  if ($cliente != null):?>
    <h1 class="titulo_principal"> Cliente  por Identificaci&oacute;n:<?php echo  $cliente->getCliIdentificacion(); ?></h1>
    <?php include_partial('showCliente', array('cliente' => $cliente)) ?>
<?php else: ?>
<h1 class="titulo_principal">  Cliente  por Identificaci&oacute;n </h1>
    <div class="ui-widget">
                 <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
                     <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .7em;"></span>
                          <strong> No existen resultados para presentar. </strong>
                     </p>
                 </div>
    </div>
<?php endif; ?>