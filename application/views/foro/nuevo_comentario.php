<div id="migas">
    <a href="<?= base_url('portal/inicio') ?>">Inicio</a> <span>></span> <a href="<?= base_url('foros/foros') ?>">Foro</a>
</div>
<section>
    <h2>Crear un nuevo comentario.</h2>
    <p>Recuerda seguir las normas del foro. Si las incumples, tu comentario será eliminado.</p>
    <article>
        <?= form_open('foro/comentarios/nuevo_comentario') ?>
            <textarea name="contenido" rows="8" cols="40"></textarea>
            <input type="hidden" name="id_post" value="<?= $id_post ?>" id="id_post"/>
            <input type="submit" name="enviar" value="Enviar" id="enviar"/>
        <?= form_close() ?>
    </article>
</section>