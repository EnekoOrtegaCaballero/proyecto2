<?php if(isset($_SESSION['identidad'])) : ?>

<h1>Realizar pedidos23</h1>

<a href="<?=base_url?>?controller=Carrito&action=index">Ver el carrito</a>
<br/>
<h3>Dirección para el envio:</h3>
<div class="form-container">
    <form action="<?=base_url?>/index.php?controller=Pedido&action=add" method="POST">
        <label for="provincia">provincia</label>
        <input type="text" name="provincia" required/>

        <label for="ciudad">ciudad</label>
        <input type="text" name="localidad" required/>

        <label for="direccion">direccion</label>
        <input type="text" name="direccion" required/>

        <input type="submit" value="Confirmar pedido">
    </form>
</div>

<?php else: ?>

<h1>Necesitas iniciar sesión para poder realizar tu pedido</h1>

<?php endif; ?>