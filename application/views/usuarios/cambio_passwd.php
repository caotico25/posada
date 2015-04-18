<!DOCTYPE html>
<html lang="ES">
    
    <head>
        <meta charset="UTF-8" />
        <title>La posada del Caos</title>
        <script type="text/javascript" charset="utf-8">
            h3
            {
                width: 100%;
                text-align: center;
                background-image: url("../images/fondo.jpg");
                color: #FBC187;
            }
            
            form
            {
                margin-top: 10px;
                margin-bottom: 10px;
                width: 100%;
            }
        </script>
    </head>
    
    <body>
        <section>
            <h3>INTRODUZCA NUEVA CONTRASEÑA</h3>
            <?= form_open('', array('class' => 'registro')) ?>
                <input type="password" id="passwd" name="passwd" placeholder="Contraseña" />
                <input type="password" id="re_passwd" name="re_passwd" placeholder="Repetir" />
                <input type="submit" name="enviar" id="enviar" value="Cambiar" />
            <?= form_close() ?>
        </section>
    </body>
    
</html>
