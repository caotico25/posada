<section class="admin">
    <h2>CREAR UN NUEVO TEMA</h2>
    <article>
	<?= form_open('admin/foros/crear_tema', array('id' => 'formadmin')) ?>
	   <?= validation_errors() ?>
        <label for="seccion">Sección:</label>
        <select name="seccion">
            <option value="">Elegir...</option>
            <?php foreach ($secciones as $seccion): ?>
                <option value="<?= $seccion['id'] ?>"><?= $seccion['titulo'] ?></option>
            <?php endforeach ?>
        </select>
		<label for="nombre">Nombre del nuevo tema:</label><input type="text" name="nombre" value="" id="nombre"/>
		<label for="contenido">Descripción:</label><textarea name="contenido" rows="8" cols="40"></textarea>
		<input type="submit" name="enviar" value="Crear tema" id="enviar"/>
	<?= form_close() ?></article>
</section>