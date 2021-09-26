<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class CategoriaController{

    public function index(){
        Utils::isAdmin();

        $categoria = new Categoria();

        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function ver(){

        if(isset($_GET['id'])){

            //conseguir categoria 
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
        
            $categoria = $categoria->getOne();

            //teniendo ya el id y nombre buscamos todos los productos gracias a que hemos requerido el modelo de producto

            $producto = new Producto();
            $producto -> setCategoria_id($id);

            $productos = $producto->getAllCategory();
        }

        require_once 'views/categoria/ver.php';
    }

    public function crear(){
        Utils::isAdmin();

        require_once 'views/categoria/crear.php';

    }

    public function save(){
        
        
        
        var_dump($_POST);
        die();

        Utils::isAdmin();

        if(isset($_POST['nombre'])){

            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);

            $save = $categoria->save();


        }

        header("Location:".base_url."?controller=Categoria&action=index");
    }

}