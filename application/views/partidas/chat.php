<?php foreach ($mensajes as $mensaje): ?>

    <?php if (trim($mensaje['mensaje']) != ''): ?>
        <div>
            
            <?php 
            /*
                $nombre = '';
                if (es_master($mensaje['jugador'], $mensaje['parida']))
                {
                    $nombre = 'Master';
                }
                else
                {
                    $nombre = nombre_personaje($mensaje['partida'], $mensaje['jugador']);
                }*/
            ?>
            
            <span><?= $nombre ?>:</span>
            <span><?= $mensaje['mensaje'] ?></span><br />
        </div>
    <?php endif ?>
<?php endforeach ?>