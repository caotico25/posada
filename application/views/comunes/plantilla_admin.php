<!DOCTYPE html>
<html lang="ES">
    
    <head>
        <meta charset="UTF-8" />
        <title>La posada del Caos</title>
        <!-- <link rel="stylesheet" href="<?= base_url('css/estilo.css') ?>" type="text/css" media="screen" /> -->
        <link rel="stylesheet/less" href="<?= base_url('css/responsive.less') ?>" type="text/css" media="screen" />
        <script src="<?= base_url('javascript/less.js') ?>" type="text/javascript" charset="utf-8"></script>
    </head>
    
    <body>
        <div id="contenedor">
            
            <header>
                <a href="" >LA POSADA DEL CAOS</a>
            </header>

                <div id="contenido">
                    
                    <?= $contenido ?>
                    
                </div>
                
                <aside>
                    <!-- ANUNCIOS -->
                    <section id="login_registro">
                        <a href="<?= base_url('usuarios/perfil') ?>" ><?= obtener_nombre() ?></a>
                        <a href="<?= base_url('portal/inicio/logout') ?>">Cerrar sesión</a>
                    </section>
                </aside>
            
            <footer>
                <section id="mapa_del_sitio">
                    <p>Mapa del sitio</p>
                    <a href="<?= base_url('portal/inicio') ?>" >Inicio</a>
                    <a href="" >Noticias</a>
                    <a href="" >Partidas</a>
                    <a href="<?= base_url('foro/temas') ?>" >Foro</a>
                    <a href="" >Ayuda</a>
                </section>
                <section id="enlaces_externos">
                    <img src="" alt="" />
                    <img src="" alt="" />
                    <p>Realizado por:</p>
                    <a href="">SoftCaos</a>
                </section>
                <section>
                    <!-- IMAGENES DE VALIDACION HTML5 Y CSS3 -->
                </section>
            </footer>
        </div>
    </body>
    
</html>