<h1>Detalle del pedido Nº <?=$id?></h1>

<?php if(isset($_SESSION['admin'])): ?>
    <h3>Cambiar estado del pedido</h3>
    <form action="<?=base_url?>/index.php?controller=Pedido&action=estado" method="POST">
        <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">

        <select name="estado" id="">
            <option value="ok" <?=$pedido->estado == "ok" ? 'selected' : ''?>>ok</option>
            <option value="preparacion" <?=$pedido->estado == "preparacion" ? 'selected' : ''?>>En preparacion</option>
            <option value="enviando" <?=$pedido->estado == "enviando" ? 'selected' : ''?>>enviando</option>
            <option value="recibido" <?=$pedido->estado == "recibido" ? 'selected' : ''?>>Recibido</option>
            <input type="submit" value="Cambiar estado">
        </select>
    </form>
<?php endif; ?>
<br/>
<h2>Datos del pedido:</h2>
<p>Estado: <?=$pedido->estado?></p>
<p>Provincia: <?= $pedido->provincia ?> </p> <br/>
<p>Ciudad: <?= $pedido->localidad ?> </p> <br/>
<p>Direccion: <?= $pedido->direccion ?> </p> <br/>
<br/>



Numero de pedido: <?= $pedido->id ?> <br/>   
Total a pagar: <?= $pedido->coste ?> <br/> 



<?php if(isset($pedido)) : ?>
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