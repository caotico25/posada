<section class="admin">
    <h2>ELIMINAR TEMAS</h2>
    <ul>
        <?php foreach ($temas as $tema): ?>
            <li>
                <p><?= $tema['titulo'] ?></p>
                <?= form_open('admin/foros/eliminar_tema') ?>
                    <?= form_hidden('id_tema', $tema['id']) ?>
                    <?= form_submit('enviar', 'Eliminar') ?>
                <?= form_close() ?>
            </li>
        <?php endforeach ?>
    </ul>
</section>