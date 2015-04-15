<section class="admin">
    <h3>ESCRIBIR NUEVA NOTICIA</h3>
    <?= validation_errors() ?>
    <?= form_open('admin/noticias/escribir_noticia') ?>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo"/>
        <label for="contenido">Contenido:</label>
        <textarea name="contenido" rows="8" cols="40"></textarea>
        <input type="hidden" name="autor" value="<?= obtener_id() ?>" id="autor"/>
        <input type="submit" name="enviar" value="Crear noticia" id="enviar"/>
    <?= form_close() ?>
</section>