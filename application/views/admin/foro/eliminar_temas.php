<section>
    <h2>ELIMINAR TEMAS</h2>
    <table>
        <?php foreach ($temas as $tema): ?>
            <tr>
                <td><?= $tema['titulo'] ?></td>
                <td>
                    <?= form_open('admin/foros/eliminar_tema') ?>
                        <?= form_hidden('id_tema', $tema['id']) ?>
                        <?= form_submit('enviar', 'Eliminar') ?>
                    <?= form_close() ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</section>