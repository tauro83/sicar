<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php //$url_accion=url_for('Proveedor/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?prv_id='.$form->getObject()->getProId() : '')) ?>

<form action="<?php echo url_for('Proveedor/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?prv_id='.$form->getObject()->getPrvId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
 
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
                 
          <div class="info_proveedor" id="ingreso_datos_proveedor">
            <table class="tbl_layout">
                <tbody>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['prv_nombre']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['prv_nombre'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['prv_ruc']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['prv_ruc'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['prv_direccion']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['prv_direccion'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['prv_telefono']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['prv_telefono'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['prv_correo']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['prv_correo'] ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['prv_fax']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['prv_fax'] ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['prv_responsable']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['prv_responsable'] ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['prv_nombre_banco']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['prv_nombre_banco'] ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="tbl_header">
                          <?php echo $form['prv_numero_cuenta']->renderLabel(null, array('class' => 'lbl_form')); ?>
                        </td>
                        <td class="tbl_cont">
                            <?php echo $form['prv_numero_cuenta'] ?>
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
     <input class="btn_submit_form" id="btn_submit_prov" type="submit" value="Guardar" />
</form>
