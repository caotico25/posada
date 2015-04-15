<section class="admin">
    <h3>MODIFICAR NOTICIA</h3>
    <?= validation_errors() ?>
    <?= form_open('admin/noticias/modificar_noticia') ?>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?= $noticia['titulo'] ?>" />
        <label for="contenido">Contenido:</label>
        <textarea name="contenido" rows="8" cols="40"><?= $noticia['contenido'] ?></textarea>
        <input type="hidden" name="id_noticia" value="<?= $noticia['id'] ?>" id="id_noticia"/>
        <input type="submit" name="enviar" value="Modificar" id="enviar"/>
    <?= form_close() ?>
</section>