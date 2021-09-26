<?php
require_once 'models/pedido.php';

class PedidoController{

    public function index(){

        require_once 'views/Pedido/index.php';


    }

    public function add(){

        if(isset($_SESSION['identidad'])){

            $usuario_id = $_SESSION['identidad']->id;

            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];
            
            //guardar datos en db

            if($provincia && $localidad && $direccion){
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                $saveLinea = $pedido->saveLinea();

                if($save && $saveLinea){
                    $_SESSION['pedido'] = "complete";
                }else{
                    $_SESSION['pedido'] = "failed";
                }
            }else{
                $_SESSION['pedido'] = "failed";
            }
            header("Location: ".base_url."/index.php?controller=Pedido&action=confirmado");



        }else{
            //redirigir a index
            header("Location: ".base_url);
        }

    }

    public function confirmado(){
    if(isset($_SESSION['identidad'])){

        $identidad = $_SESSION['identidad'];
        $pedido = new Pedido();
        $pedido->setUsuario_id($identidad->id);

        $pedido = $pedido->getOneByUser();

        $pedidoProductos = new Pedido();

        $todosProductos = $pedidoProductos->getProductosPedido($pedido->id);
    }
        require_once 'views/Pedido/confirmado.php';
    }

    public function misPedidos(){

        Utils::isLoged();
        
        $pedido = new Pedido();
        $usuario_id = $_SESSION['identidad']->id;

        $pedido->setUsuario_id($usuario_id);

        $pedidos = $pedido->getAllByUser();


        require_once 'views/Pedido/misPedidos.php';
    }

    public function gestion(){
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $usuario_id = $_SESSION['identidad']->id;

        $pedido->setUsuario_id($usuario_id);

        $pedidos = $pedido->getAll();


        require_once 'views/Pedido/misPedidos.php';

    }

    public function detalle(){

        Utils::isLoged();

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //sacar el pedido

            $pedido = new Pedido();
            $pedido->setId($id);
    
            $pedido = $pedido->getOne();
    
            $pedidoProductos = new Pedido();
    
            $todosProductos = $pedidoProductos->getProductosPedido($id);

            require_once 'views/Pedido/detalle.php';

        }else{
            header("Location: ".base_url);

        }
    }

    public function estado(){
        Utils::isAdmin();

        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            $pedido = new Pedido();
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            $pedido->setId($id);
            $pedido->setEstado($estado);

            $pedido->updateOne();

            header("Location:".base_url."/index.php?controller=Pedido&action=detalle&id=".$id."");
        }else{
            header("Location:".base_url);
        }


    }
}