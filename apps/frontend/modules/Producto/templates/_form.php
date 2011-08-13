<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php $url_accion=url_for('Producto/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?pro_id='.$form->getObject()->getProId() : '')) ?>
<?php if (!$form->getObject()->isNew()):
        $readonly="readonly=readonly";
      else:
        $readonly="";
       endif;  ?>


<form action="<?php echo url_for('Producto/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?pro_id='.$form->getObject()->getProId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
 
 <?php
           // echo jq_form_remote_tag(array(
             //   'update'=>'producto_mensaje_confir',
               // 'url' => $url_accion,
//                'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
?>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
          <?php if (!$form->getObject()->isNew()): ?>
            
          <?php endif; ?>
                 
          <div class="info_producto" id="ingreso_datos_producto">
            <table class="tbl_layout">
                <tbody>
                    <tr>
                        <td class="tbl_header">
                             <?php echo $form['pro_codigo']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">

                            <?php  if($form->getObject()->isNew()):
                                       echo $form['pro_codigo']->render();
                                   else:
                                       echo $form['pro_codigo']->render(array("readonly"=>"readonly"));
                                   endif;    ?>

                            <?php echo $form['pro_codigo']->renderError(); ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['pro_marca']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['pro_marca'] ?>
                            <img id="loader_marcas" class="hidden"  alt="cargando" src="/images/loader2.gif" />
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['pro_categoria']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['pro_categoria'] ?>
                            <img id="loader_categorias" class="hidden"  alt="cargando" src="/images/loader2.gif" />
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                             <?php echo $form['pro_origen']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['pro_origen'] ?>
                            <img id="loader_origen" class="hidden"  alt="cargando" src="/images/loader2.gif" />
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['pro_ultimo_proveedor_id']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['pro_ultimo_proveedor_id'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['pro_nombre']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['pro_nombre'] ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['pro_descripcion']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['pro_descripcion'] ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

<!--   <div class="info_producto" id="ingreso_precios_producto">
            <table class="tbl_layout">
                <tbody>
                    <tr>
                        <td class="tbl_header">
                          <?php //echo $form['pro_precio_nota_venta']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php //echo $form['pro_precio_nota_venta'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php //echo $form['pro_precio_factura']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php //echo $form['pro_precio_factura'] ?>
                        </td>
                    </tr>

                </tbody>
            </table>
   </div>-->

      <?php echo $form->renderHiddenFields(); // ----- MUY IMPORTANTE?>
     <input class="btn_submit_form" id="btn_submit_prod" type="submit" value="Guardar" />
</form>



<script type="text/javascript">
    /*************************************************
        *Nombre: function()
        *Parametros:

        *Descripción: Funcion a ser ejecutada cuando se carga la pagina, llena
                      los combos de categoria, origen y  marca con datos provenientes de
                      un xml, que a su vez contiene información de los datos
                      de la base.
        * Autor: Jhonny Pincay Nieves, José Sumba Zhongor
    **************************************************/
     $(document).ready(function () {
         var combo=document.getElementById('cmb_marca_producto');
         var combo_categoria=document.getElementById('cmb_categoria_producto');
         var combo_origen= document.getElementById('cmb_origen_producto');
         if(combo!=null){
              var loading1=document.getElementById("loader_marcas");
               loading1.setAttribute("class", "");
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
                    setSelectedMarca(combo);
                    loading1.setAttribute("class", "hidden");
                }
            });

         }

         if( combo_categoria!=null){
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
                    setSelectedCategoria(combo_categoria);
                    loading.setAttribute("class", "hidden");
                }
            });

         }

         if( combo_origen!=null){
            var loading_origen=document.getElementById("loader_origen");
               loading_origen.setAttribute("class", "");
             $.ajax({
                type: "GET",
                url: '<?php echo url_for('Producto/obtenerXMLOrigenes') ?>',
                dataType: "xml",
                success: function(xml){
                    while(combo_origen.hasChildNodes()){
                        combo_origen.removeChild(combo_origen.firstChild);
                    }
                    $(xml).find("origen").each(function () {
                        var option=document.createElement("option");
                        option.setAttribute('value',$(this).find("nombre").text());
                        option.appendChild(document.createTextNode($(this).find("nombre").text()));
                        combo_origen.appendChild(option);
                    });
                    setSelectedOrigen(combo_origen);
                    loading_origen.setAttribute("class", "hidden");
                }
            });
         }
     });

     /*************************************************
        *Nombre: setSelectedMarca(referencia_combo)
        *Parametros:
                - referencia_combo: Referencia a un elememnto combo box.
        *Descripción: Cuando se realiza edit del producto permite establecer como seleccionado  el valor
                      almacenado en la base de datos de marca.
        * Autor: Jhonny Pincay Nieves
    **************************************************/
     function setSelectedMarca(referencia_combo){
        <?php if($form->getObject()->isNew()==false):?>
             var lista_opciones=referencia_combo.getElementsByTagName("option");
             for(var i=0; i<lista_opciones.length; i++){
                   if(lista_opciones[i].value==('<?php echo $form->getObject()->getProMarca()?>')){
                    
                    lista_opciones[i].setAttribute("selected","selected");
                    return;
                }
             }
       <?php endif;?>

     }

     /*************************************************
        *Nombre: setSelectedCategoria(referencia_combo)
        *Parametros:
                - referencia_combo: Referencia a un elememnto combo box.
        *Descripción: Cuando se realiza edit del producto permite establecer como seleccionado  el valor
                      almacenado en la base de datos de categoria.
        * Autor: Jhonny Pincay Nieves
    **************************************************/
     function setSelectedCategoria(referencia_combo){
        <?php if($form->getObject()->isNew()==false):?>
             var lista_opciones=referencia_combo.getElementsByTagName("option");
             for(var i=0; i<lista_opciones.length; i++){
                   if(lista_opciones[i].value==('<?php echo $form->getObject()->getProCategoria()?>')){

                    lista_opciones[i].setAttribute("selected","selected");
                    return;
                }
             }
       <?php endif;?>

     }

     /*************************************************
        *Nombre: setSelectedOrigenMarca(referencia_combo)
        *Parametros:
                - referencia_combo: Referencia a un elememnto combo box.
        *Descripción: Cuando se realiza edit del producto permite establecer como seleccionado  el valor
                      almacenado en la base de datos de origen.
        * Autor: Jhonny Pincay Nieves
    **************************************************/
     function setSelectedOrigen(referencia_combo){
        <?php if($form->getObject()->isNew()==false):?>
             var lista_opciones=referencia_combo.getElementsByTagName("option");
             for(var i=0; i<lista_opciones.length; i++){
                   if(lista_opciones[i].value==('<?php echo $form->getObject()->getProOrigen()?>')){

                    lista_opciones[i].setAttribute("selected","selected");
                    return;
                }
             }
       <?php endif;?>

     }
</script>


