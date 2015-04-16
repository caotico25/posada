<section class="admin">
    <h2>ELIMINAR SECCIONES</h2><article>
    <table>
        <?php foreach ($secciones as $seccion): ?>
            <tr>
                <td><?= $seccion['titulo'] ?></td>
                <td>
                    <?= form_open('admin/foros/eliminar_seccion') ?>
                        <?= form_hidden('id_seccion', $seccion['id']) ?>
                        <?= form_submit('enviar', 'Eliminar') ?>
                    <?= form_close() ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <ul>
        <?php foreach ($secciones as $seccion): ?>
            <li>
                <p><?= $seccion['titulo'] ?></p>
                <?= form_open('admin/foros/eliminar_seccion') ?>
                    <?= form_hidden('id_seccion', $seccion['id']) ?>
                    <?= form_submit('enviar', 'Eliminar') ?>
                <?= form_close() ?>
            </li>
        <?php endforeach ?>
    </ul>
    </article>
</section>