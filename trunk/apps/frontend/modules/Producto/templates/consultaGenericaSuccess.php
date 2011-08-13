<?php use_helper('jQuery')?>
<?php if(strcasecmp($tipo_consulta,"codigo")==0):?>
        <?php if (strcasecmp($edit,"true")==0):?>
            <h1 class="titulo_principal"> Modificaci&oacute;n de Producto </h1>

<!--        <form action="<?php //echo url_for('Producto/consultaPorCodigo')?>">-->
            <?php
            echo jq_form_remote_tag(array(
                'update'=>'producto_consulta',
                'url' => 'Producto/edit',
                'loading' => "$('#img_loader_consulta_prod').show();",
                'complete' => "$('#img_loader_consulta_prod').hide()",
                'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
            ?>
        <?php elseif(strcasecmp($delete,"true")==0): ?>

            <h1 class="titulo_principal"> Eliminar  de producto por C&oacute;digo </h1>
           <?php
            echo jq_form_remote_tag(array(
                'update'=>'producto_consulta',
                'url' => 'Producto/deleteProducto',
                'loading' => "$('#img_loader_consulta_prod').show();",
                'complete' => "$('#img_loader_consulta_prod').hide()",
                'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
            ?>
        <?php else:?>
             <h1 class="titulo_principal"> Consulta  de producto por C&oacute;digo </h1>

<!--        <form action="<?php //echo url_for('Producto/consultaPorCodigo')?>">-->
            <?php
            echo jq_form_remote_tag(array(
                'update'=>'producto_consulta',
                'url' => 'Producto/consultaPorCodigo',
                'loading' => "$('#img_loader_consulta_prod').show();",
                'complete' => "$('#img_loader_consulta_prod').hide()",
                'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
            ?>
        <?php endif; ?>
             <fieldset  class="fieldset_consulta">
            <legend>Ingrese C&oacute;digo</legend>
            <table>
                <tr>
                    <td><label class="lbl_form">C&oacute;digo&nbsp;&nbsp;</label></td>
                    <td id="td_consulta"><input type="text" name="txt_codigo_producto" class="txt_form" id="consulta_codigo"/></td>
<!--                <a class="button" href="#" onclick = "document.forms[0].submit(); return false" style="margin-left:2%">
                    <img src="/images/lupa.png" alt="Consulta" />Consultar
                </a>-->
                    <td><input type="submit" value="Consultar" /></td>
                </tr>
            </table>
        </fieldset>
        </form>
        
<?php elseif(strcasecmp($tipo_consulta,"marca")==0): ?>
        <h1 class="titulo_principal"> Consulta  de producto por Marca </h1>
       <?php
        echo jq_form_remote_tag(array(
            'update'=>'producto_consulta',
            'url' => 'Producto/consultaPorMarca',
            'loading' => "$('#img_loader_consulta_prod').show();",
            'complete' => "$('#img_loader_consulta_prod').hide()",
            'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
        ?>
        <fieldset class="fieldset_consulta">
            <legend>Ingrese Marca</legend>
            <label class="lbl_form">Marca</label>
<!--            <input type="text" name="txt_marca_producto" class="txt_form" />-->
            <select name="txt_marca_producto" id="cmb_marca_producto" >
            </select>
            <img id="loader_marcas" class="hidden"  alt="cargando" src="/images/loader2.gif" />
            <input type="submit" value="Consultar" />
                
        </fieldset>
        </form>

<?php elseif(strcasecmp($tipo_consulta,"nombre")==0): ?>
        <h1 class="titulo_principal"> Consulta  de producto por Nombre </h1>
         <?php
        echo jq_form_remote_tag(array(
            'update'=>'producto_consulta',
            'url' => 'Producto/consultaPorNombre',
            'loading' => "$('#img_loader_consulta_prod').show();",
            'complete' => "$('#img_loader_consulta_prod').hide()",
            'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
        ?>
        <fieldset class="fieldset_consulta">
            <legend>Ingrese Nombre</legend>
            <label class="lbl_form">Nombre</label>
            <input type="text" name="txt_nombre_producto" class="txt_form" />
            <input type="submit" value="Consultar" />

        </fieldset>
        </form>
 <?php elseif(strcasecmp($tipo_consulta,"marca_nombre")==0): ?>
        <h1 class="titulo_principal"> Consulta  de producto por Marca y Nombre </h1>
         <?php
        echo jq_form_remote_tag(array(
            'update'=>'producto_consulta',
            'url' => 'Producto/consultaPorMarcaNombre',
            'loading' => "$('#img_loader_consulta_prod').show();",
            'complete' => "$('#img_loader_consulta_prod').hide()",
            'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
        ?>
        <fieldset class="fieldset_consulta">
            <legend>Ingrese Marca y Nombre</legend>
            <table>
                <tr>
                    <td><label class="lbl_form">Marca</label></td>
                    <td><select name="txt_marca_producto" id="cmb_marca_producto" ></select></td>
                    <td><img id="loader_marcas" class="hidden"  alt="cargando" src="/images/loader2.gif" /></td>
                </tr>
                <tr>
                    <td><label class="lbl_form">Nombre</label></td>
                    <td><input type="text" name="txt_nombre_producto" class="txt_form" /></td>
                    <td><input type="submit" value="Consultar" /></td>
                </tr>
            </table>
        </fieldset>
        </form>
 <?php elseif(strcasecmp($tipo_consulta,"categoria")==0): ?>
        <h1 class="titulo_principal"> Consulta  de producto por Categor&iacute;a </h1>
         <?php
        echo jq_form_remote_tag(array(
            'update'=>'producto_consulta',
            'url' => 'Producto/consultaPorCategoria',
            'loading' => "$('#img_loader_consulta_prod').show();",
            'complete' => "$('#img_loader_consulta_prod').hide()",
            'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
        ?>
        <fieldset class="fieldset_consulta">
            <legend>Ingrese Categor&iacute;a</legend>
            <label class="lbl_form">Categor&iacute;a</label>
            <select name="txt_categoria_producto" id="cmb_categoria_producto" >
            </select>
            <img id="loader_categorias" class="hidden"  alt="cargando" src="/images/loader2.gif" />
            <input type="submit" value="Consultar" />
        </fieldset>
        </form>
 <?php else: ?>
        <h1 class="titulo_principal"> Criterio de b&uacute;squeda no encontrado </h1>
 <?php endif; ?>


<!--<input type="button" value="Guardar como PDF" id="pdf" />-->
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
         var combo=document.getElementById('cmb_marca_producto');
         var combo_categoria=document.getElementById('cmb_categoria_producto');
         
         if( combo_categoria!=null){
            /*alert('entro');*/
            var loading=document.getElementById("loader_categorias");
               loading.setAttribute("class", "");
             $.ajax({
                type: "GET",
                url: '<?php echo url_for('Producto/obtenerXMLCategorias') ?>',
                dataType: "xml",
                success: function(xml){
                    while(combo_categoria.hasChildNodes()){
                        combo_categoria.removeChild(combo_categoria.firstChild);
                    }
                    $(xml).find("categoria").each(function () {
                        var option=document.createElement("option");
                        option.setAttribute('value',$(this).find("nombre").text());
                        option.appendChild(document.createTextNode($(this).find("nombre").text()));
                        combo_categoria.appendChild(option);
                    });
                    loading.setAttribute("class", "hidden");
                }
            });

         }else if(combo!=null){
              var loading=document.getElementById("loader_marcas");
               loading.setAttribute("class", "");
             $.ajax({
                type: "GET",
                url: '<?php echo url_for('Producto/obtenerXMLMarcas') ?>',
                dataType: "xml",
                success: function(xml){
                    while(combo.hasChildNodes()){
                        combo.removeChild(combo.firstChild);
                    }
                    $(xml).find("marca").each(function () {
                        var option=document.createElement("option");
                        option.setAttribute('value',$(this).find("nombre").text());
                        option.appendChild(document.createTextNode($(this).find("nombre").text()));
                        combo.appendChild(option);
                    });
                    loading.setAttribute("class", "hidden");
                }
            });

         }
         agregarValidacionesConsultaProducto();

          $('#pdf').click(function() {
            var f = document.createElement('form');
            f.style.display = 'none';
            this.parentNode.appendChild(f);
            f.method = 'post';
            f.action = '<?php echo url_for('Producto/guardarPdf')?>';
            var m = document.createElement('input');
            m.setAttribute('type', 'hidden');
            m.setAttribute('name', 'html');
            m.setAttribute('value', $('#producto_consulta').html());
            f.appendChild(m);
            f.submit();
            return false;
        });
     });
</script>

