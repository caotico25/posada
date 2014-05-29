<section>
    <h2>CREA UNA NUEVA AVENTURA</h2>
    <article>
        <?= form_open('partidas/partidas/nueva_partida') ?>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" value="" id="nombre"/>
            <label for="descripcion">Descripción: </label>
            <textarea name="descripcion" rows="8" cols="40"></textarea>
            <label for="tipo_juego">Formato de juego: </label>
            <select name="tipo_juego" id="tipo_juego">
                <?php foreach ($tipos_juego as $tipo_juego): ?>
                    <option value="<?= $tipo_juego['id'] ?>"><?= $tipo_juego['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            <label for="estado">Estado de la partida: </label>
            <select name="estado" id="estado">
                <option value="PREPARANDO">PREPARANDO PARTIDA</option>
                <option value="COMENZADA">COMENZADA</option>
                <option value="BUSCANDO">BUSCANDO JUGADORES</option>
            </select>
            <input type="hidden" name="master" value="<?= obtener_id() ?>" id="master"/>
            <input type="submit" name="enviar" value="CREAR" id="enviar"/>
        <?= form_close() ?>
    </article>
</section>