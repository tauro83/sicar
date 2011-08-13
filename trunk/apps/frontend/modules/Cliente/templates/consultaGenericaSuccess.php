<?php use_helper('jQuery')?>
<?php if(strcasecmp($tipo_consulta,"codigo")==0):?>
        <?php if (strcasecmp($edit,"true")==0):?>
            <h1 class="titulo_principal"> Modificaci&oacute;n de Cliente </h1>

<!--        <form action="<?php //echo url_for('Producto/consultaPorCodigo')?>">-->
            <?php
            echo jq_form_remote_tag(array(
                'update'=>'producto_consulta',
                'url' => 'Cliente/edit',
                'loading' => "$('#img_loader_consulta_prod').show();",
                'complete' => "$('#img_loader_consulta_prod').hide()",
                'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
            ?>
        <?php elseif(strcasecmp($delete,"true")==0): ?>

            <h1 class="titulo_principal">Eliminar Cliente</h1>
           <?php
            echo jq_form_remote_tag(array(
                'update'=>'producto_consulta',
                'url' => 'Cliente/deleteCliente',
                'loading' => "$('#img_loader_consulta_prod').show();",
                'complete' => "$('#img_loader_consulta_prod').hide()",
                'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
            ?>
        <?php else:?>
             <h1 class="titulo_principal"> Consulta de cliente por Identificaci&oacute;n </h1>

<!--        <form action="<?php //echo url_for('Producto/consultaPorCodigo')?>">-->
            <?php
            echo jq_form_remote_tag(array(
                'update'=>'producto_consulta',
                'url' => 'Cliente/consultaPorIdentificacion',
                'loading' => "$('#img_loader_consulta_prod').show();",
                'complete' => "$('#img_loader_consulta_prod').hide()",
                'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
            ?>
        <?php endif; ?>
            <fieldset  class="fieldset_consulta">
            <legend>Ingrese Identificaci&oacute;n  </legend>
            <table>
                <tr>
                    <td><label class="lbl_form">Identificaci&oacute;n&nbsp;&nbsp;</label></td>
                    <td id="td_consulta"><input type="text" name="txt_codigo_cliente" class="txt_form" id="consulta_codigo"/></td>
                    <td><input type="submit" value="Consultar" /></td>
                </tr>
            </table>
        </fieldset>
        </form>
 <?php else: ?>
        <h1 class="titulo_principal"> Criterio de b&uacute;squeda no encontrado </h1>
 <?php endif; ?>

<img id="img_loader_consulta_prod" src="/images/loader.gif" alt="cargando" style="display:none" />
<div id="producto_consulta" style="margin-top: 3%"></div>

<script type="text/javascript">

    /*************************************************
        *Nombre: function()
        *Parametros:

        *Descripción: Funcion a ser ejecutada cuando se carga la pagina, llena
                      los combos de categoria y marca con datos provenientes de
                      un xml, que a su vez contiene información de los datos
                      de la base.
        * Autor: Jhonny Pincay Nieves, José Sumba Zhongor
    **************************************************/
     $(document).ready(function () {
        var codigo = document.getElementById("consulta_codigo");
        if(codigo){
            codigo.setAttribute("maxlength","13");
            var ValCodigo = new LiveValidation(codigo,{validMessage: " ", wait: 500});
            ValCodigo.add(Validate.Presence,{failureMessage: "Requerido"});
            ValCodigo.add(Validate.Format,{pattern: /(^\d{10}$|^\d{10}001$)/,failureMessage: "Ingrese un número de cédula o RUC"} );
        }
     });
</script>

