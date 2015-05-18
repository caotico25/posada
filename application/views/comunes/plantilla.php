<!DOCTYPE html>
<html lang="ES">
    
    <head>
        <meta charset="UTF-8" />
        <meta name="Description" content="En la Posada del Caos podrás jugar a rol con tus amigos, aunque no se encuentren cerca de ti! Pásate y diviértete haciendo lo que más te gusta!."/>
        <title>La posada del Caos</title>
        <script src="<?= base_url('javascript/jquery-1-10-2.js') ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url('javascript/esquinas.js') ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url('javascript/jquery.cookie.js') ?>" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet/less" href="<?= base_url('css/responsive.less') ?>" type="text/css" media="screen" />
        <script src="<?= base_url('javascript/less.js') ?>" type="text/javascript" charset="utf-8"></script>
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
            
            $(document).ready(function (){
                
                var url = window.location.href;
                
                var array = url.split("/");
                
                for (var i = 0; i < array.length; i++)
                {
                    
                    if (array[i] == "inicio")
                    {
                        $("#inicio").css('background-image', 'none');
                        $("#inicio").css('background-color', 'rgba(220, 115, 64, 0.5)');
                        $("#inicio").corner("long top 10px");
                    }
                    if (array[i] == "noticias")
                    {
                        $("#noticias").css('background-image', 'none');
                        $("#noticias").css('background-color', 'rgba(220, 115, 64, 0.5)');
                        $("#noticias").corner("long top 10px");
                    }
                    if (array[i] == "partidas")
                    {
                        $("#rol").css('background-image', 'none');
                        $("#rol").css('background-color', 'rgba(220, 115, 64, 0.5)');
                        $("#rol").corner("long top 10px");
                    }
                    if (array[i] == "foro")
                    {
                        $("#foro").css('background-image', 'none');
                        $("#foro").css('background-color', 'rgba(220, 115, 64, 0.5)');
                        $("#foro").corner("long top 10px");
                    }
                    if (array[i] == "ayuda")
                    {
                        $("#ayuda").css('background-image', 'none');
                        $("#ayuda").css('background-color', 'rgba(220, 115, 64, 0.5)');
                        $("#ayuda").corner("long top 10px");
                    }
                }
                
                // FUNCION PARA CAMBIAR EL ESTADO DE LA PARTIDA
                $("#master").on("change", "#estado", function() {
                    
                    var estado = $("#estado").val();
                    var id_partida = $("#estado").attr("class");
                    
                    $.ajaxSetup({
                        data: {
                            csrf_test_name: $.cookie('csrf_cookie_name')
                            }
                    });
                    
                    $.ajax({
                        
                        url: "<?= base_url('partidas/partidas/cambiar_estado') ?>",
                        type: "POST",
                        data: {'estado': estado, 'id_partida': id_partida, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function (){
                            
                            alert("Estado modificado correctamente.");
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                });
                
                // FUNCION PARA FINALIZAR PARTIDA
                $("#finalizar").on("click", function() {
                    
                    // RECOGER DE NUEVO LA VISTA DE PERFIL Y VOLVER A MOSTRAR CON LOS CAMBIOS REALIZADOS
                    // CREAR SECCION EN LA QUE SE MUESTRE LISTA DE PARTIDAS FINALIZADAS
                    $.ajaxSetup({
                        data: {
                            csrf_test_name: $.cookie('csrf_cookie_name')
                            }
                    });
                    alert($(this).parent().attr('id'));
                    $.ajax({
                        
                        url: "<?= base_url('partidas/partidas/finalizar_partida') ?>",
                        type: "POST",
                        data: {'id_partida': $(this).parent().attr('id').val(), 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function() {
                            
                            alert("Partida finalizada.");
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                    return false;
                    
                });
                
            });
            
            
            // POP UP CAMBIO PASSWD
            function abrir_popup()
            {
                var ventan = window.open("<?= base_url('usuarios/perfil/cambio_passwd')?>", '_blank', 'height=200, width=300, top=500, left=200');
                ventan.focus();
                return false;
            }
            
            
        </script>
        
        
    </head>
    
    <body>
        <div id="contenedor">
            
            <header>
                <a href="<?= base_url('portal/inicio') ?>" ><h1>LA POSADA DEL CAOS</h1></a>
                
                <nav>
                    <a href="#">MENU</a>
                    <a href="<?= base_url('portal/inicio') ?>" id="inicio" >INICIO</a>
                    <a href="<?= base_url('noticias/noticias') ?>" id="noticias" >NOTICIAS</a>
                    <a href="<?= base_url('partidas/partidas') ?>" id="rol" >JUEGA ROL</a>
                    <a href="<?= base_url('foro/foros') ?>" id="foro" >FORO</a>
                    <a href="<?= base_url('ayuda/ayudas') ?>" id="ayuda" >AYUDA</a>
                </nav>
                
            </header>
            
            <!-- NAV SECUNDARIO AQUI O EN LA VISTA CORRESPONDIENTE SI PROCEDE?                 -->

            <div id="contenido">
                
                <?= $contenido ?>
                
            </div>
            
            <aside>
                <a href="#">OPCIONES</a>
                <section id="login_registro">
                    <?php if (logueado()): ?>
                        <h5>LOGUEADO COMO:</h5>
                        <p><?= obtener_nombre() ?></p>
                        <a href="<?= base_url('usuarios/perfil') ?>" >Area personal</a>
                        <?php if (es_admin(obtener_id())): ?>
                            <a href="<?= base_url('admin/inicio') ?>">Zona admin</a>
                        <?php endif ?>
                        <a href="<?= base_url('portal/inicio/logout') ?>">Cerrar sesión</a>
                    <?php else: ?>
                        <h5>ACCESO USUARIO</h5>
                        <?= form_open('portal/inicio/login', array('name' => 'login', 'id' => 'login')) ?>
                            <label for="user_log">Usuario:</label>
                            <input type="text" name="usuario_log" value="" placeholder="usuario" id="user_log" />
                            <label for="passwd_log">Contraseña</label>
                            <input type="password" name="passwd" placeholder="contraseña" id="passwd_log" />
                            <input type="submit" name="login" value="Login"/>
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
                    <a href="<?= base_url('ayuda/ayudas') ?>" >Ayuda</a>
                </section>
                <section id="enlaces_externos">
                    <h5>Realizado por:</h5>
                    <a href="<?= base_url('portal/inicio') ?>">SoftCaos</a>
                </section>
                <section>
                    <h5>Tests pasados:</h5>
                    <p><img src="<?= base_url('images/valid-html5.png') ?>" alt="HTML5 passed" /></p>
                    <p><img src="<?= base_url('images/valid-css.png') ?>" alt="CSS3 passed" /></p>
                </section>
            </footer>
        </div>
    </body>
    
</html>
