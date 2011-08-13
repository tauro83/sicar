<div class="info_cliente" id="info_general_cliente">
        <div class="info_cliente_titulo"> Datos Proveedor</div>
        <table >
            <tbody>
                <tr>
                    <td class="tabla-titulo">RUC</td>
                    <td class="tabla-contenido"><?php echo $proveedor->getPrvRuc(); ?></td>
                    <td class="tabla-titulo">Nombre </td>
                    <td class="tabla-contenido"><?php echo $proveedor->getPrvNombre(); ?></td>
                    <td class="tabla-titulo">Direcci&oacute;n </td>
                    <td class="tabla-contenido"><?php echo $proveedor->getPrvDireccion(); ?></td>
                 </tr>
                 <tr>
                    <td class="tabla-titulo">Tel&eacute;fono</td>
                    <td class="tabla-contenido"><?php echo $proveedor->getPrvTelefono(); ?></td>
                    <td class="tabla-titulo">Responsable</td>
                    <td class="tabla-contenido"><?php echo $proveedor->getPrvResponsable(); ?></td>
                 </tr>
                 <tr>
                    <td class="tabla-titulo">Fax</td>
                    <td class="tabla-contenido"><?php echo $proveedor->getPrvFax(); ?></td>
                    <td class="tabla-titulo">Correo</td>
                    <td class="tabla-contenido"><?php echo $proveedor->getPrvCorreo(); ?></td>
                 </tr>
                  <tr>
                    <td class="tabla-titulo">Banco</td>
                    <td class="tabla-contenido"><?php echo $proveedor->getPrvNombreBanco(); ?></td>
                    <td class="tabla-titulo">Cuenta</td>
                    <td class="tabla-contenido"><?php echo $proveedor->getPrvNumeroCuenta(); ?></td>
                 </tr>
           </tbody>
        </table>
</div>