<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="new_doc_facturacion" action="<?php echo url_for('DocumentoDeFacturacion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?doc_id='.$form->getObject()->getDocId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
            
      <div id="cabecera_documento">
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
                           <td><?php echo $form['doc_codigo']->renderLabel(null, array('class' => 'lbl_form')); ?></td>
                           <td> <?php echo $form['doc_codigo'] ?>
                                <?php echo $form['doc_codigo']->renderError() ?>
                           </td>
                       </tr>
                       <tr>
                           <td><?php echo $form['doc_fecha_emision']->renderLabel(null, array('class' => 'lbl_form')); ?></td>
                           <td><?php echo $form['doc_fecha_emision'] ?></td>
                       </tr>
                   </tbody>
               </table>
           </div>
       </div>

         <?php if($df->getDocTipo()==2): ?>
              <div>
                 <?php echo $form['cliente'][0]['cli_identificacion']->render(array("value"=>$df->Cliente->getCliIdentificacion(),"id" =>"id_cliente", "type"=>"hidden"))?>
                 <?php echo $form['cliente'][0]['cli_nombre']->render(array("value"=>$df->Cliente->getCliNombre(),"id" =>"nombre_cliente","type"=>"hidden")) ?>
                 <?php echo $form['cliente'][0]['cli_apellido']->render(array("value"=>$df->Cliente->getCliApellido(),"id" =>"apellido_cliente", "type"=>"hidden")) ?>
                 <?php echo $form['cliente'][0]['cli_telefono']->render(array("value"=>$df->Cliente->getCliTelefono(), "id" =>"telf_cliente", "type"=>"hidden")) ?>
                 <?php echo $form['cliente'][0]['cli_estado']->render(array("value"=>"1")) ?>
              </div>
         <?php endif; ?>

        <table class="table_factura_cliente">
           <?php if($df->getDocTipo()==1 || $df->getDocTipo()==3): ?>
                <tbody>
                    <tr>
                        <td>
                              <?php echo $form['cliente'][0]['cli_identificacion']->renderLabel(); ?>
                        </td>
                        <td colspan="5">
                                <?php echo $form['cliente'][0]['cli_identificacion']->render(array("id"=>"cli_identificacion", "onblur" => "consultarDetallesCliente()"))?>
                                <?php echo $form['cliente'][0]['cli_identificacion']->renderError() ?>
                                <img src="/images/loader2.gif" alt="add_producto" id="loader_cliente" class="hidden" />
                       </td>
                      </tr>
                      <tr>
                        <td>Cliente</td>
                        <td colspan="5">
                              <?php echo $form['cliente'][0]['cli_nombre']->renderLabel(); ?>
                              <?php echo $form['cliente'][0]['cli_nombre']->render(array('class' => 'campo_medio')); ?>
                              <?php echo $form['cliente'][0]['cli_apellido']->renderLabel(); ?>
                              <?php echo $form['cliente'][0]['cli_apellido']->render(array('class' => 'campo_medio')); ?>
                        </td>
                     </tr>
                     <tr>
                        <td>
                              <?php echo $form['cliente'][0]['cli_direccion']->renderLabel(); ?>
                        </td>
                        <td colspan="5">
                                <?php echo $form['cliente'][0]['cli_direccion']->render(array('class' => 'campo_largo')) ?>
                        </td>
                     </tr>
                     <tr>
                        <td>
                              <?php echo $form['cliente'][0]['cli_telefono']->renderLabel(); ?>
                        </td>
                        <td>
                                <?php echo $form['cliente'][0]['cli_telefono']->render(array('class' => 'campo_corto')) ?>
                       </td>

                        <td>
                              <?php echo $form['cliente'][0]['cli_celular']->renderLabel(); ?>
                        </td>
                        <td>
                                <?php echo $form['cliente'][0]['cli_celular']->render(array('class' => 'campo_corto')) ?>
                       </td>
                       <td>
                              <?php echo $form['cliente'][0]['cli_correo']->renderLabel(); ?>
                        </td>
                        <td>
                                <?php echo $form['cliente'][0]['cli_correo']->render(array('class' => 'campo_corto')) ?>
                                
                       </td>
                     </tr>
                 </tbody>
             <?php elseif($df->getDocTipo()==2): ?>
                 <tbody>
                    <tr>
                        <td>
                              Identificaci&oacuten:
                        </td>
                        <td>
                              <?php echo $df->Cliente->getCliIdentificacion()?>
                       </td>
                       
                    </tr>
                    <tr>
                        <td>
                              Cliente:
                        </td>
                        <td>
                                 <?php echo $df->Cliente->getCliNombre().' '.$df->Cliente->getCliApellido()?>
                       </td>

                    </tr>
                     <tr>
                        <td>
                               Tel&eacute;fono
                        </td>
                        <td>
                                <?php echo $df->Cliente->getCliTelefono()?>
                       </td>
                     </tr>
                     
                 </tbody>
            <?php endif; ?>
        </table>
    </div>
    <div class="info_producto">
        <table id="cuerpo_factura">
            
            <thead>
                <th style="width:3%"></th>
                <th>C&oacute;digo.</th>
                <th>Cant.</th>
                <th>Descripci&oacute;n</th>
                <th>V. Unitario</th>
                <th>V. Total</th>
            <thead>
            <tbody>
            <?php for($i=1;$i<=count($df->DetalleDocumento);$i++) { ?>
             <tr>
                <td><img src="/images/loader2.gif" alt="add_producto" id="<?php echo "loader_".$i ?>" class="hidden" /></td>
                <td class="texto-codigo"><?php echo $form['detalle_'.$i]['det_codigo']->render(array("id"=>"det_codigo_".$i, "onblur" => "consultarDetallesProducto('$i')")) ?></td>
                <td class="texto-cantidad"><?php echo $form['detalle_'.$i]['det_cantidad']->render(array("id"=>"det_cantidad_".$i, "onblur" => "calcularVTotal('$i')")) ?></td>
                <td class="texto-descripcion"><?php echo $form['detalle_'.$i]['det_descripcion']->render(array("id"=>"det_descripcion_".$i)) ?></td>
                <td class="texto-unitario"><?php echo $form['detalle_'.$i]['det_valor_unitario']->render(array("id"=>"det_val_unitario_".$i, "onblur" => "validarPrecio('$i'); calcularVTotal('$i'); ")) ?></td>
                <td class="texto-total"><?php echo $form['detalle_'.$i]['det_valor_total']->render(array("id"=>"det_val_total_".$i)) ?></td>
                <td><?php echo $form['detalle_'.$i]['det_producto_id']->render(array("id"=>"det_producto_id_".$i,"style"=>"display:none")) ?></td>
                <td><?php echo $form['detalle_'.$i]['det_documento_id']->render(array("id"=>"det_documento_id_".$i,"style"=>"display:none","value"=>$form->getObject()->getDocId())) ?></td>
                <td><input type="text" style="display:none" id="<?php echo 'det_stock_'.$i?>" /></td>
                <td><input type="text" style="display:none" id="<?php echo 'det_val_nv_'.$i?>" /></td>
             </tr>
            <?php } ?>
            </tbody>
         </table>
    </div>
    <div class="info_producto2">
        <table class="table_factura_show_totales">
            <div id="fvendedor" >
            <p>___________________________</p>
            <p id="firmaV">Firma Vendedor</p>
            </div>
            <div id="fcliente" >
            <p>___________________________</p>
            <p id="firmaC">Firma Cliente</p>
            </div>
            <tbody>
                <tr>
                    <td>
                          <?php echo $form['doc_sub_total']->renderLabel(null, array('class' => 'lbl_form')); ?>
                    </td>
                    <td>
                            <?php echo $form['doc_sub_total']->render(array("id"=>"doc_sub_total")) ?>
                    </td>

                </tr>
                
                     <tr>
                        <td>
                              <?php echo $form['doc_iva']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td>
                             <?php if($df->getDocTipo()==1): ?>
                                <?php echo $form['doc_iva']->render(array("id"=>"doc_iva")) ?>
                             <?php else: ?>
                                <?php echo $form['doc_iva']->render(array("id"=>"doc_iva","value"=>"0.00")) ?>
                             <?php endif; ?>
                        </td>

                       </tr>                 
                 <tr>
                    <td>
                          <?php echo $form['doc_total_documento']->renderLabel(null, array('class' => 'lbl_form')); ?>
                    </td>
                    <td>
                            <?php echo $form['doc_total_documento']->render(array("id"=>"doc_total")) ?>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
    <?php echo $form->renderHiddenFields(); // ----- MUY IMPORTANTE?>
