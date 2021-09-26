

<h1>Registrarse</h1>

<?php 
    if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
            <strong class="alert-green">Registro completado con exito.</strong>
        <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
            <strong class="alert-red">Registro fallido.</strong>
        <?php endif;?>



<form action="<?=base_url?>/index.php?controller=Usuario&action=save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>
    <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'nombre'): '' ; ?>


    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required/>
    <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'apellidos'): '' ; ?>



    <label for="email">email</label>
    <input type="text" name="email" required/>
    <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'email'): '' ; ?>



    <label for="password">Contraseña</label>
    <input type="text" name="password" required/>
    <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'password'): '' ; ?>



    <input type="submit" value="Registrarse"/>
    <?php 
    if(isset($_SESSION['register'])){
        Utils::deleteSession('register');
    }; 
        
    if(isset($_SESSION['errors'])){
        Utils::deleteSession('errors');
    };    
        
    ?>

</form>