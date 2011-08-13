<?php use_helper('Date') ?>
<h1 class="titulo_principal"> Producto: <?php echo $producto->getProNombre(); ?> </h1>
<?php include_partial('showProducto', array('producto' => $producto)) ?>
