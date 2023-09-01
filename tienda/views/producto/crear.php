<h1>Crear nuevos productos</h1>

<div class="form_container"></div>
    <form action="<?= base_url ?>producto/save" method="post" enctype="multipart/form-data">
        <label for="">Nombre</label>
        <input type="text" name="nombre" id="">

        <label for="">Descripcion</label>
        <textarea name="descripcion" id="" cols="30" rows="5"></textarea>

        <label for="">Precio</label>
        <input type="number" name="precio" id="">

        <label for="">Stock</label>
        <input type="number" name="stock" id="">

        <label for="">Categoria</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria">
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <option value="<?= $cat->id ?>">
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile ?>
        </select>

        <label for="">Imagen</label>
        <input type="file" name="imagen" id="">

        <input type="submit" value="Guardar">
    </form>
</div>