/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    var flagProducto = document.getElementById('producto_pro_codigo');
    if(flagProducto){
        agregarValidacionesProducto();
    }
    var flagCliente =  document.getElementById('cliente_cli_identificacion');
    if(flagCliente){
        agregarValidacionesCliente();
    }
    var flagFactura= document.getElementById('documento_de_facturacion_doc_codigo');
    if(flagFactura){
        agregarValidacionesFactura();
    }
});


function validarExistenciaItem(){
    var numero_items = 3;
    var contador=0;
    var bandera=false;
    var i=0;
        for(i=1 ; i<=numero_items ; i++){
             var codigo = document.getElementById("det_codigo_"+i);
             if(codigo.value.length!=0){
                bandera=true;
             }
        }
        alert("existe items: "+bandera);
}
function agregarValidacionesProducto(){
    //Validar el código
    var codigo = document.getElementById("producto_pro_codigo");
    if(codigo){
        codigo.setAttribute("maxlength","6");
        var ValCodigo = new LiveValidation("producto_pro_codigo",{validMessage: " ", wait: 500});
        ValCodigo.add(Validate.Presence,{failureMessage: "Requerido"});
        ValCodigo.add(Validate.Format,{pattern: /^\d{3,6}$/,failureMessage: "Ingrese un código de 3 a 6 dígitos"} );
    }
    //Valida el nombre
    var varNombre = document.getElementById("producto_pro_nombre");
    if(varNombre){
        varNombre.setAttribute("maxlength","100");
        var ValNombre = new LiveValidation("producto_pro_nombre",{validMessage: " ", wait: 500});
        ValNombre.add(Validate.Presence,{failureMessage: "Requerido"});
        ValNombre.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Error: caracter inválido"});
    }
    var descripcion = document.getElementById("producto_pro_descripcion");
    if(descripcion){
        descripcion.setAttribute("maxlength","200");
        var ValDesc = new LiveValidation("producto_pro_descripcion",{validMessage: " ", wait: 500});
        ValDesc.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Error: caracter inválido"});
    }
}
function agregarValidacionesConsultaProducto(){
    var codigo = document.getElementById("consulta_codigo");
    if(codigo){
        codigo.setAttribute("maxlength","6");
        var ValCodigo = new LiveValidation(codigo,{validMessage: " ", wait: 500});
        ValCodigo.add(Validate.Presence,{failureMessage: "Requerido"});
        ValCodigo.add(Validate.Format,{pattern: /^\d{3,6}$/,failureMessage: "Ingrese un código de 3 a 6 dígitos"} );
    }
}
function agregarValidacionesConsultaFactura(){
    var codigo = document.getElementById("consulta_codigo");
    if(codigo){
        codigo.setAttribute("maxlength","10");
        var ValCodigo = new LiveValidation("consulta_codigo",{validMessage: " ", wait: 500});
        ValCodigo.add(Validate.Presence,{failureMessage: "Requerido"});
        ValCodigo.add(Validate.Format,{pattern: /^\d{1,10}$/,failureMessage: "Ingrese un código válido"} );
    }
   
   var fecha_inicio =  document.getElementById("consulta_fecha_inicio");
   if(fecha_inicio){
        var val_fecha_inicio = new LiveValidation("consulta_fecha_inicio",{validMessage: " ", wait: 500});
        val_fecha_inicio.add(Validate.Presence,{failureMessage: " "});
   }

   var fecha_fin =  document.getElementById("consulta_fecha_fin");
   if(fecha_fin){
        var val_fecha_fin = new LiveValidation("consulta_fecha_fin",{validMessage: " ", wait: 500});
        val_fecha_fin.add(Validate.Presence,{failureMessage: " "});
   }
}

