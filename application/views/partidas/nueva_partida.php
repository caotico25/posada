<div id="migas">
    <a href="<?= base_url('portal/inicio') ?>">Inicio</a> <span>></span> <a href="<?= base_url('partidas/partidas') ?>">Jugar a rol</a> <span>></span> <a href="<?= base_url('partidas/partidas/nueva_partida') ?>">Nueva partida</a>
</div>
<section>
    <h2>CREA UNA NUEVA AVENTURA</h2>
    <article>
        <?= form_open('partidas/partidas/nueva_partida', array('name' => 'nueva_partida', 'id' => 'nueva_partida', 'class' => 'registro')) ?>
            <?= form_error('nombre') ?>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre"/>
            <?= form_error('descripcion') ?>
            <label for="descripcion">Descripción: </label>
            <textarea name="descripcion" id="descripcion" rows="8" cols="40"></textarea>
            <?= form_error('tipo_juego') ?>
            <label for="tipo_juego">Formato de juego: </label>
            <select name="tipo_juego" id="tipo_juego">
                <option>------</option>
                <?php foreach ($tipos_juego as $tipo_juego): ?>
                    <option value="<?= $tipo_juego['id'] ?>"><?= $tipo_juego['nombre'] ?></option>
                <?php endforeach ?>
            </select>
            
            <label for="jugadores">Añadir jugadores: </label>
            <select name="jugadores[]" id="jugadores" class="select2" multiple>
                <?php foreach ($jugadores as $jugador): ?>
                    <?php if ($this->session->userdata('id_login') != $jugador['id']): ?>
                        <option value="<?= $jugador['id'] ?>"><?= $jugador['usuario'] ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
            
            <?= form_error('estado') ?>
            <label for="estado">Estado de la partida: </label>
            <select name="estado" id="estado">
                <option>------</option>
                <?php foreach ($estados as $estado): ?>
                    <?php if ($estado['id'] != 4): ?>
                        <option value="<?= $estado['id'] ?>"><?= $estado['estado'] ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
            
            <input type="hidden" name="master" value="<?= obtener_id() ?>" id="master"/>
            <input type="submit" name="enviar" value="Crear" id="enviar"/>
        <?= form_close() ?>
    </article>
</section>