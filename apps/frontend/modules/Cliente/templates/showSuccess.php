<h1 class="titulo_principal"> Cliente: <?php echo $cliente->getCliNombre(); ?> </h1>
<?php include_partial('showCliente', array('cliente' => $cliente)) ?>