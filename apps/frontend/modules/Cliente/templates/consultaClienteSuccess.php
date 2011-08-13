<?php use_helper('jQuery')?>
<h1 class="titulo_principal">Consultar Cliente por Apellido</h1>
 <?php
            echo jq_form_remote_tag(array(
                'update'=>'cliente_consulta',
                'url' => 'Cliente/consultaPorApellidos',
                'loading' => "$('#img_loader_consulta_prod').show();",
                'complete' => "$('#img_loader_consulta_prod').hide()",
                'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
            ?>

            <fieldset  class="fieldset_consulta">
            <legend>Ingrese Apellidos  </legend>
            <table>
                <tr>
                    <td><label class="lbl_form">Apellidos&nbsp;</label></td>
                    <td id="td_consulta"><input type="text" name="txt_apellido_cliente" class="txt_form" id="consulta_apellido"/></td>
                    <td><input type="submit" value="Consultar" /></td>
                </tr>
            </table>
        </fieldset>
        </form>
        

<img id="img_loader_consulta_prod" src="/images/loader.gif" alt="cargando" style="display:none" />
<div id="cliente_consulta" style="margin-top: 3%"></div>
