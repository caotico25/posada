<section id="datos_jugador">
    <h2>CAMBIA TU CONTRASEÑA</h2>
    <button name="cambio_passwd" id="cambio_passwd">Cambia tu contraseña</button>
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
                
                <select name="estado" id="estado" class="<?= $partida['id'] ?>">
                    <option value="1">Preparando partida</option>
                    <option value="2">Buscando jugadores</option>
                    <option value="3">Comenzada</option>
                </select>
                
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
                <?php if ($partida['activa'] == 't'): ?>
                    <p>Partida activa</p>
                    
                    <?= form_open('partidas/partidas/partida_jugador', array('target' => '_blank')) ?>
                        <input type="hidden" name="id_partida" value="<?= $partida['id'] ?>" id="id_partida"/>
                        <input type="submit" name="entrar" value="Jugar" id="entrar"/>
                    <?= form_close() ?>
                    
                <?php endif ?>
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