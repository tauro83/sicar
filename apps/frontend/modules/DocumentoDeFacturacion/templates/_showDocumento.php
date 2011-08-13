<div class="info_producto" id="info_factura">
        <div id="cabecera_documento_cont">
            <div id="info_empresa" >
                <div id="logo_empresa">
                     <img class="logo_emp" src="/images/logo.gif" alt="logo" width="110" height="110" />
                </div>
                <p id="titulo-factura">Automotriz "ROLFER" </p>
                <p id="subtitulo-factura">Ayacucho y Callej&oacute;n Octavo</p>
                <p id="subtitulo2-factura">Guayaquil - Ecuador</p>
            </div>

           <div id="info_tipo_doc">
                <?php if($df->getDocTipo()==1):
                          $tipo="FACTURA";
                      elseif($df->getDocTipo()==2):
                          $tipo="NOTA DE VENTA";
                        elseif($df->getDocTipo()==3):
                          $tipo="PROFORMA";
                      else:
                          $tipo="FACTURA DE COMPRAS";
                      endif;

                ?>
               <span class="tipo_doc_title"> <?php echo $tipo ?></span>
               <table class="table_factura_show">
                   <tbody>
                       <tr>
                           <td>C&oacute;digo Documento</td>
                           <td> <?php echo $df->getDocCodigo()?>
                           </td>
                       </tr>
                       <tr>
                           <td>Fecha Emisi&oacute;n</td>
                           <td><?php echo Fechas::getFechaPersonalizada($df->getDocFechaEmision()); ?></td>
                       </tr>
                   </tbody>
               </table>
           </div>
       </div>
    <?php if($df->getDocTipo()!=4): ?>
        <table class="table_factura_cliente" id="table_fac_cliente">
            <tbody>
                <tr>
                    <td>
                          Identificaci&oacuten
                    </td>
                    <td colspan="5">
                            <?php echo $df->Cliente->getCliIdentificacion()?>
                    </td>
                 </tr>
                 <tr>
                    <td>
                          Cliente
                    </td>
                    <td colspan="5">
                             <?php echo ucwords($df->Cliente->getCliNombre()).' '.ucwords($df->Cliente->getCliApellido()) ?>
                   </td>
                 </tr>

                 <tr>
                   <td>
                          Direcci&oacute;n
                    <td colspan="5">
                             <?php echo ucwords($df->Cliente->getCliDireccion())?>
                    </td>
                 </tr>
                <tr>
                    <td>
                           Tel&eacute;fono
                    </td>
                    <td>
                             <?php echo $df->Cliente->getCliTelefono()?>
                   </td>
                   <td>
                           Celular
                    </td>
                    <td>
                             <?php echo $df->Cliente->getCliCelular()?>
                   </td><td>
                           Correo
                    </td>
                    <td>
                             <?php echo $df->Cliente->getCliCorreo()?>
                   </td>
                 </tr>
                 
             </tbody>
        </table>
      <?php else: ?>
            <table class="table_factura_cliente" id="table_fac_cliente">
            <tbody>
                <tr>
                    <td>
                        RUC
                    </td>
                    <td colspan="3">
                         <?php //echo $df->Proveedor->getCliIdentificacion()?>
                    </td>
                 </tr>
                 <tr>
                    <td>
                        Proveedor
                    </td>
                    <td colspan="3">
                         <?php echo strtoupper($df->Proveedor->getPrvNombre())?>
                    </td>
                 </tr>
                 <tr>
                    <td>
                        Direcci&oacute;n
                    </td>
                    <td>
                         <?php echo strtoupper($df->Proveedor->getPrvDireccion())?>
                    </td>
                    <td>
                        Tel&eacute;fono
                    </td>
                    <td>
                         <?php echo strtoupper($df->Proveedor->getPrvTelefono())?>
                    </td>
                 </tr>
            </tbody>
            </table>

      <?php endif; ?>
    </div>
    <div class="info_producto" id="info_producto">
        <table id="table_factura_show">
                <th style="width:15%; text-align: center">C&oacute;digo.</th>
                <th style="width:15%; text-align: center">Cant.</th>
                <th style="width:40%; text-align: center">Descripci&oacute;n</th>
                <th style="width:20%; text-align: center">V. Unitario</th>
                <th style="width:20%; text-align: center">V. Total</th>
            <thead>
            <tbody id="cuerpo_factura_show">
                <?php
                    $detalles=$df->DetalleDocumento;
                    foreach($detalles as $detalle): ?>
                        <tr>
                        <td><?php echo $detalle->getDetCodigo() ?></td>
                        <td><?php echo $detalle->getDetCantidad() ?></td>
                        <td id="descripcion_factura"><?php echo $detalle->getDetDescripcion() ?></td>
                        <td><?php echo $detalle->getDetValorUnitario() ?></td>
                        <td><?php echo $detalle->getDetValorTotal() ?></td>
                        </tr>
                <?php  endforeach;
                  ?>

            </tbody>
        </table>
    </div>
    <div class="info_producto2" id="info_factura2">
        <table class="table_factura_show_totales">
            <div id="fvendedor" >
            <p>___________________</p>
            <p id="firmaV">Firma Vendedor</p>
            </div>
            <div id="fcliente" >
            <p>___________________</p>
            <p id="firmaC">Firma Cliente</p>
            </div>
            <tbody>
                <tr>
                    <td class="tbl_header">
                          Subtotal
                    </td>
                    <td class="tbl_cont">
                             <?php echo $df->getDocSubTotal()?>
                    </td>

                </tr>
                 <tr>
                    <td class="tbl_header">
                          IVA
                    </td>
                    <td class="tbl_cont">
                            <?php echo $df->getDocIva()?>
                    </td>

                </tr>
                 <tr>
                    <td class="tbl_header">
                          Total
                    </td>
                    <td class="tbl_cont">
                            <?php echo $df->getDocTotalDocumento()?>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>

<input class="btn_submit_form" type="button" value="Guardar como PDF" id="pdf" />
<script type="text/javascript">
// para imprimir en pdf
$().ready(function() {
    $('#pdf').click(function(){
      var f = document.createElement('form');
      f.style.display = 'none';
      this.parentNode.appendChild(f);
      f.method = 'post';

      f.action = '<?php echo url_for('DocumentoDeFacturacion/guardarPdf',array('target'=>'_blank'))?>';
      var m = document.createElement('input');
      var info_factura = $('#info_factura').html();
      var info_producto =  $('#info_producto').html();
      var info_factura2 = $('#info_factura2').html();

      m.setAttribute('type', 'hidden');
      m.setAttribute('name', 'html');
      m.setAttribute('value',info_factura+info_producto+info_factura2);
      f.appendChild(m);
      f.submit();
      return false;
    });
  });
</script>