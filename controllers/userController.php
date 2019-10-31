<?php
    require_once ("./views/userView.php");
    require_once ("./models/userModel.php");

    class UserController{
        private $viewUser;
        private $modelUser;

        public function __construct(){
            $this->viewUser = new UserView();
            $this->modelUser = new UserModel();
        }

        public function displaySignUp(){
            $this->viewUser->displaySignUp();
        }

        public function registerUser(){
            $name = $_POST['nombre'];
            $mail = $_POST['email'];
            $password = $_POST['password'];
            $users = $this->modelUser->getUsers();
            if ((isset($users))&&($users!=null)){
                foreach ($users as $user) {
                    if ($mail==$user->email){
                        $this->viewUser->repeatedMail();
                    }
                }
            }
            $this->modelUser->insertUser($name, $mail, $password);
            $this->viewUser->successfulRegistration();
        }

        public function logIn(){
            
            $password = $_POST['password'];

            $usuario = $this->modelUser->getUser($_POST['email']);

            if (isset($usuario) && $usuario != null && password_verify($password, $usuario->password)){
                session_start();
                $_SESSION['user'] = $usuario->email;
                $_SESSION['userId'] = $usuario->id_usuario;
                header("Location: " . URL_PELIS_ADMIN);
            }else{
                $message = "Usuario o contraseña incorrectos"; //Preguntar como mandar alerta
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Location: " . URL_LOGIN);
            }
        }

        public function logOut(){
            session_start();
            session_destroy();
            header("Location: ". BASE_URL);
        }

        public function displayLogIn(){
            $this->viewUser->displayLogIn();
        }


        public function checkLogIn(){
            session_start();
            
            if(!isset($_SESSION['userId'])){
                header("Location: " . BASE_URL);
                die();
            }
            if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) { 
                header("Location: " . URL_LOGOUT);
                die(); // destruye la sesión, y vuelve al login
            } 
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }