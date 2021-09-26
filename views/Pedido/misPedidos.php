<?php if (isset($gestion)): ?>
    <h1>Todos los Pedidos</h1> 
<?php else:?>
<h1>Mis Pedidos</h1>
<?php endif; ?>

<table>
    <tr>
        <th>Nº pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php 
       while($ped = $pedidos->fetch_object()) :
    ?>

    <tr>
        <td>
            <a href="<?=base_url?>/index.php?controller=Pedido&action=detalle&id=<?=$ped->id?>"><?= $ped->id ?></a>
        </td>
        <td>
        <?= $ped-> coste ?>
        </td>
        <td>
        <?= $ped->fecha ?>
        </td>
        <td>
        <?= $ped->estado ?>
        </td>

    </tr>
    <?php endwhile; ?>
</table>
<br/>

<?php $stats = Utils::statsCarrito();?>
<div class="div-total">
    <h3 class="total">Total: <?=$stats['total'] ?> €</h3>
</div>
<a href="<?=base_url?>/index.php?controller=Pedido&action=index" class="button">Hacer pedido</a>