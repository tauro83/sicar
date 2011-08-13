
<?php use_helper('jQuery')?>
<?php if(strcasecmp($tipo_consulta,"codigo")==0):?>



<!--        <form action="<?php //echo url_for('Producto/consultaPorCodigo')?>">-->
            <?php if (strcasecmp($edit,"true")==0):?>

                    <h1 class="titulo_principal"> Modificaci&oacute;n de Documento </h1>
<!--        <form action="<?php //echo url_for('Producto/consultaPorCodigo')?>">-->
                    <?php
                    echo jq_form_remote_tag(array(
                        'update'=>'documento_consulta',
                        'url' => 'DocumentoDeFacturacion/edit',
                        'loading' => "$('#img_loader_consulta_doc').show();",
                        'complete' => "$('#img_loader_consulta_doc').hide()",
                        'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
                    ?>
             <?php else:?>
                   <h1 class="titulo_principal"> Consulta  de documento por C&oacute;digo </h1>
                    <?php
                    echo jq_form_remote_tag(array(
                        'update'=>'documento_consulta',
                        'url' => 'DocumentoDeFacturacion/consultaPorCodigo',
                        'loading' => "$('#img_loader_consulta_doc').show();",
                        'complete' => "$('#img_loader_consulta_doc').hide()",
                        'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
                    ?>
            <?php endif; ?>
            <fieldset  class="fieldset_consulta">
            <legend>Ingrese C&oacute;digo</legend>
            <table>
                <tr>
                    <td><label class="lbl_form">C&oacute;digo: </label></td>
                    <td id="td_consulta"><input type="text" name="txt_codigo_documento" class="txt_form" id="consulta_codigo"/></td>
<!--                <a class="button" href="#" onclick = "document.forms[0].submit(); return false" style="margin-left:2%">
                    <img src="/images/lupa.png" alt="Consulta" />Consultar
                </a>-->
                    <td><input type="submit" value="Consultar" /></td>
                </tr>
            </table>
        </fieldset>
        </form>

<?php elseif(strcasecmp($tipo_consulta,"fecha")==0): ?>
        <h1 class="titulo_principal"> Consulta  de documentos por fecha </h1>

<!--        <form action="<?php //echo url_for('Producto/consultaPorCodigo')?>">-->
            <?php
            echo jq_form_remote_tag(array(
                'update'=>'documento_consulta',
                'url' => 'DocumentoDeFacturacion/consultaPorFechas',
                'loading' => "$('#img_loader_consulta_doc').show();",
                'complete' => "$('#img_loader_consulta_doc').hide()",
                'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
            ?>

            <fieldset  class="fieldset_consulta">
            <legend>Selecccione Fechas</legend>
            <table>
                <tr>
                    <td><label class="lbl_form">Fecha Inicio: </label></td>
                    <td id="td_consulta_fi"><input type="text" readonly="readonly" name="txt_fecha_inicio_documento" class="txt_form" id="consulta_fecha_inicio"/></td>
                   
                </tr>
                <tr>
                    <td><label class="lbl_form">Fecha Fin: </label></td>
                    <td id="td_consulta_ff"><input type="text" readonly="readonly" name="txt_fecha_fin_documento" class="txt_form" id="consulta_fecha_fin"/></td>

                </tr>
                <tr>
                    <td><input type="submit" value="Consultar" /></td>
                </tr>
            </table>
        </fieldset>
        </form>
<?php elseif(strcasecmp($tipo_consulta,"kardex")==0): ?>
        <h1 class="titulo_principal"> Reporte K&aacute;rdex </h1>

<!--        <form action="<?php //echo url_for('Producto/consultaPorCodigo')?>">-->
            <?php
            echo jq_form_remote_tag(array(
                'update'=>'documento_consulta',
                'url' => 'DocumentoDeFacturacion/kardex',
                'loading' => "$('#img_loader_consulta_doc').show();",
                'complete' => "$('#img_loader_consulta_doc').hide()",
                'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
            ?>

            <fieldset  class="fieldset_consulta">
            <legend>Ingrese Producto y Fechas</legend>
            <table>
                <tr>
                    <td><label class="lbl_form">Producto: </label></td>
                    <td id="td_consulta_fi"><input type="text"  name="txt_producto_documento" class="txt_form" id="consulta_codigo_doc"/></td>

                </tr>
                <tr>
                    <td><label class="lbl_form">Fecha Inicio: </label></td>
                    <td id="td_consulta_fi"><input type="text" readonly="readonly" name="txt_fecha_inicio_documento" class="txt_form" id="consulta_fecha_inicio"/></td>
                   
                </tr>
                <tr>
                    <td><label class="lbl_form">Fecha Fin: </label></td>
                    <td id="td_consulta_ff"><input type="text" readonly="readonly" name="txt_fecha_fin_documento" class="txt_form" id="consulta_fecha_fin"/></td>

                </tr>
                <tr>
                    <td><input type="submit" value="Consultar" /></td>
                </tr>
            </table>
        </fieldset>
        </form>
<?php endif; ?>
<img id="img_loader_consulta_doc" src="/images/loader.gif" alt="cargando" style="display:none" />
<div id="documento_consulta" style="margin-top: 3%"></div>

<script type="text/javascript">
	$(function() {
               var dates = $( "#consulta_fecha_inicio, #consulta_fecha_fin" ).datepicker(
                      {
			defaultDate: "+1w",
                        buttonImage: "/images/calendar.png",
                        showOn: "button",
                        buttonImageOnly: true,
                        dateFormat: 'yy-mm-dd',
			onSelect: function( selectedDate ) {
				var option = this.id == "consulta_fecha_inicio" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
               
	});
        this.agregarValidacionesConsultaFactura();
</script>