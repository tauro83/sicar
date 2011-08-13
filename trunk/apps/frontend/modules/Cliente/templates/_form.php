<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php $url_accion=url_for('Cliente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cli_id='.$form->getObject()->getCliId() : '')) ?>
<form action="<?php echo url_for('Cliente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cli_id='.$form->getObject()->getCliId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

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
                            <?php echo $form['cli_identificacion'] ?>
                            <?php echo $form['cli_identificacion']->renderError(); ?>

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

      <?php echo $form->renderHiddenFields(); // ----- MUY IMPORTANTE?>
     <input class="btn_submit_form" id="btn_submit_prod" type="submit" value="Guardar" />
</form>