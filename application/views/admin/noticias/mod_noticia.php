<section class="admin">
    <h2>MODIFICAR NOTICIA</h2>
    <article>
    <?= validation_errors() ?>
    <?= form_open('admin/noticias/modificar_noticia', array('id' => 'formadmin')) ?>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?= $noticia['titulo'] ?>" />
        <label for="contenido">Contenido:</label>
        <textarea name="contenido" rows="8" cols="40"><?= $noticia['contenido'] ?></textarea>
        <input type="hidden" name="id_noticia" value="<?= $noticia['id'] ?>" id="id_noticia"/>
        <input type="submit" name="enviar" value="Modificar" id="enviar"/>
    <?= form_close() ?></article>
</section>