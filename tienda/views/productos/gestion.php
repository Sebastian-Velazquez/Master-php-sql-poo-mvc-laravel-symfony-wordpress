<h1>Gestión de prodctos</h1>

<a href="<?= base_url ?>producto/crear" class="button button-small">Crear Producto</a>

<table  border="1">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STACK</th>
    </tr>

    <?php while($pro = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id; ?></td>
            <td><?= $pro->nombre; ?></td>
            <td><?= $pro->precio; ?></td>
            <td><?= $pro->stock; ?></td>
        </tr>
    <?php endwhile; ?>
</table>