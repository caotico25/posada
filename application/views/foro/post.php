<div id="migas">
    <a href="<?= base_url('portal/inicio') ?>">Inicio</a> <span>></span> <a href="<?= base_url('foro/foros') ?>">Foro</a> <span>></span> <a href="<?= base_url('foro/temas') . '/index/' . $post['tema'] ?>"><?= nombre_tema($post['tema']) ?></a> <span>></span> <a href=""><?= $post['titulo'] ?></a>
</div>
<section>
    <h2><?= $post['titulo'] ?></h2>
    <article class="post">
        <p><?= nl2br($post['contenido']) ?></p>
        <span>Por: <?= obtener_autor($post['autor']) ?> - <?= $post['fecha'] ?></span>
    </article>
    
    <!-- BOTON NUEVO COMENTARIO -->
    <?php if (count($comentarios) > 0): ?>
        <?php foreach ($comentarios as $comentario): ?>
            <article class="comentario">
                <h3>Por: <?= obtener_autor($comentario['autor']) ?></h3>
                <p><?= nl2br($comentario['contenido']) ?></p>
                <span><?= $post['fecha'] ?></span>
            </article>
        <?php endforeach ?>
    <?php else: ?>
        <p>Aún no hay comentarios en este post.</p>
    <?php endif ?>
        
    <?php if (logueado()): ?>
        <?= form_open('foro/comentarios/nuevo_comentario', array('id' => 'formu')) ?>
            <?= form_hidden('id_post', $id_post) ?>     <!-- PASAR A HTML5 -->
            <?= form_submit('comentario', 'Responder') ?>
        <?= form_close() ?>
   <?php else: ?>
       <a href="<?= base_url('portal/inicio/login') ?>">Haz login o regístrate para responder a este post</a>
   <?php endif ?>
</section>