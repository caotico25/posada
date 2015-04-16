<section class="admin">
    <h2>ESCRIBIR NUEVA NOTICIA</h2>
    <article>
    <?= form_open('admin/noticias/escribir_noticia', array('id' => 'formadmin')) ?>
        <?= validation_errors() ?>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo"/>
        <label for="contenido">Contenido:</label>
        <textarea name="contenido" rows="8" cols="40"></textarea>
        <input type="hidden" name="autor" value="<?= obtener_id() ?>" id="autor"/>
        <input type="submit" name="enviar" value="Crear noticia" id="enviar"/>
    <?= form_close() ?></article>
</section>