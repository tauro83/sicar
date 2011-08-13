
<?php if($producto->getProStock()==0):?>
        <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
                <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
                <strong>Producto Agotado.</strong>
                </p>
        </div>

<?php elseif($producto->getProStock()<=5): ?>
            <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
                 <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .7em;"></span>
                      <strong> Producto en stock bajo. </strong>
                 </p>
             </div>
<?php endif; ?>

    <div class="info_producto" id="info_general_producto">
        <div class="info_producto_titulo" > Datos Generales </div>
        <table>
            <tbody>
                <tr>
                    <td class="tabla-titulo">C&oacute;digo:</td>
                    <td class="tabla-contenido"><?php echo $producto->getProCodigo(); ?></td>
                    <td class="tabla-titulo">Producto:</td>
                    <td class="tabla-contenido"><?php echo $producto->getProNombre(); ?></td>
                 </tr>
                 <tr>
                    <td class="tabla-titulo">Marca:</td>
                    <td class="tabla-contenido"><?php echo $producto->getProMarca(); ?></td>
                    <td class="tabla-titulo">Categoria:</td>
                    <td class="tabla-contenido"><?php echo $producto->getProCategoria(); ?></td>
                 </tr>
                 <tr>
                    <td class="tabla-titulo">Detalle:</td>
                    <td class="tabla-contenido"><?php echo $producto->getProDescripcion(); ?></td>
                    <td class="tabla-titulo">Origen:</td>
                    <td class="tabla-contenido"><?php echo $producto->getProOrigen(); ?></td>
                 </tr>
             </tbody>
        </table>
    </div>

    <div class="info_producto" id="info_movimientos_producto">
        <div class="info_producto_titulo" > Datos de Proveedores y Ventas </div>
        <table>
            <tbody>
                <tr>
                    <td class="tabla-titulo">&Uacute;ltimo Proveedor:</td>
                    <td class="tabla-contenido"><?php echo $producto->Proveedor->getPrvNombre();  ?></td>
                    <td class="tabla-titulo">Stock:</td>
                    <td class="tabla-contenido"><?php echo $producto->getProStock(); ?></td>
                 </tr>
                 <tr>
                    <td class="tabla-titulo">&Uacute;ltima Venta:</td>
                    <?php if ($producto->getProUltimaVenta()!=NULL): ?>
                        <td class="tabla-contenido"><?php echo Fechas::getFechaPersonalizada($producto->getProUltimaVenta()); ?></td>
                     <?php else: ?>
                        <td class="tabla-contenido"><?php echo '-' ?></td>
                     <?php endif; ?>
                    <td class="tabla-titulo">&Uacute;ltima Compra:</td>
                    <?php if ($producto->getProUltimaCompra()!= null): ?>
                        <td class="tabla-contenido"><?php echo Fechas::getFechaPersonalizada($producto->getProUltimaCompra()); ?></td>
                     <?php else: ?>
                        <td class="tabla-contenido"><?php echo '-' ?></td>
                     <?php endif; ?>
                    
                 </tr>
             </tbody>
        </table>
    </div>

     <div class="info_producto" id="info_precios_producto">
         <div class="info_producto_titulo" > Precios </div>
        <table>
            <tbody>
                <tr>
                    <td class="tabla-titulo">Precio Unitario:</td>
                    <td class="tabla-contenido"><?php echo $producto->getProPrecioUnitario(); ?></td>
                </tr>
                <tr>
                    <td class="tabla-titulo">Precio Nota Venta</td>
                    <td class="tabla-contenido"><?php echo $producto->getProPrecioNotaVenta(); ?></td>
                </tr>
                <tr>
                    <td class="tabla-titulo">Precio Factura</td>
                    <td class="tabla-contenido"><?php echo $producto->getProPrecioFactura(); ?></td>
                 </tr>
             </tbody>
        </table>
    </div>


