<div id="migas">
    <a href="<?= base_url('portal/inicio') ?>">Inicio</a> > <a href="<?= base_url('noticias/noticias') ?>">Noticias</a>
</div>
<section>
    <h2>NOTICIAS</h2>
    <?php foreach ($noticias as $noticia): ?>
        <article>
            <h3><?= $noticia['titulo'] ?></h3>
            <p><?= nl2br($noticia['contenido']) ?></p>
            <span>Por <?= obtener_autor($noticia['autor']) ?>. <?= $noticia['fecha'] ?></span>
            <?php if (logueado()) : ?>
                <?php if (es_admin(obtener_id())): ?>
                    
                    <?= form_open('admin/noticias/eliminar_noticia') ?>
                        <?= form_hidden('id_noticia', $noticia['id']) ?>
                        <input type="submit" name="enviar" value="Elimnar" id="enviar"/>
                    <?= form_close() ?>
                    
                    <?= form_open('admin/noticias/modificar_noticia') ?>
                        <?= form_hidden('id_noticia', $noticia['id']) ?>
                        <input type="submit" name="enviar" value="Modificar" id="enviar"/>
                    <?= form_close() ?>
                    
                <?php endif ?>
            <?php endif ?>
        </article>
    <?php endforeach ?>
    
    <div id="paginacion">
       <!--- <?php foreach ($enlaces as $enlace): ?>
            <?= $enlace ?>
        <?php endforeach ?> --->
        <?= $enlaces ?>
    </div>
</section>