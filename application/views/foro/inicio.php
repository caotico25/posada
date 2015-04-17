<div id="migas">
    <a href="<?= base_url('portal/inicio') ?>">Inicio</a> <span>></span> <a href="<?= base_url('foros/foros') ?>">Foro</a>
</div>
<?php $i = 0; $j = 0; ?>
<?php foreach ($secciones as $seccion): ?>
    <section>
        <h2><?= $seccion['titulo'] ?></h2>
        <?php foreach ($temas as $tema): 
            if ($seccion['id'] == $tema['seccion']): ?>
                <a href="<?= base_url('foro/temas/index/' . $tema['id']) ?>">
                    <article>
                        <span><?= $tema['titulo'] ?></span>
                        <p><?= nl2br($tema['descripcion']) ?></p>
                    </article>
                </a>
            <?php endif ?>
        <?php endforeach ?>
    </section>
<?php endforeach; ?>
