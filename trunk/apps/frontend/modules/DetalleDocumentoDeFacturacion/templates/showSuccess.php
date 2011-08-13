<table>
  <tbody>
    <tr>
      <th>Det:</th>
      <td><?php echo $detalle_documento_de_facturacion->getDetId() ?></td>
    </tr>
    <tr>
      <th>Det cantidad:</th>
      <td><?php echo $detalle_documento_de_facturacion->getDetCantidad() ?></td>
    </tr>
    <tr>
      <th>Det descripcion:</th>
      <td><?php echo $detalle_documento_de_facturacion->getDetDescripcion() ?></td>
    </tr>
    <tr>
      <th>Det valor unitario:</th>
      <td><?php echo $detalle_documento_de_facturacion->getDetValorUnitario() ?></td>
    </tr>
    <tr>
      <th>Det valor total:</th>
      <td><?php echo $detalle_documento_de_facturacion->getDetValorTotal() ?></td>
    </tr>
    <tr>
      <th>Det documento:</th>
      <td><?php echo $detalle_documento_de_facturacion->getDetDocumentoId() ?></td>
    </tr>
    <tr>
      <th>Det producto:</th>
      <td><?php echo $detalle_documento_de_facturacion->getDetProductoId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $detalle_documento_de_facturacion->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $detalle_documento_de_facturacion->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('DetalleDocumentoDeFacturacion/edit?det_id='.$detalle_documento_de_facturacion->getDetId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('DetalleDocumentoDeFacturacion/index') ?>">List</a>
