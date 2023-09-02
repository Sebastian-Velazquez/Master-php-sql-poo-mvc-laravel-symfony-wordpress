<?php if( isset($edit) && isset($pro) && is_object($pro) ) : ?>
    <h1>Editar producto <?= $pro->nombre ?> </h1>
    <?php $url_action  = base_url. "producto/edit&id=".$pro->id; ?>
<?php else : ?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action  = base_url. "producto/save"; ?>
<?php endif ?>

<div class="form_container"></div>
    <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data">
        <label for="">Nombre</label>
        <input type="text" name="nombre" id=""
            value="<?= isset($pro) && is_object($pro) ? $pro->nombre : "" ?>" >

        <label for="">Descripcion</label>
        <textarea name="descripcion" id="" cols="30" rows="5">
            <?= isset($pro) && is_object($pro) ? $pro->nombre : "" ?> 
        </textarea>

        <label for="">Precio</label>
        <input type="number" name="precio" id=""
        value="<?= isset($pro) && is_object($pro) ? $pro->precio : "" ?>" >

        <label for="">Stock</label>
        <input type="number" name="stock" id=""
        value="<?= isset($pro) && is_object($pro) ? $pro->stock : "" ?>" >

        <label for="">Categoria</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria">
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <option value="<?= $cat->id ?>" <?= isset($pro) && $cat->id == $pro->categoria_id && is_object($pro) ? "selected" : "" ?> >
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile ?>
        </select>

        <label for="">Imagen</label>
        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)) : ?>
            <img src="<?= base_url ?>uploads/<?= $pro->imagen ?>" alt="">
           
        <?php endif ?>
        <input type="file" name="imagen" id="">

        <input type="submit" value="Guardar">
    </form>
</div>