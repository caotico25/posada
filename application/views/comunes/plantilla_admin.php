<!DOCTYPE html>
<html lang="ES">
    
    <head>
        <meta charset="UTF-8" />
        <title>La posada del Caos</title>
        <script src="<?= base_url('javascript/jquery-1-10-2.js') ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url('javascript/jquery.cookie.js') ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url('javascript/esquinas.js') ?>" type="text/javascript" charset="utf-8"></script>
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
                
                
                // FUNCIONES PARA LA CREACION NUEVO TIPO DE JUEGO
                // VARIABLE EN LA QUE SE ALMACENAR´EL TIPO DE JUEGO
                var tipo_juego = 0;
                
                
                // CREA UN NUEVO TIPO DE JUEGO
                $("#crear_juego").on("click", function() {
                    
                    $.ajaxSetup({
                        data: {
                            csrf_test_name: $.cookie('csrf_cookie_name')
                            }
                    });
                    
                    $.ajax({
                    
                        url: "<?= base_url('admin/juegos/crear_tipo_juego') ?>",
                        type: "POST",
                        data: {'nombre': $("#nombre").val(), 'descripcion': $("#descripcion").val(), 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function (datos){
                            
                            tipo_juego = eval(datos);
                            
                            $("#ficha-c").show();
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                    return false;
                    
                });
                
                
                // CREAR UNA NUEVA CATEGORIA
                $("#ficha-c").on("click", "#crear_categoria", function() {
                    
                    // OBTNEMOS VALORES DE FORMULARIO
                    var categoria = $(this).parent().children("#categoria").val();
                    
                    if (categoria != "")
                    {
                        // ID DE LA CATEGORIA Y NOMBRE DE LA TABLA
                        var id_categoria = categoria.replace(/\s+/g, "_").toLowerCase();
                        
                        $.ajaxSetup({
                            data: {
                                csrf_test_name: $.cookie('csrf_cookie_name')
                                }
                        });
                        
                        $.ajax({
                        
                            url: "<?= base_url('admin/juegos/crear_categoria') ?>",
                            type: "POST",
                            data: {'tipo_juego': tipo_juego, 'categoria': id_categoria, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                            success: function (datos){
                                
                                $("<article id='" + id_categoria + "' class='nueva-categoria'></article>").insertBefore("#datos article:last-child");
                                
                                $("#datos article:nth-last-child(2)").append("<h2>" + categoria + "</h2>");
                                
                                $("#datos article:nth-last-child(2)").append("<div id='campos_" + id_categoria + "'></div>");
                                
                                // FORMULARIO PARA CREAR CAMPO
                                $("#datos article:nth-last-child(2)").append("<form class='formadmin' id='form_campo'><label for='campo'>Crear nuevo campo</label><input type='text' id='campo' />" +
                                "<input type='hidden' value='" + id_categoria + "' id='categoria' /><button id='crear_campo'>Crear</button></form>");
                                
                                // FORMULARIO PARA CREAR SUBCATEGORIA
                                $("#datos article:nth-last-child(2)").append("<form class='formadmin' id='formsubcat'><label for='subcategoria'>Crear nueva subcategoria</label><input type='text' id='subcategoria' />" +
                                "<input type='hidden' value='" + id_categoria + "' id='categoria' /><button id='crear_subcategoria'>Crear</button></form>");
                                
                                $("#datos article:nth-last-child(2)").css({'border': '1px solid black', 'overflow': 'hidden', 'margin-top': '10px', 'margin-bottom': '10px', 'width': '90%', 'margin-left': '5%'});
                                $("#datos article:nth-last-child(2)").corner();
                                
                                alert(datos);
                                
                                $(this).parent().children("#categoria").val("");
                                
                            },
                            error: function (jqXHR, textStatus, errorThrown){
                                
                                alert(textStatus + ' ' + errorThrown);
                                
                            }
                            
                        });
                    }
                    else
                    {
                        alert("Introduzca categoría.");
                    }
                    
                    return false;
                    
                });
                
                
                // CREA NUEVA SUBCATEGORIA
                $("#ficha-c").on('click', "#crear_subcategoria", function() {
                    
                    // OBTENEMOS VALORES DEL FORMULARIO
                    var padre = $(this).parent().parent();
                    var subcategoria = $(this).parent().children("#subcategoria").val();
                    var categoria = $(this).parent().children("#categoria").val();
                    
                    // ID DE LA SUBCATEGORIA
                    var id_subcategoria = subcategoria.replace(/\s+/g, "_");
                    
                    $("<section id='" + id_subcategoria + "' class='nueva-subcategoria'></section>").insertAfter($(this).parent().parent().children("h2"));
                    
                    $("#" + id_subcategoria).append("<h3>" + subcategoria + "</h3>");
                    
                    $("#" + id_subcategoria).append("<div id='campos_" + id_subcategoria + "'></div>");
                    
                    $("#" + id_subcategoria).append("<form class='formadmin'><label for='campo_s'>Crear nuevo campo</label><input type='text' id='campo_s' />" +
                    "<input type='hidden' value='" + id_subcategoria + "' id='subcategoria' /><input type='hidden' value='" + categoria + "' id='categoria' /><button id='crear_campo_s'>Crear</button></form>");
                            
                    $("#" + id_subcategoria).css({'border': '1px solid black', 'overflow': 'hidden', 'margin-top': '10px', 'margin-bottom': '10px', 'width': '90%', 'margin-left': '5%'});
                    $("#" + id_subcategoria).corner();
                    
                    padre.children("#form_campo").hide();
                    padre.children("#campos_" + categoria).hide();
                    
                    return false;
                });
                
                
                // CREA CAMPO SIN SUBCATEGORIA
                $("#ficha-c").on('click', '#crear_campo', function() {
                    
                    var categoria = $(this).parent().children("#categoria").val();
                    var campo = $(this).parent().children("#campo").val();
                    
                    if (campo != "")
                    {
                        var id_campo= campo.replace(/\s+/g, "_");
                        
                        $.ajaxSetup({
                            data: {
                                csrf_test_name: $.cookie('csrf_cookie_name')
                                }
                        });
                        
                        $.ajax({
                        
                            url: "<?= base_url('admin/juegos/crear_campo') ?>",
                            type: "POST",
                            data: {'tipo_juego': tipo_juego, 'categoria': categoria, 'campo': campo, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                            success: function (datos){
                                
                                var res = eval(datos);
                                
                                $(this).parent().parent().children("#campos_" + categoria).append("<div id='" + id_campo + "'>" + campo + "</div>");
                                
                                $("#" + id_campo).css({'display': 'inline-block', 'margin': '5px', 'border': '1px solid black', 'padding': '10px'});
                                $("#" + id_campo).corner();
                                
                                $("#" + id_campo).append("<button class='eliminar_campo' id='x-" + id_campo + "'>X</button>").css('margin-left', '5px');
                                
                                $(this).parent().children("#campo").val("");
                                
                                $(this).parent().parent().children("#formsubcat").hide();
                                
                            },
                            error: function (jqXHR, textStatus, errorThrown){
                                
                                alert(textStatus + ' ' + errorThrown);
                                
                            }
                            
                        });
                    }
                    else
                    {
                        alert("Introduzca campo.");
                    }
                    
                    return false;
                });
                
                
                // CREA CAMPO CON SUBCATEGORIA
                $("#ficha-c").on('click', '#crear_campo_s', function() {
                    
                    var subcategoria = $(this).parent().children("#subcategoria").val();
                    var categoria = $(this).parent().children("#categoria").val();
                    var campo = $(this).parent().children("#campo_s").val();
                    
                    
                    if (campo != "")
                    {
                        var id_campo= campo.replace(/\s+/g, "_");
                        
                        $.ajaxSetup({
                            data: {
                                csrf_test_name: $.cookie('csrf_cookie_name')
                                }
                        });
                        
                        $.ajax({
                        
                            url: "<?= base_url('admin/juegos/crear_campo_sub') ?>",
                            type: "POST",
                            data: {'tipo_juego': tipo_juego, 'categoria': categoria, 'subcategoria': subcategoria, 'campo': campo, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                            success: function (datos){
                                
                                var res = eval(datos);
                                
                                $(this).parent().parent().children("#campos_" + categoria).append("<div id='" + id_campo + "'>" + campo + "</div>");
                                
                                $("#" + id_campo).css({'display': 'inline-block', 'margin': '5px', 'border': '1px solid black', 'padding': '10px'});
                                $("#" + id_campo).corner();
                                
                                $("#" + id_campo).append("<button class='eliminar_campo' id='x-" + id_campo + "'>X</button>").css('margin-left', '5px');
                                
                                $(this).parent().children("#campo").val("");
                                
                                $(this).parent().parent().children("#formsubcat").hide();
                                
                            },
                            error: function (jqXHR, textStatus, errorThrown){
                                
                                alert(textStatus + ' ' + errorThrown);
                                
                            }
                            
                        });
                    }
                    else
                    {
                        alert("Introduzca campo.");
                    }
                    
                    return false;
                });
                
                
                // ELIMINA EL CAMPO SELECCIONADO
                $("#ficha-c").on('click', '.eliminar_campo', function() {
                    
                    var id = $(this).attr("id");
                    
                    var partes = id.split('-');
                    
                    $("#" + partes[1]).remove();
                    
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