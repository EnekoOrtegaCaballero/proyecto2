<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>

<h1>Tu pedido se ha confirmado</h1>
<p>Tu pedido ha sido guardado con exito, una vez realice el pago será enviado. </p>
<br/>
<?php if(isset($pedido)) : ?>

<h3>Datos del pedido: </h3>

<p>

Numero de pedido: <?= $pedido->id ?> <br/>   
Total a pagar: <?= $pedido->coste ?> <br/> 
</p>  
Productos:
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>

<?php while($producto = $todosProductos->fetch_object()) : ?>

    <tr>
        <td>
        <?php if($producto->imagen != null): ?>
            <img class="img_carrito" src="<?=base_url?>/uploads/images/<?=$producto->imagen?>" alt="<?=$producto->imagen?>" />
        <?php else: ?>
            <img class="img_carrito" src="assets/img/camiseta.png" />
        <?php endif;?>
        </td>
        <td>
            <a href="<?=base_url?>/index.php?controller=Producto&action=ver&id=<?=$producto->id?>"><?= $producto -> nombre ?></a>
        </td>
        <td>
            <?= $producto -> precio ?>
        </td>
        <td>
            <?= $producto->unidades ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>



<?php endif; ?>

<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
<h1>Tu pedido no ha podido procesarse.</h1>
<?php endif; ?>