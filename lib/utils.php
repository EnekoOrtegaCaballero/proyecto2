<?php

class Utils{

    public static function deleteSession($name){
        if($_SESSION[$name]){
            $_SESSION[$name] = null; 
        }
            return $name;  
    }



    public static function showError ($errors, $campo) {
        $alerta = '';
    
        if(isset($errors[$campo]) && !empty($campo)){
            $alerta = '<div class="alert-red">'.$errors[$campo].'</div>';
        }
    
        return $alerta;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }

    }

    public static function isLoged(){
        if(!isset($_SESSION['identidad'])){
            header("Location:".base_url);
        }else{
            return true;
        }

    }



    public static function showCategorias(){
        require_once 'models/categoria.php';

        $categoria = new Categoria();

        $categorias = $categoria->getAll();

        return $categorias;
    }

    public static function statsCarrito(){
        $stats = array(
            'count' => 0,
            'total' => 0
        );

        if(isset($_SESSION['carrito'])){
            $stats['count'] = count($_SESSION['carrito']);

            foreach($_SESSION['carrito'] as $value){

                $stats['total'] += $value['precio'] * $value['unidades'];

            }

        }

        return $stats;

    }

}


