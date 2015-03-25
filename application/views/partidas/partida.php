<!DOCTYPE html>
<html lang="ES">
    
    <head>
        <meta charset="UTF-8" />
        <title>La posada del Caos</title>
        
        <script src="<?= base_url('javascript/jquery-1-10-2.js') ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url('javascript/jquery-rol.js') ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url('javascript/jquery.cookie.js') ?>" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet/less" href="<?= base_url('css/responsive.less') ?>" type="text/css" media="screen" />
        <script src="<?= base_url('javascript/less.js') ?>" type="text/javascript" charset="utf-8"></script>
        <script>
        
            
                    $(document).ready(function() {
                
                $(window).load(function() {
                    
                    $(this).mostrar_mesa("#tablero");
                    
                });
                
                $("body").on("click", "#lanzar", function() {
                    
                    $(this).tirar_dados();
                    
                });
                
                var id_ficha = <?= $id_ficha ?>;
                var id_partida = <?= $id_partida ?>;
                
                /*$("#ficha_ajax input[type!='button']").blur(function() {
                    
                    var a = $(this).attr("class");
                    var b = $(this).attr("name");
                    var c = $(this).val();
                    var d = id_ficha;
                    var e = id_partida;
                    
                    $.ajaxSetup({
                        data: {
                            csrf_test_name: $.cookie('csrf_cookie_name')
                            }
                    });
                    
                    $.ajax({
                        
                        url: "http://localhost/proyecto/index.php/partidas/fichas/editar",
                        type: "POST",
                        data: {'tabla': a, 'columna': b, 'valor': c, 'ficha': d, 'partida': e, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function (ficha){
                            
                            $('#ficha_ajax').html(ficha);
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                    
                });*/
                
                /*$("#ficha_ajax textarea").blur(function() {
                    
                    var a = $(this).attr("class");
                    var b = $(this).attr("name");
                    var c = $(this).val();
                    var d = id_ficha;
                    var e = id_partida;
                    
                    $.ajaxSetup({
                        data: {
                            csrf_test_name: $.cookie('csrf_cookie_name')
                            }
                    });
                    
                    $.ajax({
                        
                        url: "http://localhost/proyecto/index.php/partidas/fichas/editar",
                        type: "POST",
                        data: {'tabla': a, 'columna': b, 'valor': c, 'ficha': d, 'partida': e, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function (ficha){
                            
                            $('#ficha_ajax').html(ficha);
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                });*/
                
                $("#mensaje").keyup(function(event) {
                    
                    var msj = $(this).val().trim();
                    
                    alert(id_partida);
                    
                    if (msj != '')
                    {
                        if (event.keyCode === 13)
                        {
                            
                            $.ajaxSetup({
                                data: {
                                    csrf_test_name: $.cookie('csrf_cookie_name')
                                    }
                            });
                            
                            $.ajax({
                                
                                url: "<?= base_url('chats/insertar_mensaje') ?>",
                                type: "POST",
                                data: {'mensaje': msj, 'jugador': <?= obtener_id() ?>, 'partida': id_partida, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                                success: function(chat) {
                                    
                                    $('#charla').html(chat);
                                    
                                },
                                error: function (jqXHR, textStatus, errorThrown){
                                    
                                    alert(textStatus + ' ¿HOLA? ' + errorThrown + ' ' + jqXHR.status);
                                    
                                }
                                
                            });
                            
                            $(this).val('');
                        }
                    }
                    else
                    {
                        $(this).val('');
                    }
                    
                });
                
                /*$("#jugadores").change(function() {
                    
                    var ficha = $(this).val();
                    
                    $.ajaxSetup({
                        data: {
                            csrf_test_name: $.cookie('csrf_cookie_name')
                            }
                    });
                    
                    $.ajax({
                        
                        url: "http://localhost/proyecto/index.php/partidas/fichas/cargar_ficha",
                        type: "POST",
                        data: {'id_ficha': ficha, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function (ficha){
                            
                            $('#ficha_ajax').html(ficha);
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                });*/
                
               /* $("#cerrar_partida").on("click", function (){
                    
                    $.ajaxSetup({
                        data: {
                            csrf_test_name: $.cookie('csrf_cookie_name')
                            }
                    });
                    
                    $.ajax({
                        
                        url: "http://localhost/proyecto/index.php/partidas/partidas/cerrar_partida",
                        type: "POST",
                        data: {'id_partida': id_partida, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function (){
                            
                            window.close();
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                });*/
                
            });
            
        </script>
    </head>
    
    <body>
        <div id="contenedor">
            <div id="contenido">
                <section>
                    <button id="cerrar_partida">Cerrar partida</button>
                </section>
                <section>
                <div id="chat" name="chat" style="border: 1px solid black">
                    <div id="charla" style="border: 1px solid black; height: 300px; overflow: scroll">
                        
                        <?= $chat ?>
                        
                    </div>
                    <textarea name="mensaje" id="mensaje" rows="2" cols="40" class="chat"></textarea>
                </div>
                <div id="tablero" name="tablero">
                  
                </div>
                <div id="ficha">
                    <?php if (es_master(obtener_id(), $id_partida)): ?>
                        <?php $jugadores = obtener_jugadores($id_partida) ?>
                        <label for="jugadores">Selecciona personaje para ver su ficha:</label>
                        <select name="jugadores" id="jugadores">
                            <option>------</option>
                            <?php foreach ($jugadores as $jugador): ?>
                                <?php if ($jugador['jugador'] != obtener_id()): ?>
                                    <option value="<?= $jugador['ficha_id'] ?>"><?= nombre_personaje($id_partida, $jugador['jugador']) ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                        
                    <?php endif ?>
                    <div id="ficha_ajax">
                        <?= $ficha ?>
                    </div>
                </div>
                
            </section>
            
            </div>
        </div>
    </body>
</html>
