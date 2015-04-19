<!DOCTYPE html>
<html lang="ES">
    
    <head>
        <meta charset="UTF-8" />
        <title>La posada del Caos</title>
        
        <style type="text/css" media="screen">
            
            body
            {
                background: #e1e1e1;
            }
            
            h3
            {
                width: 100%;
                text-align: center;
                background-image: url("<?= base_url('images/fondo.jpg') ?>");
                color: #FBC187;
            }
            
            form
            {
                margin-top: 10px;
                margin-bottom: 10px;
                width: 100%;
            }
            
            form input
            {
                width: 50%;
                margin-left: 25%;
                text-align:center;
            }
            
            div
            {
                width: 80%;
                margin-left: 10%;
                text-align: center;
            }
            
            div p
            {
                background: red;
            }
            
        </style>
        
        <script type="text/javascript">
            
            function validar()
            {
                var pass = document.getElementById('passwd').value;
                var repass = document.getElementById('re_passwd').value;
                
                if (pass != repass)
                {
                    document.getElementById('errores').innerHTML = "<p>Los campos no coinciden</p>";
                    
                    return false;
                }
                else
                {
                    window.opener.document.getElementById('pass_cambiada').innerHTML = "<p>Contraseña cambiada correctamente</p>";
                    return true;
                }
            }
            
        </script>
        
    </head>
    
    <body>
        <section>
            <h3>INTRODUZCA NUEVA CONTRASEÑA</h3>
            <div id="errores">
                <?= validation_errors() ?>
                
                <?php if (isset($mensaje)): ?>
                    <?= $mensaje ?>
                <?php endif ?>
            </div>
            <?= form_open('', array('class' => 'registro', 'onsubmit' => 'return validar()')) ?>
                <input type="password" id="passwd" name="passwd" placeholder="Contraseña" />
                <input type="password" id="re_passwd" name="re_passwd" placeholder="Repetir" />
                <input type="submit" name="enviar" id="enviar" value="Cambiar" />
            <?= form_close() ?>
        </section>
    </body>
    
</html>
