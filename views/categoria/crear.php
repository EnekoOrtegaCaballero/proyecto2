<h1>Crear nueva categoria</h1>

<form action="<?=base_url?>/index.php?controller=Categoria&action=save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>

    <input type="submit" name="save"/>

</form>