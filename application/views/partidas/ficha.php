<?php foreach ($tablas as $tabla): ?>

    <?php $campos = obtener_campos($tabla['nombre'], $ficha_base) ?>
    
    <article>
        <h1 id="ocultar"><?= $tabla['nombre'] ?></h1>
        <div>
            <?php if ($campos[0]['subcategoria'] == ""): ?>
                <?php foreach ($campos as $campo): ?>
                    <div>
                        <label for="<?= $campo['id'] ?>"><?= $campo['campo'] ?>:</label>
                        <input type="text" name="<?= $campo['id'] ?>" value="<?= $atributo['valor'] ?>" id="<?= $campo['id'] ?>" min="0" class="atributos" />
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <?php $subcategoria = $campos[0]['subcategoria'] ?>
                <h2><?= $subcategoria ?></h2>
                <?php foreach ($campos as $campo): ?>
                    <?php if ($campo['subcategoria'] == $subcategoria): ?>
                        <div>
                            <label for="<?= $campo['id'] ?>"><?= $campo['campo'] ?>:</label>
                            <input type="text" name="<?= $campo['id'] ?>" value="<?= $atributo['valor'] ?>" id="<?= $campo['id'] ?>" min="0" class="atributos" />
                        </div>
                    <?php else: ?>
                        <?php $subcategoria = $campo['subcategoria'] ?>
                        <h2><?= $subcategoria ?></h2>
                        <div>
                            <label for="<?= $campo['id'] ?>"><?= $campo['campo'] ?>:</label>
                            <input type="text" name="<?= $campo['id'] ?>" value="<?= $atributo['valor'] ?>" id="<?= $campo['id'] ?>" min="0" class="atributos" />
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </article>

<?php endforeach ?>

<section>
    <article>
        <h1 id="ocultar">INVENTARIO</h1>
        <div id="ocultado">
        <?php foreach ($inventario as $objeto): ?>
            <article>
                <label for="cantidad"><?= $objeto['nombre'] ?>:</label>
                <input type="number" name="cantidad" value="<?= $objeto['valor'] ?>" id="cantidad" class="inventarios" />
            </article>
        <?php endforeach ?>
        <div>
        <label for="anadir">Añadir</label>
        <input type="text" name="anadir" value="" id="anadir"/>
        </div>
        </div>
        <!-- OPCION DE AÑADIR OBJETO AL INVENTARIO -->
    </article>
</section>
<section>
    <article>
        <h1 id="no-ocultar">ANOTACIONES</h1>
        <div id="no-ocultado">
        <label for="anotaciones" style="display: none">Anotaciones:</label>
        <textarea name="anotaciones" id="anotaciones" rows="8" cols="40" class="fichas" ><?= $ficha['anotaciones'] ?></textarea>
        </div>
    </article>
</section>