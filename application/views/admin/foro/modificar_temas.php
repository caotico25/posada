<section class="admin">
    <h2>MODIFICAR TEMAS</h2>
    <article>
    <?= form_open('admin/foros/modificar_tema', array('id' => 'formadmin')) ?>
        <?= validation_errors() ?>
        <label for="tema">Elige el tema a modificar:</label>
        <select name="tema">
            <option>Elegir...</option>
            <?php foreach ($temas as $tema): ?>
                <option value="<?= $tema['id'] ?>"><?= $tema['titulo'] ?></option>
            <?php endforeach ?>
        </select>
        <!-- RECUPERAR NOMBRE Y DEDSCRIPCION CON AJAX -->
        <label for="nombre">Nombre del tema:</label><input type="text" name="nombre" value="" id="nombre"/>
        <label for="descripcion">Descripción:</label><textarea name="descripcion" id="descripcion" rows="8" cols="40"></textarea>
        <label for="seccion">Mover de sección:</label>
        <select name="seccion_tema" id="seccion_tema">
            <option value="">Elegir...</option>
            <?php foreach ($secciones as $seccion): ?>
                <option value="<?= $seccion['id'] ?>"><?= $seccion['titulo'] ?></option>
            <?php endforeach ?>
        </select>
        <input type="hidden" value="" id="id" />
        <input type="submit" name="enviar" value="Modificar tema" id="enviar"/>
    <?= form_close() ?></article>
</section>