<!--    <input class="btn_submit_form" id="btn_submit_factura" type="submit" value="Guardar" />-->

</form>
     <input type="button" class="btn_submit_form" id="btn_submit_factura" onclick="enviarFormularioDoc2();" value="Guardar" />

<script type="text/javascript">
     $(document).ready(function () {
        //tableToGrid("#cuerpo_factura");
     });

     /*************************************************
        *Nombre:  consultarDetallesProducto(identificador)
        *Parametros:
                - identificador: Indice que referencia al numero de formulario embebido.

        *Descripción: Funcion a ser llamada cuando se pierde el foco de un elemento y consulta
                      los datos de los producto para el codigo correspondiente ingresado.
        * Autor: Jhonny Pincay Nieves
    **************************************************/
     function consultarDetallesProducto(identificador){
        //  var codigo_tecla;
//          if (event.keyCode)
//              codigo_tecla = event.keyCode;
//          else if (event.which)
//              codigo_tecla = event.which;
//          else
//          return false;
          var loading=document.getElementById("loader_"+identificador);
          
//         if (codigo_tecla == 9){
            var codigo_consulta= document.getElementById("det_codigo_"+identificador).value;            
            if(codigo_consulta!=''){
            loading.setAttribute("class", "");
           $.ajax({
             type: "GET",
             url: '<?php echo url_for('Producto/obtenerXMLProductoCodigo?codigo_prod=') ?>'+codigo_consulta,
             dataType: "xml",
             success: function(xml){
                     $(xml).find("producto").each(function () {
                              if($(this).find("mensaje").text() == "Producto Encontrado"){
                                $('#det_descripcion_'+identificador).val($(this).find("nombre").text());
                                $('#det_val_unitario_'+identificador).val($(this).find("precioUnit").text());
                                $('#det_val_nv_'+identificador).val($(this).find("precioNV").text());
                                $('#det_producto_id_'+identificador).val($(this).find("id").text());
                                $('#det_stock_'+identificador).val($(this).find("stock").text());
                               }else{
                                  alert($(this).find("mensaje").text());
                                  resetCamposDetalle(identificador);                                 
                              }
                          });
                          loading.setAttribute("class", "hidden");
                  }
            });
            }

      return true;
     }

   /*************************************************
        *Nombre:  resetCAmposDetalle(identificador)
        *Parametros:
                - identificador: Indice que referencia al numero de formulario embebido.

        *Descripción: Setea enblanco el valor para los campos codigo, descripcion, valor unitario
                      cantidad, total.
        * Autor: Jhonny Pincay Nieves
    **************************************************/
   function resetCamposDetalle(identificador){
         $('#det_codigo_'+identificador).val('');
         $('#det_descripcion_'+identificador).val('');
         $('#det_val_unitario_'+identificador).val('');
         $('#det_cantidad_'+identificador).val('');
         $('#det_val_total_'+identificador).val('');

   }

   /*************************************************
        *Nombre:  calcularVtotal(identificador)
        *Parametros:
                - identificador: Indice que referencia al numero de formulario embebido.

        *Descripción: Funcion que calcula el valor total de un producto dado el precio y el detalle
                      si no existe el stock suficiente emite una alerta.
        * Autor: Jhonny Pincay Nieves
    **************************************************/
   function calcularVTotal(identificador){
//       var codigo_tecla;
//        if (event.keyCode)
//            codigo_tecla = event.keyCode;
//        else if (event.which)
//            codigo_tecla = event.which;
//        else
//            return false;

//        if (codigo_tecla == 9){
            var stock_val=$('#det_stock_'+identificador).val();
            var stock=parseInt($('#det_stock_'+identificador).val())
            var cantidad= parseInt($('#det_cantidad_'+identificador).val());
            if(stock_val!=''){
                if(cantidad<=stock){
                        var precio=parseFloat($('#det_val_unitario_'+identificador).val());
                        if(cantidad && precio){
                              $('#det_val_total_'+identificador).val((cantidad*precio).toFixed(2));
                        }
                //        }

                    calcularSubTotal();
                    <?php if($df->getDocTipo()==1): ?>
                        calcularIVA();
                    <?php endif; ?>
                    calcularTotal();
                }else{
                    $('#det_val_total_'+identificador).val('');
                    $('#det_cantidad_'+identificador).val('');
                    calcularSubTotal();
                    <?php if($df->getDocTipo()==1): ?>
                        calcularIVA();
                     <?php endif; ?>
                    calcularTotal();
                    alert("NO existen suficientes productos: Stock("+stock+")");

                }
            }
   }


   function validarPrecio (identificador){
       var prec_fact=$('#det_val_unitario_'+identificador).val();
       var prec_nv=$('#det_val_nv_'+identificador).val();
       if(parseFloat(prec_fact) < parseFloat(prec_nv)){
           alert("El precio de venta no debe ser menor a ("+prec_nv+")");
           $('#det_val_unitario_'+identificador).val('');
       }
   }
  /*************************************************
        *Nombre:  calcularSubTotal()
        *Parametros:


        *Descripción: Calcula la suma de los valores totales de cada detalle
                      y coloca el valor en el campo subtotal.
        * Autor: Jhonny Pincay Nieves
    **************************************************/
   function calcularSubTotal(){
       var sub_total=0;
       for(var i=1; i<=10; i++){
           var parcial= $('#det_val_total_'+i).val();
           if(parcial){
               sub_total=sub_total + parseFloat(parcial);
           }
       }
      $('#doc_sub_total').val(sub_total.toFixed(2));
   }

   /*************************************************
        *Nombre:  calcularIVA()
        *Parametros:


        *Descripción: Multiplica por 0.12 el valor del subtotal y lo coloca en el campo
                      iva.
        * Autor: Jhonny Pincay Nieves
    **************************************************/
   function calcularIVA(){
       var sub_total=$('#doc_sub_total').val();
       if(sub_total){
           $('#doc_iva').val((parseFloat(sub_total) * 0.12).toFixed(2));
       }
   }

   /*************************************************
        *Nombre:  calcularTotal()
        *Parametros:
             

        *Descripción: Calcula la suma de los valores de subtotal e iva y lo coloca en
                      el campo total del documento.
        * Autor: Jhonny Pincay Nieves
    **************************************************/
   function calcularTotal(){
       var sub_total=$('#doc_sub_total').val();
       var iva=$('#doc_iva').val();

       if(sub_total && iva){
           $('#doc_total').val((parseFloat(sub_total)+parseFloat(iva)).toFixed(2));
       }
   }


 /*************************************************
        *Nombre:  validarItem(indice)
        *Parametros:
             -indice: Representa un indice de detalle de documento

        *Descripción: Valida que los datos en un detalle se encuentren completos
        * Autor: Jose Sumba
    **************************************************/