function agregarValidacionesFactura(){
    var f_d = document.getElementById("documento_de_facturacion_doc_codigo");
    if(f_d){
        f_d.setAttribute("maxlength","10");
        var f_doc_codigo= new LiveValidation("documento_de_facturacion_doc_codigo",{validMessage: " ", wait: 500});
        f_doc_codigo.add(Validate.Presence,{failureMessage: "Req"});
        f_doc_codigo.add(Validate.Format,{pattern: /^\d{10}$/,failureMessage: "El código debe tener 10 dígitos"} );
    }

    var f_id = document.getElementById("documento_de_facturacion_cliente_0_cli_identificacion");
    if(f_id){
        f_id.setAttribute("maxlength","13");
        var f_identificacion = new LiveValidation("documento_de_facturacion_cliente_0_cli_identificacion",{validMessage: " ", wait: 500});
        f_identificacion.add(Validate.Presence,{failureMessage: "Requerido      "});
        f_identificacion.add(Validate.Format,{pattern: /(^\d{10}$|^\d{10}001$)/,failureMessage: "Ingrese un número de cédula o RUC"} );
    }

    var f_n = document.getElementById("documento_de_facturacion_cliente_0_cli_nombre");
    if(f_n){
        f_n.setAttribute("maxlength","100");
        var f_nombre= new LiveValidation("documento_de_facturacion_cliente_0_cli_nombre",{validMessage: " ", wait: 500});
        f_nombre.add(Validate.Presence,{failureMessage:"Requerido     "});
        f_nombre.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Caracter inválido"});
    }
    var f_a = document.getElementById("documento_de_facturacion_cliente_0_cli_apellido");
    if(f_a){
        f_a.setAttribute("maxlength","100");
        var f_apellido= new LiveValidation("documento_de_facturacion_cliente_0_cli_apellido",{validMessage: " ", wait: 500});
        f_apellido.add(Validate.Presence,{failureMessage: "Requerido     "});
        f_apellido.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Caracter inválido"});
    }

    var f_s = document.getElementById("documento_de_facturacion_cliente_0_cli_direccion");
    if(f_s){
        f_s.setAttribute("maxlength","150");
        var f_sa= new LiveValidation("documento_de_facturacion_cliente_0_cli_direccion",{validMessage: " ", wait: 500});
        f_sa.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Caracter inválido"});
    }

    var f_t = document.getElementById("documento_de_facturacion_cliente_0_cli_telefono");
    if(f_t){
        f_t.setAttribute("maxlength","9");
        var f_telefono= new LiveValidation("documento_de_facturacion_cliente_0_cli_telefono",{validMessage: " ", wait: 500});
        f_telefono.add(Validate.Format,{pattern: /(^\d{9}$)/,failureMessage: "Ingrese un teléfono válido"} );
    }

    var f_c = document.getElementById("documento_de_facturacion_cliente_0_cli_celular");
    if(f_c){
        f_c.setAttribute("maxlength","15");
        var f_celular= new LiveValidation("documento_de_facturacion_cliente_0_cli_celular",{validMessage: " ", wait: 500});
        f_celular.add(Validate.Format,{pattern: /^\d{9}$/,failureMessage: "Ingrese un celular válido"} );
    }

    var f_cor = document.getElementById("documento_de_facturacion_cliente_0_cli_correo");
    if(f_cor){
        f_cor.setAttribute("maxlength","50");
        var f_correo= new LiveValidation("documento_de_facturacion_cliente_0_cli_correo",{validMessage: " ", wait: 500});
        f_correo.add(Validate.Email,{failureMessage: "Ingrese un e-mail correcto"});
        f_correo.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\@)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\@)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Caracter inválido"});
    }
    var i=1;
    var cantidad="det_cantidad_";
    for(i=1;i<=10;i++){
        var f_cant = document.getElementById(cantidad+i);
        f_cant.setAttribute("maxlength","5");
        var v_cant = new LiveValidation(cantidad+i,{validMessage: " ", wait: 500});
        v_cant.add(Validate.Numericality, {minimum:1,tooLowMessage: "Debe ser mayor o igual a 1",notANumberMessage:"Ingrese un número"});

        var codigo = document.getElementById("det_codigo_"+i);
        codigo.setAttribute("maxlength","6");
        var v_codigo = new LiveValidation("det_codigo_"+i,{validMessage: " ", wait: 500});
        v_codigo.add(Validate.Numericality, {minimum:3,tooLowMessage: "El codigo debe ser de 3 a 6 dígitos",notANumberMessage:"Ingrese un número"});


        var f_descripcion = document.getElementById("det_descripcion_"+i);
        f_descripcion.setAttribute("maxlength","150");

        var f_valor = document.getElementById("det_val_unitario_"+i);
        f_valor.setAttribute("maxlength","10");
        var v_valor = new LiveValidation("det_val_unitario_"+i,{validMessage: " ", wait: 500});
        v_valor.add(Validate.Format,{pattern: /^\d+\.\d{2}$/,failureMessage: "Debe ser un número con dos decimales"});

        var f_valor_total = document.getElementById("det_val_total_"+i);
        f_valor_total.setAttribute("maxlength","20");
   }

}
/*******************************VALIDACIONES DE FACTURA 2******************************************
 *************************************************************************************************/

