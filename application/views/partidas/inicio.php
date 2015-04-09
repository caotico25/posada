<div id="migas">
    <a href="<?= base_url('portal/inicio') ?>">Inicio</a> > <a href="<?= base_url('partidas/partidas') ?>">Jugar a rol</a>
</div>
<section id="ultimas_partidas">
    <h2>PARTIDAS RECIENTES</h2>
    <?php foreach ($partidas as $partida): ?>
        <article>
            <h3><?= $partida['nombre'] ?></h3>
            <p><?= $partida['descripcion'] ?></p>
            <span><?= obtener_estado($partida['estado']) ?></span>
            
            <?php if (logueado()): ?>
            
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
                
            <?php endif ?>
            
        </article>
    <?php endforeach ?>
</section>

<section>
    <h2>CREA UNA NUEVA PARTIDA</h2>
    <article>
        <?= form_open('partidas/partidas/nueva_partida') ?>
            <input type="submit" name="enviar" value="Comenzar" id="enviar"/>
        <?= form_close() ?>
    </article>
</section>