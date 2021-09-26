<?php

require_once 'models/producto.php';

class CarritoController{


    public function index(){

        if(isset($_SESSION['carrito'])){
            $carrito =  $_SESSION['carrito'];
        }else{
            $carrito = array();
        }
 

        require_once 'views/carrito/index.php';


    }

    public function add(){

        if(isset($_GET['id'])){
            $producto_id = $_GET['id'];
        }else{
            header("Location: ".base_url);
        }


        if(isset($_SESSION['carrito'])){
            $counter = 0;

            foreach($_SESSION['carrito'] as $key=> $value){
                if($value['id_producto'] == $producto_id){
                    $_SESSION['carrito'][$key]['unidades']++;
                    $counter++;
                }


            }
        }
        if(!isset($counter) || $counter == 0){
        //conseguir producto
        $producto = new Producto();
        $producto->setId($producto_id);

        $producto = $producto -> getOne();


        if(is_object($producto)){
            $_SESSION['carrito'][] = array(
                "id_producto" => $producto->id,
                "precio" => $producto->precio,
                "unidades" => 1,
                "producto" => $producto
            );
        }

        }

        header("Location: ".base_url."/index.php?controller=Carrito&action=index");

    }

    public function delete(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header("Location: ".base_url."/index.php?controller=Carrito&action=index");
    }

    public function addOne(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        header("Location: ".base_url."/index.php?controller=Carrito&action=index");
    }

    public function removeOne(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            if($_SESSION['carrito'][$index]['unidades'] > 1){
                $_SESSION['carrito'][$index]['unidades']--;
            }else{
                unset($_SESSION['carrito'][$index]);
            }
        }
        header("Location: ".base_url."/index.php?controller=Carrito&action=index");
    }







    public function deleteAll(){
        unset($_SESSION['carrito']);
        header("Location: ".base_url."/index.php?controller=Carrito&action=index");
    }

}