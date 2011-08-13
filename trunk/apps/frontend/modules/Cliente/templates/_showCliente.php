<div class="info_cliente" id="info_general_cliente">
        <div class="info_cliente_titulo"> Datos Cliente</div>
        <table >
            <tbody>
                <tr>
                    <td class="tabla-titulo">Identificaci&oacute;n</td>
                    <td class="tabla-contenido"><?php echo  $cliente->getCliIdentificacion(); ?></td>
                 </tr>
                 <tr>
                    <td class="tabla-titulo">Nombres</td>
                    <td class="tabla-contenido"><?php echo ucwords($cliente->getCliNombre()); ?></td>
                    <td class="tabla-titulo">Apellidos</td>
                    <td class="tabla-contenido"><?php echo ucwords($cliente->getCliApellido()); ?></td>
                 </tr>
                 <tr>
                    <td class="tabla-titulo">Direcci&oacute;n</td>
                    <td class="tabla-contenido"><?php echo ucwords($cliente->getCliDireccion()); ?></td>
                    <td class="tabla-titulo">Tel&eacute;fono</td>
                    <td class="tabla-contenido"><?php echo $cliente->getCliTelefono(); ?></td>
                 </tr>
                 <tr>
                    <td class="tabla-titulo">Celular</td>
                    <td class="tabla-contenido"><?php echo $cliente->getCliCelular() ?></td>
                    <td class="tabla-titulo">Correo</td>
                    <td class="tabla-contenido"><?php echo $cliente->getCliCorreo() ?></td>
                 </tr>
             </tbody>
        </table>
</div>