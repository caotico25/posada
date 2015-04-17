<section>
    <article>
        <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $personaje['nombre'] ?>" id="nombre" class="personajes" />
        </div>
        <?php foreach ($otra_info as $info): ?>
            <div>
            <label for="<?= $info['nombre'] ?>"><?= $info['nombre'] ?>:</label>
            <input type="text" name="<?= $info['nombre'] ?>" value="<?= $info['valor'] ?>" id="<?= $info['nombre'] ?>" class="otra_info" />
            </div>
        <?php endforeach ?>
        <div>
        <label for="experiencia">Experiencia:</label>
        <input type="number" name="experiencia" value="<?= $ficha['experiencia'] ?>" id="experiencia" min="0" class="fichas" />
        </div>
    </article>
</section>
<section>
    <?php $categoria = $atributos[0]['categoria'] ?>
    
    <article>
        <h1>ATRIBUTOS</h1>
        <h2><?= $categoria ?></h2>
        
        <?php foreach ($atributos as $atributo): ?>
        
            <?php if ($categoria == $atributo['categoria']): ?>
                <div>
                <label for="<?= $atributo['nombre'] ?>"><?= $atributo['nombre'] ?>:</label>
                <input type="number" name="<?= $atributo['nombre'] ?>" value="<?= $atributo['valor'] ?>" id="<?= $atributo['nombre'] ?>" min="0" class="atributos" />
                </div>
            <?php else: ?>
            
                <?php $categoria = $atributo['categoria'] ?>
                
                <h2><?= $categoria ?></h2>
                    <div>
                    <label for="<?= $atributo['nombre'] ?>"><?= $atributo['nombre'] ?>:</label>
                    <input type="number" name="<?= $atributo['nombre'] ?>" value="<?= $atributo['valor'] ?>" id="<?= $atributo['nombre'] ?>" min="0" class="atributos" />
                    </div>
                    
            <?php endif ?>
        
        <?php endforeach ?>
    
    </article>
    
</section>
<section>
    <?php $categoria = $habilidades[0]['categoria'] ?>
    
    <article>
        <h1>HABILIDADES</h1>
        <h2><?= $categoria ?></h2>
        
        <?php foreach ($habilidades as $habilidad): ?>
        
            <?php if ($categoria == $habilidad['categoria']): ?>
                <div>
                <label for="<?= $habilidad['nombre'] ?>"><?= $habilidad['nombre'] ?>:</label>
                <input type="number" name="<?= $habilidad['nombre'] ?>" value="<?= $habilidad['valor'] ?>" id="<?= $habilidad['nombre'] ?>" min="0" class="habilidades" />
                </div>
            <?php else: ?>
            
                <?php $categoria = $habilidad['categoria'] ?>
                
                <h2><?= $categoria ?></h2>
                    <div>
                    <label for="<?= $habilidad['nombre'] ?>"><?= $habilidad['nombre'] ?>:</label>
                    <input type="number" name="<?= $habilidad['nombre'] ?>" value="<?= $habilidad['valor'] ?>" id="<?= $habilidad['nombre'] ?>" min="0" class="habilidades" />
                    </div>
            <?php endif ?>
        
        <?php endforeach ?>
    
    </article>
    
</section>
<section>
    <?php $categoria = $ventajas[0]['categoria'] ?>
    
    <article>
        <h1>VENTAJAS</h1>
        <h2><?= $categoria ?></h2>
        
        <?php foreach ($ventajas as $ventaja): ?>
        
            <?php if ($categoria == $ventaja['categoria']): ?>
                
                <?php if ($ventaja['nombre'] != ''): ?>
                    <div>
                    <label for="<?= $ventaja['nombre'] ?>"><?= $ventaja['nombre'] ?>:</label>
                    <input type="number" name="<?= $ventaja['nombre'] ?>" value="<?= $ventaja['valor'] ?>" id="<?= $ventaja['nombre'] ?>" min="0" class="ventajas" />
                    </div>
                <?php endif ?>
            <?php else: ?>
                <div>
                <label for="anadir">Añadir</label>
                <input type="text" name="anadir" value="" id="anadir"/>
                </div>
                <?php $categoria = $ventaja['categoria'] ?>
                
                <h2><?= $categoria ?></h2>
                    
                    <?php if ($ventaja['nombre'] != ''): ?>
                    
                        <div>
                        <label for="<?= $ventaja['nombre'] ?>"><?= $ventaja['nombre'] ?>:</label>
                        <input type="number" name="<?= $ventaja['nombre'] ?>" value="<?= $ventaja['valor'] ?>" id="<?= $ventaja['nombre'] ?>" min="0" class="ventajas" />
                        </div>
                
                    <?php endif ?>
                    
            <?php endif ?>
        
        <?php endforeach ?>
    
    </article>
    
</section>
<section>
    <?php $categoria = $otros_parametros[0]['categoria'] ?>
    
    <article>
        <h1>OTROS</h1>
        <h2><?= $categoria ?></h2>
        
        <?php foreach ($otros_parametros as $otro_parametro): ?>
        
            <?php if ($categoria == $otro_parametro['categoria']): ?>
                
                <?php if ($otro_parametro['nombre'] != ''): ?>
                    <div>
                    <label for="<?= $otro_parametro['nombre'] ?>"><?= $otro_parametro['nombre'] ?>:</label>
                    <input type="number" name="<?= $otro_parametro['nombre'] ?>" value="<?= $otro_parametro['valor'] ?>" id="<?= $otro_parametro['nombre'] ?>" min="0" class="otros_parametros" />
                    </div>
                <?php endif ?>
                
            <?php else: ?>
                <div>
                <label for="anadir">Añadir</label>
                <input type="text" name="anadir" value="" id="anadir"/>
                </div>
                <?php $categoria = $otro_parametro['categoria'] ?>
                
                <h2><?= $categoria ?></h2>
                    
                    <?php if ($otro_parametro['nombre'] != ''): ?>
                        <div>
                        <label for="<?= $otro_parametro['nombre'] ?>"><?= $otro_parametro['nombre'] ?>:</label>
                        <input type="number" name="<?= $otro_parametro['nombre'] ?>" value="<?= $otro_parametro['valor'] ?>" id="<?= $otro_parametro['nombre'] ?>" min="0" class="otros_parametros" />
                        </div>
                    <?php endif ?>
                    
            <?php endif ?>
        
        <?php endforeach ?>
    
    </article>
    
</section>
<section>
    <article>
        <h1>INVENTARIO</h1>
        
        <?php foreach ($inventario as $objeto): ?>
            <article>
                <label for="cantidad"><?= $objeto['nombre'] ?>:</label>
                <input type="number" name="cantidad" value="<?= $objeto['valor'] ?>" id="cantidad" class="inventarios" />
            </article>
        <?php endforeach ?>
        
        <!-- OPCION DE AÑADIR OBJETO AL INVENTARIO -->
    </article>
</section>
<section>
    <article>
        <h1>ANOTACIONES</h1>
        
        <label for="anotaciones" style="display: none">Anotaciones:</label>
        <textarea name="anotaciones" id="anotaciones" rows="8" cols="40" class="fichas" ><?= $ficha['anotaciones'] ?></textarea>
    </article>
</section>