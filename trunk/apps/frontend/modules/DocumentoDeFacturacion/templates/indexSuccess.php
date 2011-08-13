<h1>Documento de facturacions List</h1>

<table>
  <thead>
    <tr>
      <th>Doc</th>
      <th>Doc codigo</th>
      <th>Doc fecha emision</th>
      <th>Doc cliente</th>
      <th>Det responsable</th>
      <th>Doc sub total</th>
      <th>Doc total documento</th>
      <th>Doc iva</th>
      <th>Doc tipo</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($documento_de_facturacions as $documento_de_facturacion): ?>
    <tr>
      <td><a href="<?php echo url_for('DocumentoDeFacturacion/show?doc_id='.$documento_de_facturacion->getDocId()) ?>"><?php echo $documento_de_facturacion->getDocId() ?></a></td>
      <td><?php echo $documento_de_facturacion->getDocCodigo() ?></td>
      <td><?php echo $documento_de_facturacion->getDocFechaEmision() ?></td>
      <td><?php echo $documento_de_facturacion->getDocClienteId() ?></td>
      <td><?php echo $documento_de_facturacion->getDetResponsable() ?></td>
      <td><?php echo $documento_de_facturacion->getDocSubTotal() ?></td>
      <td><?php echo $documento_de_facturacion->getDocTotalDocumento() ?></td>
      <td><?php echo $documento_de_facturacion->getDocIva() ?></td>
      <td><?php echo $documento_de_facturacion->getDocTipo() ?></td>
      <td><?php echo $documento_de_facturacion->getCreatedAt() ?></td>
      <td><?php echo $documento_de_facturacion->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('DocumentoDeFacturacion/new') ?>">New</a>
