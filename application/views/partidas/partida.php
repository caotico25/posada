<!DOCTYPE html>
<html lang="ES">
    
    <head>
        <meta charset="UTF-8" />
        <title>La posada del Caos</title>
        
        <script src="<?= base_url('javascript/jquery-1-10-2.js') ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url('javascript/jquery-rol.js') ?>" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet/less" href="<?= base_url('css/responsive.less') ?>" type="text/css" media="screen" />
        <script src="<?= base_url('javascript/less.js') ?>" type="text/javascript" charset="utf-8"></script>
        <script>
            
            $(document).ready(function() {
                
                $(window).load(function() {
                    
                    $(this).mostrar_ficha("#ficha");
                    $(this).mostrar_mesa("#tablero");
                    
                });
                
                $("body").on("click", "#lanzar", function() {
                    
                    $(this).tirar_dados();
                    
                });
                
                $("body").on("click", "#mas", function() {
                    
                    $(this).mod_habilidad();
                    
                });
                
                $("body").on("click", "#menos", function() {
                    
                    $(this).mod_habilidad("menos");
                    
                });
                
            });
            
        </script>
    </head>
    
    <body>
        <div id="contenedor">
            <div id="contenido">
                <section>
                <div id="chat">
                    
                </div>
                <div id="ficha">
                  
                </div>
                <div id="tablero">
                  
                </div>
            </section>
            </div>
        </div>
    </body>
</html>
