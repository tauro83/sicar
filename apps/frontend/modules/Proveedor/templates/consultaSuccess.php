<?php use_helper('jQuery')?>
<?php if (strcasecmp($edit,"false")==0 and strcasecmp($delete,"false")==0):?>
    <h1 class="titulo_principal"> Consulta  Proveedor por Nombre </h1>
     <?php
    echo jq_form_remote_tag(array(
        'update'=>'proveedor_consulta',
        'url' => 'Proveedor/consultaPorNombre?edit=false&delete=false',
        'loading' => "$('#img_loader_consulta_prov').show();",
        'complete' => "$('#img_loader_consulta_prov').hide();",
        'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
    ?>
    <fieldset class="fieldset_consulta">
        <legend>Ingrese Nombre</legend>
        <label class="lbl_form">Nombre </label>
        <input type="text" name="txt_nombre_proveedor" class="txt_form" />
        <input type="submit" value="Consultar" />

    </fieldset>
    </form>
    <img id="img_loader_consulta_prov" src="/images/loader.gif" alt="cargando" style="display:none" />
    <div id="proveedor_consulta" style="margin-top: 3%"></div>
<?php elseif (strcasecmp($edit,"true")==0): ?>
    <h1 class="titulo_principal"> Modificar Proveedor </h1>
     <?php
    echo jq_form_remote_tag(array(
        'update'=>'proveedor_consulta',
        'url' => 'Proveedor/consultaPorNombre?edit=true&delete=false',
        'loading' => "$('#img_loader_consulta_prov').show();",
        'complete' => "$('#img_loader_consulta_prov').hide();",
        'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
    ?>
    <fieldset class="fieldset_consulta">
        <legend>Ingrese Nombre</legend>
        <label class="lbl_form">Nombre </label>
        <input type="text" name="txt_nombre_proveedor" class="txt_form" />
        <input type="submit" value="Consultar" />

    </fieldset>
    </form>
    <img id="img_loader_consulta_prov" src="/images/loader.gif" alt="cargando" style="display:none" />
    <div id="proveedor_consulta" style="margin-top: 3%"></div>
<?php elseif (strcasecmp($delete,"true")==0): ?>
    <h1 class="titulo_principal"> Eliminar Proveedor </h1>
     <?php
    echo jq_form_remote_tag(array(
        'update'=>'proveedor_consulta',
        'url' => 'Proveedor/consultaPorNombre?edit=false&delete=true',
        'loading' => "$('#img_loader_consulta_prov').show();",
        'complete' => "$('#img_loader_consulta_prov').hide();",
        'failure' => "alert('Ocurrieron Errores, contacte a su administrador')"));
    ?>
    <fieldset class="fieldset_consulta">
        <legend>Ingrese Nombre</legend>
        <label class="lbl_form">Nombre </label>
        <input type="text" name="txt_nombre_proveedor" class="txt_form" />
        <input type="submit" value="Consultar" />

    </fieldset>
    </form>
    <img id="img_loader_consulta_prov" src="/images/loader.gif" alt="cargando" style="display:none" />
    <div id="proveedor_consulta" style="margin-top: 3%"></div>
        
<?php endif; ?>
