<div id="migas">
    <a href="<?= base_url('portal/inicio') ?>">Inicio</a> <span>></span> <a href="<?= base_url('portal/inicio/alta') ?>">Registro</a>
</div>
<section>
    <h2>ACCEDE A TU CUENTA</h2>
    <article>
    <?= form_open('portal/inicio/login', array('class' => 'registro')) ?>
        <label for="usuario_log">Usuario:</label>
        <input type="text" name="usuario_log" id="usuario_log"/>
        <?= form_error('usuario_log') ?>
        <label for="passwd">Contraseña</label>
        <input type="password" name="passwd" id="passwd"/>
        <?= form_error('passwd') ?>
        <input type="submit" name="login" value="Login" id="login"/>
    <?= form_close() ?></article>
</section>
<section>
    <h2>REGISTRATE</h2><article>
    <?= form_open('portal/inicio/alta', array('class' => 'registro')) ?>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario"/>
        <?= form_error('usuario') ?>
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email"/>
        <?= form_error('email') ?>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password"/>
        <?= form_error('password') ?>
        <label for="password_confirm">Contraseña</label>
        <input type="password" name="password_confirm" id="password_confirm"/>
        <?= form_error('password_confirm') ?>
        <input type="submit" name="registro" value="Registrate" id="registro"/>
    <?= form_close() ?></article>
</section>