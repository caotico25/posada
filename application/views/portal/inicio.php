<section id="presentacion" class="seccion">
    <h2>NOS PRESENTAMOS</h2>
    <article>
        <h3>BIENVENIDOS A LA POSADA DEL CAOS</h3>
        <p>
            Sed bienvenidos a esta humilde posada. Sentaos y disfrutad de una buena partida de rol.
            Compartid opiniones, discutid, daos hachazos si es necesario! (en la ficción por supuesto jejeje).
        </p>
    </article>
</section>

<section id="noticias" class="seccion">
    <h2>NOTICIAS</h2>
    <?php foreach ($noticias as $noticia): ?>
        <article>
            <h3><?= $noticia['titulo'] ?></h3>
            <p><?= $noticia['contenido'] ?></p>
            <span><?= obtener_autor_noticia($noticia['autor']) ?>. <?= $noticia['fecha'] ?></span>
        </article>
    <?php endforeach ?>
</section>
<section id="partidas" class="seccion">
    <h2>PARTIDAS RECIENTES</h2>
    <?php foreach ($partidas as $partida): ?>
        <article>
            <h3><?= $partida['nombre'] ?></h3>
            <p><?= $partida['descripcion'] ?></p>
            <span><?= obtener_estado($partida['estado']) ?></span>
            
            <?php if (participa(obtener_id(), $partida['id'])): ?>
                
                <?php if (es_master(obtener_id(), $partida['id'])): ?>
                    
                    <?= form_open('partidas/partidas/partida_master', array('target' => '_blank')) ?>
                        <input type="hidden" name="id_partida" value="<?= $partida['id'] ?>" id="id_partida"/>
                        <input type="submit" name="iniciar" value="Iniciar partida" id="iniciar"/>
                    <?= form_close() ?>
                    
                <?php else: ?>
                    
                    <?= form_open('partidas/partidas/partida_jugador', array('target' => '_blank')) ?>
                        <input type="hidden" name="id_partida" value="<?= $partida['id'] ?>" id="id_partida"/>
                        <input type="submit" name="entrar" value="Jugar" id="entrar"/>
                    <?= form_close() ?>
                    
                <?php endif ?>
                
            <?php else: ?>
            
                <?php if ($partida['estado'] == 2): ?>
                    <?= form_open('partidas/partidas/unirse_a_partida') ?>
                        <input type="hidden" name="id_partida" value="<?= $partida['id'] ?>" id="id_partida"/>
                        <input type="hidden" name="tipo_juego" value="<?= $partida['tipo_juego'] ?>" id="tipo_juego"/>
                        <input type="submit" name="enviar" value="Únete a la aventura" id="enviar"/>
                    <?= form_close() ?>
                <?php endif ?>
                
            <?php endif ?>
                
        </article>
    <?php endforeach ?>
</section>