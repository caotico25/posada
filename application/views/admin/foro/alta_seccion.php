<section class="admin">
    <h2>CREAR UNA NUEVA SECCION</h2>
    <article>
    	<?= form_open('admin/foros/crear_seccion', array('id' => 'formadmin')) ?>
    	   <?= validation_errors() ?>
    		<label for="nombre">Nombre de la nueva sección:</label><input type="text" name="nombre" value="" id="nombre"/>
    		<label for="descripcion">Descripción:</label><textarea name="descripcion" rows="8" cols="40"></textarea>
    		<input type="submit" name="enviar" value="Crear sección" id="enviar"/>
    	<?= form_close() ?>
	</article>
</section>