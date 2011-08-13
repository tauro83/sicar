<h1>Listado Productos</h1>

<table>
  <thead>
    <tr>
      <th>Pro</th>
      <th>Pro codigo</th>
      <th>Pro nombre</th>
      <th>Pro descripcion</th>
      <th>Pro marca</th>
      <th>Pro categoria</th>
      <th>Pro stock</th>
<!--      <th>Pro referencia</th>-->
      <th>Pro estado</th>
      <th>Pro ultima venta</th>
      <th>Pro ultima compra</th>
      <th>Pro precio unitario</th>
      <th>Pro precio nota venta</th>
      <th>Pro precio factura</th>
<!--      <th>Pro ultimo proveedor</th>-->
<!--      <th>Pro proveedor</th>-->
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($productos as $producto): ?>
    <tr>
      <td><a href="<?php echo url_for('Producto/show?pro_id='.$producto->getProId()) ?>"><?php echo $producto->getProId() ?></a></td>
      <td><?php echo $producto->getProCodigo() ?></td>
      <td><?php echo $producto->getProNombre() ?></td>
      <td><?php echo $producto->getProDescripcion() ?></td>
      <td><?php echo $producto->getProMarca() ?></td>
      <td><?php echo $producto->getProCategoria() ?></td>
      <td><?php echo $producto->getProStock() ?></td>
      
      <td><?php echo $producto->getProEstado() ?></td>
      <td><?php echo $producto->getProUltimaVenta() ?></td>
      <td><?php echo $producto->getProUltimaCompra() ?></td>
      <td><?php echo $producto->getProPrecioUnitario() ?></td>
      <td><?php echo $producto->getProPrecioNotaVenta() ?></td>
      <td><?php echo $producto->getProPrecioFactura() ?></td>
      <td><?php echo $producto->getCreatedAt() ?></td>
      <td><?php echo $producto->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a  href="<?php echo url_for('Producto/consultaPorCodigo?idcodigo=1') ?>">Consultar Producto por codigo</a>
  <a  href="<?php echo url_for('Producto/consultaPorCategoria?categoria=2') ?>">Consultar Producto por categoria</a>
<a  href="<?php echo url_for('Producto/consultaPorReferencia?referencia=1') ?>">Consultar Producto por referencia</a>

  
  <a href="<?php echo url_for('Producto/new') ?>">New</a>
  <a href="<?php echo url_for('Producto/ConsultaPorMarca?marca=patito') ?>">Consultar por Marca</a>
