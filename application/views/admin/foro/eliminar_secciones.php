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
    </table></article>
</section>