<section id="datos_jugador">
    <h2></h2>
    <a href="c_contraseña">Cambiar contraseña de usuario</a>
</section>
<section id="master">
    <h2>PARTIDAS DIRIGIDAS POR TI:</h2>
    <?php if ($partidas_m != NULL): ?>
        <?php foreach ($partidas_m as $partida): ?>
            <article>
                <h3><?= $partida['nombre'] ?></h3>
                <p><?= $partida['descripcion'] ?></p>
                <?= form_open('partidas/partidas/partida_master', array('target' => '_blank')) ?>
                    <input type="hidden" name="id_partida" value="<?= $partida['id'] ?>" id="id_partida"/>
                    <input type="submit" name="iniciar" value="Iniciar partida" id="iniciar"/>
                <?= form_close() ?>
            </article>
        <?php endforeach ?>
    <?php else: ?>
        <article>
            <h3>AUN NO HAS INICIADO NINGUNA AVENTURA!</h3>
            <p>¿A qué esperas? Crea nuevas aventuras!</p>
            <a href="<?= base_url('partidas/partidas/nueva_partida') ?>"></a>
        </article>
    <?php endif ?>
</section>

<section id="jugador">
    <h2>PARTIDAS EN LAS QUE PARTICIPAS:</h2>
    <?php if ($partidas_p != NULL): ?>
        <?php foreach ($partidas_p as $partida): ?>
            <article>
                <h3><?= $partida['nombre'] ?></h3>
                <p><?= $partida['descripcion'] ?></p>
            </article>
        <?php endforeach ?>
    <?php else: ?>
        <article>
            <h3>AUN NO FORMAS PARTE DE NINGUNA AVENTURA!</h3>
            <p>¿A qué esperas? Busca aventuras!</p>
            <a href="<?= base_url('partidas/partidas') ?>"></a>
        </article>
    <?php endif ?>
</section>

<!-- COLOCAR CAMBIO DE CONTRASEÑA EN VENTANA EMERGENTE -->
<section id="c_contraseña">  
    <h2>CAMBIA TU CONTRASEÑA</h2>
    <article>
        <?= form_open('usuarios/perfil/cambiar_passwd') ?>
            <label for="password">Introduce tu contraseña:</label><input type="password" name="password" value="" id="password"/>
            <label for="n_passwd">Nueva contraseña:</label><input type="password" name="n_passwd" value="" id="n_passwd"/>
            <label for="r_passwd">Repite la contraseña:</label><input type="password" name="r_passwd" value="" id="r_passwd"/>
            <input type="submit" name="enviar" value="Cambiar contraseña" id="enviar"/>
        <?= form_close() ?>
    </article>
</section>