function validarItem(indice){
    var codigo = document.getElementById("det_codigo_"+indice);
    //alert(codigo.value.length+"codigo"+codigo.value+"!");
    if(codigo.value.length==0){
        var cantidad = document.getElementById("det_cantidad_"+indice);
        if(cantidad.value.length==0){
            var descripcion = document.getElementById("det_descripcion_"+indice);
            if(descripcion.value.length==0){
                var valor_unitario = document.getElementById("det_val_unitario_"+indice);
                if(valor_unitario.value.length==0){
                    var valor_total = document.getElementById("det_val_total_"+indice);
                    if(valor_total.value.length==0){
                        return true;
                    }else{
                        return false;}
                }else{
                    return false;}
            }else{
                return false;}
        }else{
            return false;}
    }else{
        var cantidadc = document.getElementById("det_cantidad_"+indice);
        if(cantidadc.value.length!=0){
            var descripcionc = document.getElementById("det_descripcion_"+indice);
            if(descripcionc.value.length!=0){
                var valor_unitarioc = document.getElementById("det_val_unitario_"+indice);
                if(valor_unitarioc.value.length!=0){
                    var valor_totalc = document.getElementById("det_val_total_"+indice);
                    if(valor_totalc.value.length!=0){
                        return true;
                    }else{
                        return false;}
                }else{
                    return false;}
            }else{
                return false;}
        }else{
            return false;}
    }
}


