<section class="admin">
    <h2>MODIFICAR SECCIONES</h2>
    <?= form_open('admin/foros/modificar_seccion', array('id' => 'formadmin')) ?>
        <label for="seccion">Elige la sección a modificar:</label>
        <select name="seccion">
            <option>Elegir...</option>
            <?php foreach ($secciones as $seccion): ?>
                <option value="<?= $seccion['id'] ?>"><?= $seccion['titulo'] ?></option>
            <?php endforeach ?>
        </select>
        <!-- RECUPERAR NOMBRE Y DEDSCRIPCION CON AJAX -->
        <label for="nombre">Nombre de la sección:</label><input type="text" name="nombre" value="" id="nombre"/>
        <label for="descripcion">Descripción:</label><textarea name="descripcion" rows="8" cols="40"></textarea>
        <input type="submit" name="enviar" value="Modificar sección" id="enviar"/>
    <?= form_close() ?>
</section>