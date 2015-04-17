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
                
                // LANZA DADOS
                $("body").on("click", "#lanzar", function() {
                    
                    $(this).tirar_dados();
                    
                });
                
                var id_ficha = <?= $id_ficha ?>;
                var id_partida = <?= $id_partida ?>;
                
                // GUARDAR CAMBIOS EN INPUT
                $("#ficha_ajax").on("blur", "input[type!='button']", function() {
                    
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
                        
                        url: "<?= base_url('partidas/fichas/editar') ?>",
                        type: "POST",
                        data: {'tabla': a, 'columna': b, 'valor': c, 'ficha': d, 'partida': e, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function (ficha){
                            
                            $('#ficha_ajax').html(ficha);
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                    
                });
                
                // GUARDAR CAMBIOS EN TEXTAREA
                $("#ficha_ajax").on("blur", "textarea", function() {
                    
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
                        
                        url: "<?= base_url('partidas/fichas/editar') ?>",
                        type: "POST",
                        data: {'tabla': a, 'columna': b, 'valor': c, 'ficha': d, 'partida': e, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function (ficha){
                            
                            $('#ficha_ajax').html(ficha);
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                });
                
                // ENVIA MENSAJE EN CHAT
                $("#mensaje").keyup(function(event) {
                    
                    var msj = $(this).val().trim();
                    
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
                                
                                url: "<?= base_url('partidas/chats/insertar_mensaje') ?>",
                                type: "POST",
                                data: {'mensaje': msj, 'jugador': <?= obtener_id() ?>, 'partida': id_partida, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                                success: function(chat) {
                                    
                                    $('#charla').html(chat);
                                    
                                },
                                error: function (jqXHR, textStatus, errorThrown){
                                    
                                    alert(textStatus + ', ' + errorThrown + ', ' + jqXHR.status);
                                    
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
                
                // CAMBIA FICHA DE PERSONAJE, SOLO PARA ADMIN
                $("#jugadores").change(function() {
                    
                    var ficha = $(this).val();
                    
                    $.ajaxSetup({
                        data: {
                            csrf_test_name: $.cookie('csrf_cookie_name')
                            }
                    });
                    
                    $.ajax({
                        
                        url: "<?= base_url('partidas/fichas/cargar_ficha') ?>",
                        type: "POST",
                        data: {'id_ficha': ficha, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function (ficha){
                            
                            $('#ficha_ajax').html(ficha);
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                });
                
                // FUNCION PARA CERRAR PARTIDA
                $("#cerrar_partida").on("click", function (){
                    
                    $.ajaxSetup({
                        data: {
                            csrf_test_name: $.cookie('csrf_cookie_name')
                            }
                    });
                    
                    $.ajax({
                        
                        url: "<?= base_url('partidas/partidas/cerrar_partida') ?>",
                        type: "POST",
                        data: {'id_partida': id_partida, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function (){
                            
                            window.close();
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                });
                
                // FUNCION PARA DESPLEGAR O GUARDAR SECCIONES DE FICHA
                $.("#ficha_ajax").on("click", "#ocultar", function() {
                    
                    alert("hola");
                        $.(this).next().css('display','block');
                    
                    
                });
                
            });
            
        </script>
    </head>
    
    <body>
        <div id="contenedor-ficha">
            <div id="contenido-ficha">
                <section id="cerrar">
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
                        
                        <div id="lista-jugadores">
                            <label for="jugadores">Selecciona personaje para ver su ficha:</label>
                            <select name="jugadores" id="jugadores">
                                <option>------</option>
                                <?php foreach ($jugadores as $jugador): ?>
                                    <?php if ($jugador['jugador'] != obtener_id()): ?>
                                        <option value="<?= $jugador['ficha_id'] ?>"><?= nombre_personaje($id_partida, $jugador['jugador']) ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
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