/*************************************************
        *Nombre:  validarExistenciaItem()
        *Parametros:
         *Descripción: Valida que al menos exista un item en la factura
        * Autor: Jhonny Pincay Nieves
    **************************************************/

function validarExistenciaItem(){
    var numero_items = 10;
    var contador=0;
    var bandera=false;
    var i=0;
        for(i=1 ; i<=numero_items ; i++){
             var codigo = document.getElementById("det_codigo_"+i);
             if(codigo.value.length!=0){
                bandera=true;
             }
        }
        return bandera;
}

/*************************************************
        *Nombre:  validarExistenciaItem()
        *Parametros:
         *Descripción: Valida que al menos exista un item en la factura
        * Autor: Jhonny Pincay Nieves
    **************************************************/

function validarItemsCompletosFactura(){
    var numero_items = 10;
    var bandera=true;
    var i=0;
        for(i=1 ; i<=numero_items ; i++){
            bandera = bandera && validarItem(i);
        }
       // alert("validacion: "+bandera);
        return bandera;
}

/*************************************************
        *Nombre:  validarFacturaLlena()
        *Parametros:
         *Descripción: Valida que la factura este llena
        * Autor: Jhonny Pincay Nieves
    **************************************************/

function validarFacturaLlena(){
    var numero_items = 10;
    var bandera=true;
    var i=0;
        for(i=1 ; i<=numero_items ; i++){
            bandera = bandera && validarItem(i);
        }
        //alert("validacion: "+bandera);
        return bandera;
}

