<section>
    <h3>INTRODUZCA NUEVA CONTRASEÑA</h3>
    <?= form_open('', array('class' => 'registro')) ?>
        <input type="password" id="passwd" name="passwd" placeholder="Contraseña" />
        <input type="password" id="re_passwd" name="re_passwd" placeholder="Repetir" />
        <input type="submit" name="enviar" id="enviar" value="Cambiar" />
    <?= form_close() ?>
</section>