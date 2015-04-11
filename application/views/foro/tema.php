<div id="migas">
    <a href="<?= base_url('portal/inicio') ?>">Inicio</a> > <a href="<?= base_url('foros/foros') ?>">Foro</a> > <a href="<?= base_url('foros/temas') . '/index/' . $post['tema'] ?>"><?= $tema ?></a>
</div>
<section>
    <h2><?= $tema ?></h2>
        <?php foreach ($posts as $post): ?>
            <a href="<?= base_url('foro/posts/index/' . $post['id']) ?>">
                <article>
                    <h3><?= $post['titulo'] ?></h3>
                    <span><?= $post['autor'] ?> - <?= $post['fecha'] ?></span>
                </article>
            </a>
        <?php endforeach ?>
        
        <?php if (logueado()): ?>
            <?= form_open('foro/posts/nuevo_post') ?>
                <?= form_hidden('id_tema', $id_tema) ?>
                <?= form_submit('post', 'Nuevo post') ?>
            <?= form_close() ?>
       <?php else: ?>
           <a href="<?= base_url('portal/inicio/login') ?>">Haz login o regístrate para crear un post</a>
       <?php endif ?>
</section>