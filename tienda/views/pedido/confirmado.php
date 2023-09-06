<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>Tu poedido ha sido guardado con exito, una vez que realices la transferencia
        bancaria con el costo del pedido, será procesado y enviado.
    </p>
    <br>
    <?php if (isset($pedido)) : ?> 
        <h3>Datos del pedido:</h3>
        Número de pedido: <?= $pedido->id ?> <br>
        Total a pagar: $ <?= $pedido->coste ?><br>
        Productos: <br>
    
    <?php endif ?>
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <h1>Tu pedido no se ha confirmado</h1>

<?php endif ?>