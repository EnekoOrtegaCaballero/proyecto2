<?php if(isset($miProducto)) : ?>
    <h1><?= $miProducto->nombre ?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if($miProducto->imagen != null): ?>
                <img src="<?=base_url?>/uploads/images/<?=$promiProductoduct->imagen?>" alt="<?=$miProducto->imagen?>" />
            <?php else: ?>
                <img src="assets/img/camiseta.png" />
            <?php endif;?>
        </div>
        <div class="data">
            <p class="description"><?=$miProducto->descripcion ?></p>
            <p class="price"><?=$miProducto->precio?> €</p>
            <a class="button"  href="<?=base_url?>/index.php?controller=Carrito&action=add&id=<?=$miProducto->id?>">Comprar</a>
        </div>
    </div>
<?php else: ?>
    <h1>El producto no existe</h1>

<?php endif; ?>