function validarExistenciaCampo(id){
    var campo = document.getElementById(id);
    if(campo.value.length==0){
        return false;
    }else{
        return true;
    }
}
/************************VALIDACIONES CLIENTE*******************************************************/
/*****************************************************************************************************/
function agregarValidacionesCliente(){
    var f_id = document.getElementById("cliente_cli_identificacion");
    if(f_id){
        f_id.setAttribute("maxlength","13");
        var f_identificacion = new LiveValidation("cliente_cli_identificacion",{validMessage: " ", wait: 500});
        f_identificacion.add(Validate.Presence,{failureMessage: "Requerido"});
        f_identificacion.add(Validate.Format,{pattern: /(^\d{10}$|^\d{10}001$)/,failureMessage: "Ingrese cédula o RUC"} );
    }

    var f_n = document.getElementById("cliente_cli_nombre");
    if(f_n){
        f_n.setAttribute("maxlength","100");
        var f_nombre= new LiveValidation("cliente_cli_nombre",{validMessage: " ", wait: 500});
        f_nombre.add(Validate.Presence,{failureMessage: "Requerido"});
        f_nombre.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Error: caracter inválido"});
    }

    var f_a = document.getElementById("cliente_cli_apellido");
    if(f_a){
        f_a.setAttribute("maxlength","100");
        var f_apellido= new LiveValidation("cliente_cli_apellido",{validMessage: " ", wait: 500});
        f_apellido.add(Validate.Presence,{failureMessage: "Requerido"});
        f_apellido.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Error: caracter inválido"});
    }

    var f_s = document.getElementById("cliente_cli_direccion");
    if(f_s){
        f_s.setAttribute("maxlength","150");
        var f_direccion= new LiveValidation("cliente_cli_direccion",{validMessage: " ", wait: 500});
        f_direccion.add(Validate.Presence,{failureMessage: "Requerido"});
        f_direccion.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Error: caracter inválido"});
    }

    var f_c = document.getElementById("cliente_cli_celular");
    if(f_c){
        f_c.setAttribute("maxlength","10");
        var f_celular= new LiveValidation("cliente_cli_celular",{validMessage: " ", wait: 500});
        f_celular.add(Validate.Format,{pattern: /^\d{9}$/,failureMessage: "Ingrese un celular válido"} );
    }

    var f_t = document.getElementById("cliente_cli_telefono");
    if(f_t){
        f_t.setAttribute("maxlength","29");
        var f_telefono= new LiveValidation("cliente_cli_telefono",{validMessage: " ", wait: 500});
        f_telefono.add(Validate.Format,{pattern: /^\d{9}$|^\d{9}(\-)\d{9}$|^\d{9}(\-)\d{9}(\-)\d{9}$/,failureMessage: "Ingrese un teléfono válido"} );
    }

    var f_cor = document.getElementById("cliente_cli_correo");
    if(f_cor){
        f_cor.setAttribute("maxlength","40");
        var f_correo= new LiveValidation("cliente_cli_correo",{validMessage: " ", wait: 500});
        f_correo.add(Validate.Email,{failureMessage: "Ingrese un e-mail correcto"});
        f_correo.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\@)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\@)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Error: caracter inválido"});
    }
}


/************************VALIDACIONES PROVEEDOR*******************************************************/
/*****************************************************************************************************/
function agregarValidacionesProveedor(){
    var p_nombre = document.getElementById("proveedor_prv_nombre");
    if(p_nombre){
        p_nombre.setAttribute("maxlength","150");
        var v_nombre = new LiveValidation("proveedor_prv_nombre",{validMessage: " ", wait: 500});
        v_nombre.add(Validate.Presence,{failureMessage: "Requerido"});
        v_nombre.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Error: caracter inválido"});
    }

    var p_info = document.getElementById("proveedor_prv_info");
    if(p_info){
        p_info.setAttribute("maxlength","255");
        var v_info= new LiveValidation("proveedor_prv_info",{validMessage: " ", wait: 500});
        v_info.add(Validate.Presence,{failureMessage: "Requerido"});
    }

    var p_direccion = document.getElementById("proveedor_prv_direccion");
    if(p_direccion){
        p_direccion.setAttribute("maxlength","200");
        var v_direccion= new LiveValidation("proveedor_prv_direccion",{validMessage: " ", wait: 500});
        v_direccion.add(Validate.Presence,{failureMessage: "Requerido"});
    }

    var p_telefono = document.getElementById("proveedor_prv_telefono");
    if(p_telefono){
        p_telefono.setAttribute("maxlength","9");
        var v_telefono= new LiveValidation("proveedor_prv_telefono",{validMessage: " ", wait: 500});
        v_telefono.add(Validate.Format,{pattern: /^\d{9}$/,failureMessage: "Ingrese un teléfono válido"} );
    }

    var p_correo = document.getElementById("proveedor_prv_correo");
    if(p_correo){
        p_correo.setAttribute("maxlength","30");
        var v_correo= new LiveValidation("proveedor_prv_correo",{validMessage: " ", wait: 500});
        v_correo.add(Validate.Email,{failureMessage: "Ingrese un e-mail correcto"});
        v_correo.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\@)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\@)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Error: caracter inválido"});
    }

    var p_fax = document.getElementById("proveedor_prv_fax");
    if(p_fax){
        p_fax.setAttribute("maxlength","20");
        p_fax=new LiveValidation("proveedor_prv_fax",{validMessage: " ", wait: 500});
        p_fax.add(Validate.Format,{pattern: /^\d{6,}$/,failureMessage: "Ingrese un fax válido"} );
    }

    var p_responsable = document.getElementById("proveedor_prv_responsable");
    if(p_responsable){
        p_responsable.setAttribute("maxlength","50");
        p_responsable= new LiveValidation("proveedor_prv_responsable",{validMessage: " ", wait: 500});
        p_responsable.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Caracter inválido"});
    }

    var p_banco = document.getElementById("proveedor_prv_nombre_banco");
    if(p_banco){
        p_banco.setAttribute("maxlength","150");
        p_banco= new LiveValidation("proveedor_prv_nombre_banco",{validMessage: " ", wait: 500});
        p_banco.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Caracter inválido"});
    }
    var p_numeroBanco = document.getElementById("proveedor_prv_numero_cuenta");
    if(p_numeroBanco){
        p_numeroBanco.setAttribute("maxlength","13");
        p_numeroBanco= new LiveValidation("proveedor_prv_numero_cuenta",{validMessage: " ", wait: 500});
        p_numeroBanco.add(Validate.Format,{pattern: /(^\w*[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\)))(\w*)]{0,}\w*[[(/)(\)( )(\.)(\-)(\_)(\ñ)(\#)(\,)(\()(\))(\w*)(\-)]{0,})$/,failureMessage:"Caracter inválido"});
    }
}
