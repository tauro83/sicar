<h1>Proveedors List</h1>

<table>
  <thead>
    <tr>
      <th>Prv</th>
      <th>Prv codigo</th>
      <th>Prv nombre</th>
      <th>Prv info</th>
      <th>Prv direccion</th>
      <th>Prv telefono</th>
      <th>Prv correo</th>
      <th>Prv estado</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($proveedors as $proveedor): ?>
    <tr>
      <td><a href="<?php echo url_for('Proveedor/show?prv_id='.$proveedor->getPrvId()) ?>"><?php echo $proveedor->getPrvId() ?></a></td>
      <td><?php echo $proveedor->getPrvCodigo() ?></td>
      <td><?php echo $proveedor->getPrvNombre() ?></td>
      <td><?php echo $proveedor->getPrvDireccion() ?></td>
      <td><?php echo $proveedor->getPrvTelefono() ?></td>
      <td><?php echo $proveedor->getPrvCorreo() ?></td>
      <td><?php echo $proveedor->getPrvEstado() ?></td>
      <td><?php echo $proveedor->getCreatedAt() ?></td>
      <td><?php echo $proveedor->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('Proveedor/new') ?>">New</a>
