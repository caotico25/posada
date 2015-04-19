<!DOCTYPE html>
<html lang="ES">
    
    <head>
        <meta charset="UTF-8" />
        <title>La posada del Caos</title>
        <script src="<?= base_url('javascript/jquery-1-10-2.js') ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url('javascript/jquery.cookie.js') ?>" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet/less" href="<?= base_url('css/responsive.less') ?>" type="text/css" media="screen" />
        <script src="<?= base_url('javascript/less.js') ?>" type="text/javascript" charset="utf-8"></script>
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
            
            $(document).ready(function() {
                
                $("#contenido").on("change", "select", function() {
                    
                    if ($(this).attr("name") == "seccion")
                    {
                        var dir = "<?= base_url('admin/foros/info_seccion') ?>";
                    }
                    else if ($(this).attr("name") == "tema")
                    {
                        var dir = "<?= base_url('admin/foros/info_tema') ?>";
                    }
                    
                    var id = $(this).val();
                    
                    $.ajaxSetup({
                        data: {
                            csrf_test_name: $.cookie('csrf_cookie_name')
                            }
                    });
                    
                    if ($(this).attr("name") == "seccion" || $(this).attr("name") == "tema")
                    {
                        $.ajax({
                        
                            url: dir,
                            type: "POST",
                            data: {id: id, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                            success: function (datos){
                                
                                var info = $.parseJSON(datos)
                                
                                $("#nombre").val(info.titulo);
                                $("#descripcion").text(info.descripcion);
                                $("#id").val(info.id);
                                
                                if ($(this).attr("name") == "tema")
                                {
                                    $("#seccion_tema").val(info.seccion);
                                }
                                
                            },
                            error: function (jqXHR, textStatus, errorThrown){
                                
                                alert(textStatus + ' ' + errorThrown);
                                
                            }
                            
                        });
                        
                    }
                    
                });
                
            });
            
        </script>
    </head>
    
    <body>
        <div id="contenedor">
            
            <header>
                <a href="<?= base_url('portal/inicio') ?>" ><h1>LA POSADA DEL CAOS</h1></a>
            </header>

                <div id="contenido">
                    
                    <?= $contenido ?>
                    
                </div>
                
                <aside>
                    <a href="#">OPCIONES</a>
                    <section id="login_registro">
                        <h5>LOGUEADO COMO:</h5>
                        <a href="<?= base_url('usuarios/perfil') ?>" ><?= obtener_nombre() ?></a>
                        <a href="<?= base_url('portal/inicio') ?>" >Inicio</a>
                        <a href="<?= base_url('portal/inicio/logout') ?>">Cerrar sesión</a>
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