/*************************************************
        *Nombre:  enviarFormularioDoc()
        *Parametros:
         *Descripción: Valida los datos antes de hacer submit del form
        * Autor: Jose Sumba
    **************************************************/

function enviarFormularioDoc(){
    var formulario = document.getElementById("new_doc_facturacion");
    var existe_item= validarExistenciaItem();    
    if(existe_item==true){
        var bandera= validarItemsCompletosFactura();
        if(bandera==true)
            formulario.submit();
        else
            alert("Datos no llenados correctamente. Favor verificar detalle del Documento");
    }else
         alert("No se puede crear Documento Vacío");
            
}

/*************************************************
        *Nombre:  enviarFormularioDoc2()
        *Parametros:
         *Descripción: Realiza validaciones antes de hacer submit de un form.
        * Autor: Jose Sumba
    **************************************************/
function enviarFormularioDoc2(){
    var formulario = document.getElementById("new_doc_facturacion");
     <?php if($df->getDocTipo()!=2): ?>
    var existe_cod = validarExistenciaCampo("documento_de_facturacion_doc_codigo");
    if(existe_cod){
        var fecha = validarExistenciaCampo("documento_de_facturacion_doc_fecha_emision");
        if(fecha){
           
            var idCliente = validarExistenciaCampo("cli_identificacion");
            if(idCliente){
                var nombreCliente= validarExistenciaCampo("documento_de_facturacion_cliente_0_cli_nombre");
                if(nombreCliente){
                    var apellidoCliente= validarExistenciaCampo("documento_de_facturacion_cliente_0_cli_apellido");
                    if(apellidoCliente){
                        var existe_item= validarExistenciaItem();
                        if(existe_item==true){
                            var bandera= validarItemsCompletosFactura();
                            if(bandera==true)
                                formulario.submit();
                            else
                                alert("Datos no llenados correctamente. Favor verificar detalle del Documento");
                            }else
                        alert("No se puede crear Documento Vacío");
                    }else
                    alert("Ingrese apellido del cliente");
                }else
                alert("Ingrese nombre del cliente");
            }else
            alert("Ingrese identificación del cliente");
       
         }else
             alert("Ingrese fecha de emisión");
     }else
         alert("Ingrese un código");
     <?php else : ?>
    var existe_cod = validarExistenciaCampo("documento_de_facturacion_doc_codigo");
    if(existe_cod){
        var fecha = validarExistenciaCampo("documento_de_facturacion_doc_fecha_emision");
        if(fecha){
                        var existe_item= validarExistenciaItem();
                        if(existe_item==true){
                            var bandera= validarItemsCompletosFactura();
                            if(bandera==true)
                                formulario.submit();
                            else
                                alert("Datos no llenados correctamente. Favor verificar detalle del Documento");
                            }else
                        alert("No se puede crear Documento Vacío");
         }else
             alert("Ingrese fecha de emisión");
     }else
         alert("Ingrese un código");


     <?php endif;?>
}


