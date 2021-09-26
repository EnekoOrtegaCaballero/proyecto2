<h1>Carrito de la compra</h1>

<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php 
        foreach($carrito as $key => $value) : 
        $producto = $value['producto'];
    ?>
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
            <?= $value['unidades'] ?>
        </td>
        <td>
            <p><?=$value['unidades']; ?></p>
            <div class="updown-unidades">
                <a href="<?=base_url?>/index.php?controller=Carrito&action=removeOne&index=<?=$key?>" class="button button-carrito_add">-</a>
                <a href="<?=base_url?>/index.php?controller=Carrito&action=addOne&index=<?=$key?>" class="button button-carrito_disminuir">+</a>
            </div>
        </td>
        <td>
        <a href="<?=base_url?>/index.php?controller=Carrito&action=delete&index=<?=$key?>" class="button button-carrito_eliminar">Quitar producto</a>
        </td>

    </tr>
    <?php endforeach; ?>
</table>
<br/>


<div class="vaciar-carrito">
    <a href="<?=base_url?>/index.php?controller=Carrito&action=deleteAll" class="button button-edit-eliminar">Vaciar cesta de la compra</a>
</div>
<?php $stats = Utils::statsCarrito();?>
<div class="div-total">
    <h3 class="total">Total: <?=$stats['total'] ?> €</h3>
    <a href="<?=base_url?>/index.php?controller=Pedido&action=index" class="button button-total">Hacer pedido</a>
</div>

<?php else: ?>
    <p>El carrito esta vacio, añade algo</p>
<?php endif; ?>