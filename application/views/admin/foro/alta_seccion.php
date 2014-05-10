<section>
    <h3>CREAR UNA NUEVA SECCION</h3>
    <?= validation_errors() ?>
	<?= form_open('admin/foros/crear_seccion') ?>
		<label for="nombre">Nombre de la nueva sección:</label><input type="text" name="nombre" value="" id="nombre"/>
		<label for="descripcion">Descripción:</label><textarea name="descripcion" rows="8" cols="40"></textarea>
		<input type="submit" name="enviar" value="Crear sección" id="enviar"/>
	<?= form_close() ?>
</section>