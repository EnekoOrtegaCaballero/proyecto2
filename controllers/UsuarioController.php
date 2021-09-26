<?php

require_once 'models/usuario.php';

class UsuarioController
{
    public function index()
    {
        echo "Controlador de Usuario, accion index";
    }


    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']  : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos']  : false;
            $email = isset($_POST['email']) ? $_POST['email']  : false;
            $password = isset($_POST['password']) ? $_POST['password']  : false;


            $errors = array();

            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                $nombreOk = true;
            } else {
                $nombreOk = false;
                $errors['nombre'] = "El nombre no es válido";
            }
            
            if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
                $apellidosOk = true;
            } else {
                $apellidosOk = false;
                $errors['apellidos'] = "El nombre no es válido";
            }

            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailOk = true;
            } else {
                $emailOk = false;
                $errors['email'] = "El email no es válido";
            }

            if (strlen($password)>7
            && strlen($password)<21
            && preg_match('`[A-Z]`', $password)
            && preg_match('`[a-z]`', $password)
            && preg_match('`[0-9]`', $password)
            ) {
                $passwordOk= true;
            } else {
                $passwordOk = false;
                $errors['password'] = "La contraseña debe tener entre 8 y 20 caracteres, al menos una mayusucula, una misnicula y un numero";
            }

            $_SESSION['errors'] = $errors;

            if ($nombreOk && $apellidosOk && $emailOk && $passwordOk) {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $save = $usuario->save();
    
                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url."/?controller=usuario&action=registro");
    }

    public function login(){
     
        if(isset($_POST)){
            //identificar al usuario


            //consulta a la base de datos
            $usuario = new Usuario();
            $identidad = $usuario->login($_POST['email'], $_POST['password']);


            if($identidad && is_object($identidad)){
                $_SESSION['identidad'] = $identidad;

                if($identidad->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['errorLogin'] = 'Identificación fallida';
            }
            
            //crear una sesión

        }
       
        header("Location:".base_url);
    }

    public function logout(){
        if(isset($_SESSION['identidad'])){
            unset($_SESSION['identidad']);
            unset($_SESSION['admin']);

        }
        header("Location:".base_url);

    }

}