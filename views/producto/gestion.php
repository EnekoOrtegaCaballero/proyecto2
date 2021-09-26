<h1>Gestión de productos</h1>


<a href="<?=base_url?>/index.php?controller=Producto&action=crear" class="button button-small">
    Crear producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alert-green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') :  ?>
    <strong class="alert-red">El producto no se ha creado correctamente</strong>
<?php endif; ?>
<?php 
    if(isset($_SESSION['producto'])){
        Utils::deleteSession('producto');
    }
 ?>


<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert-green">El producto se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') :  ?>
    <strong class="alert-red">El producto no se ha borrado correctamente</strong>
<?php endif; ?>
<?php 
    if(isset($_SESSION['delete'])){
        Utils::deleteSession('delete');
    }
 ?>


<table>
    <tr>
        <th>ID</th>
        <th>nombre</th>
        <th>precio</th>
        <th>stock</th>
        <th>Acciones</th>

    </tr>

<?php while($prod = $productos->fetch_object()): ?>
    <tr> 
        <td><?= $prod->id; ?></td>
        <td><?= $prod->nombre; ?></td>
        <td><?= $prod->precio; ?></td>
        <td><?= $prod->stock; ?></td>
        <td>
            <a class="button-edit" href="<?=base_url?>/index.php?controller=Producto&action=editar&id=<?=$prod->id?>">editar</a>
            <a class="button-edit button-edit-eliminar" href="<?=base_url?>/index.php?controller=Producto&action=eliminar&id=<?=$prod->id?>">Eliminar</a>
        </td>
    </tr>
<?php endwhile; ?>

</table>