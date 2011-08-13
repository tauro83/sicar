<?php use_helper('I18N') ?>
<div id="formulario-entrar">

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table id ="cosas2">
    <tbody>   
            <p id="titulo-principal">Bienvenido a SICAR</p>
            <p id="subtitulo-principal">Para entrar, ingrese su usuario y contraseña</p>
            <?php echo $form ?>
            <img src="/images/img/carrito.png" id="carrito"/>
            <p id="pie-principal">Desarrolladores, 2011</p>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2" id="cosas">
          <input id="entrar" type="submit" value="<?php echo __('Iniciar sesión', null, 'sf_guard') ?>" />
          <p></p>
          <?php $routes = $sf_context->getRouting()->getRoutes() ?>
          <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
    
</div>