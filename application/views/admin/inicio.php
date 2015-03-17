<section class="admin">
    <h2>Administrar foro</h2>
    <article>
        <h3>Secciones</h3>
        <a href="<?= base_url('admin/foros/crear_seccion') ?>">Crear nueva sección</a>
        <a href="<?= base_url('admin/foros/modificar_seccion') ?>">Modificar secciones</a>
        <a href="<?= base_url('admin/foros/eliminar_seccion') ?>">Eliminar secciones</a>
    </article>
    <article>
        <h3>Temas</h3>
        <a href="<?= base_url('admin/foros/crear_tema') ?>">Crear nuevo tema</a>
        <a href="<?= base_url('admin/foros/modificar_tema') ?>">Modificar temas</a>
        <a href="<?= base_url('admin/foros/eliminar_tema') ?>">Eliminar temas</a>
    </article>
    <article>
        <h3>Posts</h3>
        <a href=""></a>
        <a href="<?= base_url('foro/foros') ?>">Revisar posts</a>
    </article>
</section>
<section class="admin">
    <h2>Administrar noticias</h2>
    <article>
        <a href="<?= base_url('admin/noticias/escribir_noticia') ?>">Escribir una nueva noticia</a>
        <a href=""></a>
        <a href="<?= base_url('noticias/noticias') ?>">Revisar noticias</a>
    </article>
</section>
<section class="admin">
    <h2>Informes</h2>
    <article>
        <a href=""></a>
        <a href="<?= base_url('partidas/partidas/informe_partidas') ?>" target="_blank" >Partidas creadas</a>
    </article>
</section>