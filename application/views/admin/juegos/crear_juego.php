<section class="admin">
    <h2>CREAR NUEVO TIPO DE JUEGO</h2>
    <article>
        <!-- FORMULARIO PARA CREAR NUEVO JUEGO -->
        <form action="" method="post" accept-charset="utf-8" class="formadmin">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="" id="nombre"/>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="8" cols="40"></textarea>
            <button id="crear_juego">Continuar</button>
        </form>
    </article>
</section>
<div id="ficha">
    <section class="admin" style="display: none;" id="datos">
        
        <article style="display: none;">
            <!-- SI SE CREA CATEGORIA, AQUI SU NOMBRE -->
            <h1></h1>
            <div class="campos">
                <!-- // PIZARRITAAAA -->
            </div>
            <!-- FORMULARIO PARA CREAR CAMPOS SIN SUBCATEGORIA -->
            <form class="formadmin" method="post" accept-charset="utf-8">
                <label for="campo">Crear nuevo campo</label>
                <input type="text" id="campo" />
                <input type="hidden" name="categoria" value="" id="categoria"/>
                <button id="crear_campo">Crear</button>
            </form>
        </article>
        
        <!-- FORMULARIO PARA CREAR NUEVA CATEGORIA -->
        <form class="formadmin" method="post" accept-charset="utf-8" id="form_crear_categoria">
            <label for="categoria">Crear nueva categoria</label>
            <input type="text" id="categoria" />
            <button id="crear_categoria">Crear</button>
        </form>
    </section>
</div>