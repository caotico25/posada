<!DOCTYPE html>
<html lang="ES">
    
    <head>
        <meta charset="UTF-8" />
        <title>La posada del Caos</title>
        <script src="<?= base_url('javascript/jquery-1-10-2.js') ?>" type="text/javascript" charset="utf-8"></script>
        <!-- <link rel="stylesheet" href="<?= base_url('css/estilo.css') ?>" type="text/css" media="screen" /> -->
        <link rel="stylesheet/less" href="<?= base_url('css/responsive.less') ?>" type="text/css" media="screen" />
        <script src="<?= base_url('javascript/less.js') ?>" type="text/javascript" charset="utf-8"></script>
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    </head>
    
    <body>
        <div id="contenedor">
            
            <header>
                <a href="<?= base_url('portal/inicio') ?>" >LA POSADA DEL CAOS</a>
                
                <nav>
                    <a href="<?= base_url('portal/inicio') ?>" >INICIO</a>
                    <a href="<?= base_url('noticias/noticias') ?>" >NOTICIAS</a>
                    <a href="<?= base_url('partidas/partidas') ?>" >JUEGA ROL</a>
                    <a href="<?= base_url('foro/foros') ?>" >FORO</a>
                    <a href="" >AYUDA</a>
                </nav>
                
            </header>
            
            <!-- NAV SECUNDARIO AQUI O EN LA VISTA CORRESPONDIENTE SI PROCEDE?                 -->

            <div id="contenido">
                
                <?= $contenido ?>
                
            </div>
            
            <aside>
                <!-- ANUNCIOS -->
                <section id="login_registro">
                    <h5>REGISTRO</h5>
                    <?php if (logueado()): ?>
                        <a href="<?= base_url('usuarios/perfil') ?>" ><?= obtener_nombre() ?></a>
                        <?php if (es_admin(obtener_id())): ?>
                            <a href="<?= base_url('admin/inicio') ?>">Ir a zona de administrador</a>
                        <?php endif ?>
                        <a href="<?= base_url('portal/inicio/logout') ?>">Cerrar sesión</a>
                    <?php else: ?>
                        <?= form_open('portal/inicio/login', array('name' => 'login', 'id' => 'login')) ?>
                            <label for="usuario_log">Usuario:</label>
                            <input type="text" name="usuario_log" value="" id="usuario_log"/>
                            <label for="passwd">Contraseña</label>
                            <input type="password" name="passwd" id="passwd"/>
                            <input type="submit" name="login" value="Login" id="login"/>
                            <a href="<?= base_url('portal/inicio/alta') ?>">Registrate</a>
                        <?= form_close() ?>
                    <?php endif ?>
                </section>
            </aside>
            
            <footer>
                <section id="mapa_del_sitio">
                    <h5>Mapa del sitio</h5>
                    <a href="<?= base_url('portal/inicio') ?>" >Inicio</a>
                    <a href="<?= base_url('noticias/noticias') ?>" >Noticias</a>
                    <a href="<?= base_url('partidas/partidas') ?>" >Juega a rol</a>
                    <a href="<?= base_url('foro/foros') ?>" >Foro</a>
                    <a href="" >Ayuda</a>
                </section>
                <section id="enlaces_externos">
                    <h5>Realizado por:</h5>
                    <a href="<?= base_url('portal/inicio') ?>">SoftCaos</a>
                </section>
                <section>
                    <h5>Tests pasados:</h5>
                    <p><img src="<?= base_url('images/valid-html5.png') ?>" alt="HTML5 passed" align="center" /></p>
                    <p><img src="<?= base_url('images/valid-css.png') ?>" alt="CSS3 passed" align="center" /></p>
                </section>
            </footer>
        </div>
    </body>
    
</html>