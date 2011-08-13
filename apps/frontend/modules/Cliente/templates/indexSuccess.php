<h1>Clientes List</h1>

<table>
  <thead>
    <tr>
      <th>Cli</th>
      <th>Cli identificacion</th>
      <th>Cli nombre</th>
      <th>Cli apellido</th>
      <th>Cli direccion</th>
      <th>Cli celular</th>
      <th>Cli telefono</th>
      <th>Cli correo</th>
      <th>Cli estado</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($clientes as $cliente): ?>
    <tr>
      <td><a href="<?php echo url_for('Cliente/show?cli_id='.$cliente->getCliId()) ?>"><?php echo $cliente->getCliId() ?></a></td>
      <td><?php echo $cliente->getCliIdentificacion() ?></td>
      <td><?php echo $cliente->getCliNombre() ?></td>
      <td><?php echo $cliente->getCliApellido() ?></td>
      <td><?php echo $cliente->getCliDireccion() ?></td>
      <td><?php echo $cliente->getCliCelular() ?></td>
      <td><?php echo $cliente->getCliTelefono() ?></td>
      <td><?php echo $cliente->getCliCorreo() ?></td>
      <td><?php echo $cliente->getCliEstado() ?></td>
      <td><?php echo $cliente->getCreatedAt() ?></td>
      <td><?php echo $cliente->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('Cliente/new') ?>">New</a>
