<div id="migas">
    <a href="<?= base_url('portal/inicio') ?>">Inicio</a> > <a href="<?= base_url('foros/foros') ?>">Foro</a>
</div>
<section>
    <h2>Crear un nuevo post.</h2>
    <p>Recuerda seguir las normas del foro. Si las incumples, tu post será eliminado.</p>
    <article>
        <?= form_open('foro/posts/nuevo_post') ?>
            <label for="titulo">Título</label>
            <input type="text" name="titulo" value="" id="titulo"/>
            <textarea name="contenido" rows="8" cols="40"></textarea>
            <input type="hidden" name="id_tema" value="<?= $id_tema ?>" id="id_tema"/>
            <input type="submit" name="enviar" value="Enviar" id="enviar"/>
        <?= form_close() ?>
    </article>
</section>