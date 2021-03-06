<div id="migas">
    <a href="<?= base_url('portal/inicio') ?>">Inicio</a> <span>></span> <a href="<?= base_url('portal/inicio/alta') ?>">Registro</a>
</div>
<section>
    <h2>ACCEDE A TU CUENTA</h2>
    <article>
    <?= form_open('portal/inicio/login', array('class' => 'registro')) ?>
        <?= form_error('usuario_log') ?>
        <label for="usuario_logg">Usuario:</label>
        <input type="text" name="usuario_log" id="usuario_logg" />
        <?= form_error('passwd') ?>
        <label for="passwd_logg">Contraseña</label>
        <input type="password" name="passwd" id="passwd_logg" />
        <input type="submit" name="login" value="Login" />
    <?= form_close() ?>
    </article>
</section>
<section>
    <h2>REGISTRATE</h2>
    <article>
    <?= form_open('portal/inicio/alta', array('class' => 'registro')) ?>
        <?= form_error('usuario') ?>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" />
        <?= form_error('email') ?>
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" />
        <?= form_error('password') ?>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" />
        <?= form_error('password_confirm') ?>
        <label for="password_confirm">Contraseña</label>
        <input type="password" name="password_confirm" id="password_confirm" />
        <input type="submit" name="registro" value="Registrate" />
    <?= form_close() ?>
    </article>
</section>