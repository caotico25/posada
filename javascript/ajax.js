        $(document).ready(function() {
                
                $(window).load(function() {
                    
                    $(this).mostrar_mesa("#tablero");
                    
                });
                
                $("body").on("click", "#lanzar", function() {
                    
                    $(this).tirar_dados();
                    
                });
                
                var id_ficha = <?= $id_ficha ?>;
                var id_partida = <?= $id_partida ?>;
                
                $("#ficha_ajax input[type!='button']").blur(function() {
                    
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
                            
                            //$('#ficha_ajax').html(ficha);
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                    
                });
                
                $("#ficha_ajax textarea").blur(function() {
                    
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
                        data: {'tabla': a, 'columna': b, 'valor': c, 'ficha': d, 'partida': e 'csrf_test_name': $.cookie('csrf_cookie_name')},
                        success: function (ficha){
                            
                            //$('#ficha_ajax').html(ficha);
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            
                            alert(textStatus + ' ' + errorThrown);
                            
                        }
                        
                    });
                    
                });
                
                $("#chat textarea").keyup(function(event) {
                    
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
                                
                                url: "http://localhost/proyecto/index.php/partidas/chats/insertar_mensaje",
                                type: "POST",
                                data: {'mensaje': msj, 'jugador': <?= obtener_id() ?>, 'partida': id_partida, 'csrf_test_name': $.cookie('csrf_cookie_name')},
                                success: function (chat){
                                    
                                    $('#charla').html(chat);
                                    
                                },
                                error: function (jqXHR, textStatus, errorThrown){
                                    
                                    alert(textStatus + ' ' + errorThrown);
                                    
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
                
                $("#jugadores").change(function() {
                    
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
                    
                });
                
                $("#cerrar_partida").on("click", function (){
                    
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
                    
                });
                
            });