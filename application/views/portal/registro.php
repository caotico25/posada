<div id="migas">
    <a href="<?= base_url('portal/inicio') ?>">Inicio</a> <span>></span> <a href="<?= base_url('portal/inicio/alta') ?>">Registro</a>
</div>
<section>
    <h2>ACCEDE A TU CUENTA</h2>
    <article>
    <?= form_open('portal/inicio/login', array('class' => 'registro')) ?>
        <?= form_error('usuario_log') ?>
        <label for="usuario_log">Usuario:</label>
        <input type="text" name="usuario_log"/>
        <?= form_error('passwd') ?>
        <label for="passwd">Contraseña</label>
        <input type="password" name="passwd" />
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
        <input type="text" name="usuario" />
        <?= form_error('email') ?>
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" />
        <?= form_error('password') ?>
        <label for="password">Contraseña</label>
        <input type="password" name="password" />
        <?= form_error('password_confirm') ?>
        <label for="password_confirm">Contraseña</label>
        <input type="password" name="password_confirm" />
        <input type="submit" name="registro" value="Registrate" />
    <?= form_close() ?>
    </article>
</section>