<section>
    <h2>CREA UNA NUEVA AVENTURA</h2>
    <article>
        <?= form_open('partidas/partidas/nueva_partida', array('name' => 'nueva_partida', 'id' => 'nueva_partida')) ?>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre"/>
            <?= form_error('nombre') ?>
            <label for="descripcion">Descripción: </label>
            <textarea name="descripcion" id="descripcion" rows="8" cols="40"></textarea>
            <?= form_error('descripcion') ?>
            <label for="tipo_juego">Formato de juego: </label>
            <select name="tipo_juego" id="tipo_juego">
                <?php foreach ($tipos_juego as $tipo_juego): ?>
                    <option value="<?= $tipo_juego['id'] ?>"><?= $tipo_juego['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('tipo_juego') ?>
            <label for="estado">Estado de la partida: </label>
            <select name="estado" id="estado">
                <?php foreach ($estados as $estado): ?>
                    <option value="<?= $estado['id'] ?>"><?= $estado['estado'] ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('estado') ?>
            <input type="hidden" name="master" value="<?= obtener_id() ?>" id="master"/>
            <input type="submit" name="enviar" value="Crear" id="enviar"/>
        <?= form_close() ?>
    </article>
</section>