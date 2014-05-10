<?php $i = 0; $j = 0; ?>
<?php foreach ($secciones as $seccion): ?>
    <section>
        <h2><?= $seccion['titulo'] ?></h2>
        <p><?= $seccion['descripcion'] ?></p>
        <?php for ($j=0; $j < count($temas); $j++): ?>
            <article><a href="<?= base_url('foro/temas/' . $temas[$i]['id']) ?>"><?= $temas[$i]['titulo'] ?></a></article>
            <?php $i++ ?>
        <?php endfor ?>
        <?= var_dump($temas) ?>
    </section>
<?php endforeach; ?>
