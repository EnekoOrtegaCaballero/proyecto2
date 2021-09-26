
        <!-- BARRA LATERAL LOGIN -->
        <div id="content">
            <aside id="lateral">

                <div id="carrito" class="block-aside">
                    <h3>Mi carrito</h3>
                    <ul>
                        <?php $stats = Utils::statsCarrito();?>
                        <li>Productos (<?= $stats['count']?>)</li>
                        <li>Total: <?=$stats['total'] ?> €</li>
                        <li><a href="<?=base_url?>?controller=Carrito&action=index">Ver el carrito</a></li>
                    </ul>
                </div>




                <div id="login" class="block-aside">


                    <?php if(!isset($_SESSION['identidad'])): ?>
                    <h3>Entrar a la web</h3>
                    <form action="<?=base_url?>/index.php?controller=Usuario&action=login" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password">
                        <input type="submit" value="Enviar">
                    </form>


                    <?php else: ?>
                        <h3><?=$_SESSION['identidad']->nombre?> <?=$_SESSION['identidad']->apellidos?> </h3>
                    <?php endif; ?>

                    <ul>
                    <?php if(isset($_SESSION['admin'])): ?>
                        <li>                    
                            <a href="<?=base_url?>?controller=Pedido&action=misPedidos">Gestionar pedidos</a>
                        </li>
                        <li>                    
                            <a href="<?=base_url?>?controller=Categoria&action=crear">Gestionar categorias</a>
                        </li>
                        <li>                    
                            <a href="<?=base_url?>?controller=Producto&action=gestion">Gestionar productos</a>
                        </li>
                    <?php endif; ?>
                
                    <?php if(isset($_SESSION['identidad'])): ?>
                        <li>                    
                            <a href="<?=base_url?>?controller=Pedido&action=misPedidos">Mis pedidos</a>
                        </li>
                        <li>                    
                            <a href="<?=base_url?>?controller=Usuario&action=logout">Cerrar sesion</a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?=base_url?>?controller=Usuario&action=registro">Registrate</a>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </aside>
            <main>