<section id="presentacion">
    <h2>BIENVENIDOS A LA POSADA DEL CAOS</h2>
    <article>
        <p>
            Sed bienvenidos a esta humilde posada. Sentaos y disfrutad de una buena partida de rol.
            Compartid opiniones, discutid, daos hachazos si es necesario! (en la ficción por supuesto jejeje).
        </p>
    </article>
</section>

<section id="noticias">
    <h2>NOTICIAS</h2>
    <?php foreach ($noticias as $noticia): ?>
        <article>
            <h3><?= $noticia['titulo'] ?></h3>
            <p><?= $noticia['contenido'] ?></p>
            <span><?= obtener_nombre($noticia['autor']) ?>. <?= $noticia['fecha'] ?></span>
        </article>
    <?php endforeach ?>
</section>
<section id="partidas">
    <h2>PARTIDAS RECIENTES</h2>
    <article>
        <h3></h3>
        <p></p>
        <footer></footer>
    </article>
</section>