/*************************************************
        *Nombre:  validarExistenciaCampo(id)
        *Parametros:
                -id: Representa un identificador del campo
         *Descripción: Valida que un campo se encuentre lleno.
        * Autor: Jose SUmba
    **************************************************/

function validarExistenciaCampo(id){
    var campo = document.getElementById(id);
    if(campo.value.length==0){
        return false;
    }else{
        return true;
}
}

function consultarDetallesCliente(){

           var loading=document.getElementById("loader_cliente");

//         if (codigo_tecla == 9){
            var cedula_consulta= document.getElementById("cli_identificacion").value;
            if(cedula_consulta!=''){
            loading.setAttribute("class", "");
           $.ajax({
             type: "GET",
             url: '<?php echo url_for('Cliente/obtenerXMLClienteCedula?cedula_cli=') ?>'+cedula_consulta,
             dataType: "xml",
             success: function(xml){
                     $(xml).find("cliente").each(function () {
                              if($(this).find("mensaje").text() == "Cliente Encontrado"){
                                $('#documento_de_facturacion_cliente_0_cli_nombre').val($(this).find("nombre").text());
                                $('#documento_de_facturacion_cliente_0_cli_apellido').val($(this).find("apellido").text());
                                $('#documento_de_facturacion_cliente_0_cli_direccion').val($(this).find("direccion").text());
                                $('#documento_de_facturacion_cliente_0_cli_telefono').val($(this).find("telefono").text());
                                $('#documento_de_facturacion_cliente_0_cli_celular').val($(this).find("celular").text());
                                $('#documento_de_facturacion_cliente_0_cli_correo').val($(this).find("correo").text());
                               }else{
                                  alert($(this).find("mensaje").text());
                                  resetCamposCliente();
                              }
                          });
                          loading.setAttribute("class", "hidden");
                  }
            });
            }

      return true;

}
   function resetCamposCliente(){
        $('#documento_de_facturacion_cliente_0_cli_nombre').val("");
        $('#documento_de_facturacion_cliente_0_cli_apellido').val("");
        $('#documento_de_facturacion_cliente_0_cli_direccion').val("");
        $('#documento_de_facturacion_cliente_0_cli_telefono').val("");
        $('#documento_de_facturacion_cliente_0_cli_celular').val("");
        $('#documento_de_facturacion_cliente_0_cli_correo').val("");
   }

   
  $(function() {
               var dates = $( "#documento_de_facturacion_doc_fecha_emision" ).datepicker(
                      {
			defaultDate: "+1w",
                        buttonImage: "/images/calendar.png",
                        showOn: "button",
                        buttonImageOnly: true,
                        dateFormat: 'yy-mm-dd'
		});
	});



</script>
   
