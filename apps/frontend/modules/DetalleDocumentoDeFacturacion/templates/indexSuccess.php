<h1>Detalle documento de facturacions List</h1>

<table>
  <thead>
    <tr>
      <th>Det</th>
      <th>Det cantidad</th>
      <th>Det descripcion</th>
      <th>Det valor unitario</th>
      <th>Det valor total</th>
      <th>Det documento</th>
      <th>Det producto</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($detalle_documento_de_facturacions as $detalle_documento_de_facturacion): ?>
    <tr>
      <td><a href="<?php echo url_for('DetalleDocumentoDeFacturacion/show?det_id='.$detalle_documento_de_facturacion->getDetId()) ?>"><?php echo $detalle_documento_de_facturacion->getDetId() ?></a></td>
      <td><?php echo $detalle_documento_de_facturacion->getDetCantidad() ?></td>
      <td><?php echo $detalle_documento_de_facturacion->getDetDescripcion() ?></td>
      <td><?php echo $detalle_documento_de_facturacion->getDetValorUnitario() ?></td>
      <td><?php echo $detalle_documento_de_facturacion->getDetValorTotal() ?></td>
      <td><?php echo $detalle_documento_de_facturacion->getDetDocumentoId() ?></td>
      <td><?php echo $detalle_documento_de_facturacion->getDetProductoId() ?></td>
      <td><?php echo $detalle_documento_de_facturacion->getCreatedAt() ?></td>
      <td><?php echo $detalle_documento_de_facturacion->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('DetalleDocumentoDeFacturacion/new') ?>">New</a>
