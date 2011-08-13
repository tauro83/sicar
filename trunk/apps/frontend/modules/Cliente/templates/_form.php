<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php $url_accion=url_for('Cliente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cli_id='.$form->getObject()->getCliId() : '')) ?>
<form id="form_cliente" action="<?php echo url_for('Cliente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cli_id='.$form->getObject()->getCliId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
          <?php if (!$form->getObject()->isNew()): ?>

          <?php endif; ?>

          <div class="info_cliente" id="ingreso_datos_cliente">
            <table class="tbl_layout">
                <tbody>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['cli_identificacion']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['cli_identificacion']->render(array("onblur" => "consultarDetallesCliente()")) ?>
                            <?php echo $form['cli_identificacion']->renderError(); ?>
                            <label id="mensaje-error" class="hidden" style="font-family: 'Tahoma'; font-size: 11px; font-weight: bold; color:#CC0000;" >Identificaci&oacute;n Ingresada Anteriormente</label>

                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['cli_nombre']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['cli_nombre'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['cli_apellido']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['cli_apellido'] ?>
                            <img id="loader_categorias" class="hidden"  alt="cargando" src="/images/loader2.gif" />
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                             <?php echo $form['cli_direccion']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['cli_direccion'] ?>
                            <img id="loader_origen" class="hidden"  alt="cargando" src="/images/loader2.gif" />
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['cli_celular']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['cli_celular'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['cli_telefono']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['cli_telefono'] ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['cli_correo']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['cli_correo'] ?>
                        </td>
                    </tr>
<!--                    <tr>
                        <td class="tbl_header">
                          <?php //echo $form['cli_estado']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php //echo $form['cli_estado'] ?>
                        </td>
                    </tr>-->
                </tbody>
            </table>
        </div>
       <input id="respaldo" type="hidden" />

      <?php echo $form->renderHiddenFields(); // ----- MUY IMPORTANTE?>
<!--     <input class="btn_submit_form" id="btn_submit_prod" type="submit" value="Guardar" />-->
       <input id="btn_submit_prod" type="button" onclick="submitForm()" value="Guardar" />
</form>

<script type="text/javascript" >

function submitForm(){
    var result= document.getElementById("respaldo").value;
    var mens=document.getElementById('mensaje-error');
   
    if(result=="Cliente Encontrado"){
        mens.setAttribute("class", "");
        $('#cliente_cli_identificacion').val('');
        
    }else{
        mens.setAttribute("class", "hidden");
        var form=document.getElementById('form_cliente');
      //  form.submit();
      alert("se hace submit");
        
    }

}
function consultarDetallesCliente(){
            var cedula_consulta= document.getElementById("cliente_cli_identificacion").value;
            var mensaje;
            if(cedula_consulta!=''){
            $.ajax({
             type: "GET",
             url: '<?php echo url_for('Cliente/obtenerXMLClienteCedula?cedula_cli=') ?>'+cedula_consulta,
             dataType: "xml",
             success: function(xml){
                     $(xml).find("cliente").each(function () {
                             $('#respaldo').val($(this).find("mensaje").text());
                              
                          });                         
                  }
            });
            }
}

</script>