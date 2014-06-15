<?php foreach ($mensajes as $mensaje): ?>
<?php
    $nombre = nombre_personaje($mensaje['partida'], $mensaje['jugador']);
    
    if ($nombre == '')
    {
        $nombre = 'Master';
    }
?>
<?php if (trim($mensaje['mensaje']) != ''): ?>
<div>
    <span><?= $nombre ?>:</span>
    <span><?= $mensaje['mensaje'] ?></span><br />
</div>
<?php endif ?>
<?php endforeach ?>