
<h1>Algunos de nuestros productos</h1>
<?php while($product = $productos->fetch_object()):?>
<div class="product">
    <?php if ($product->imagen != null) {?>
        <img src="<?= base_url ?>/uploads/images/<?= $product->imagen ?>" >
    <?php }else { ?>
        <img src="<?= base_url ?>assets/img/camiseta.png">
    <?php } ?>
    <h2><?= $product->nombre ?></h2>
    <p><?= $product->precio ?></p>
    <a href="#" class="button">Comprar</a>
</div>
<?php endwhile?>

