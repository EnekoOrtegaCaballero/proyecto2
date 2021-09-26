    <?php if(isset($editar) && is_object($miProducto)) : ?>
        <h1>Editar producto <?= $miProducto->nombre ?> </h1>
        <?php $url_action = base_url."/index.php?controller=Producto&action=save&id=".$miProducto->id; ?>

    <?php else: ?>
        <h1>Crear nuevo productos</h1>
        <?php $url_action = base_url."/index.php?controller=Producto&action=save" ?>
        <?php endif; ?>

<div class="form-container">

    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($miProducto) && is_object($miProducto) ? $miProducto->nombre : '' ?>">

        <label for="descripcion">descripcion</label>
        <textarea name="descripcion"><?=isset($miProducto) && is_object($miProducto) ? $miProducto->descripcion : '' ?></textarea>

        <label for="precio">precio</label>
        <input type="text" name="precio" value="<?=isset($miProducto) && is_object($miProducto) ? $miProducto->precio : '' ?>">

        <label for="stock">stock</label>
        <input type="number" name="stock" value="<?=isset($miProducto) && is_object($miProducto) ? $miProducto->stock : '' ?>">

        <label for="categoria">categoria</label>
        <select name="categoria">
            <?php $categorias = Utils::showCategorias();
            while($cat = $categorias->fetch_object()) : ?>
                <option value="<?=$cat->id?>" <?=isset($miProducto) && is_object($miProducto) 
                && $cat->id == $miProducto->categoria_id ? 'selected' : '' ?>><?=$cat->nombre?></option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen:</label>
        <?php if(isset($miProducto) && is_object($miProducto) && !empty($miProducto->imagen)) : ?>
            <img class="miniatura" src="<?=base_url?>/uploads/images/<?=$miProducto->imagen?>" alt="imagen"></img>
        <?php endif; ?>
        <input type="file" name="imagen"/> 

        <input type="submit" value="guardar"/>


    </form>
</div>