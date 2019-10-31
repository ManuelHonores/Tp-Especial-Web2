<?php
    require_once('./models/generosModel.php');
    require_once('./views/generosView.php');
    require_once('./controllers/userController.php');

    class GenerosController{
        private $viewGeneros;
        private $modelGeneros;

        private $controllerUser;

        public function __construct(){
            $this->viewGeneros = new GenerosView();
            $this->modelGeneros = new GenerosModel();

            $this->controllerUser = new UserController();
        }

        public function showGeneros(){
            $gens = $this->modelGeneros->getGeneros();
            $this->viewGeneros->displayGeneros($gens);
        }

        public function formularioNuevoGenero(){
            $this->controllerUser->checkLogIn();
            $this->viewGeneros->displayFormularioGeneros();
        }

        public function registerGenero() {
            $this->controllerUser->checkLogIn();
            $nombre = $_POST['nombre'];

            $this->modelGeneros->insertarGenero($nombre);
            //Ver si lo redirijo a los generos o lo envio a pelis
            header("Location: " . URL_GENEROS_ADMIN);
        }

        public function borrarGenero($id){
            $this->controllerUser->checkLogIn();
            $this->modelGeneros->eliminarGenero($id);
            header("Location: " . URL_GENEROS_ADMIN);
        }

        public function displayFormularioModificar($id){
            $this->controllerUser->checkLogIn();

            $genero = $this->modelGeneros->getGeneroId($id);
            $this->viewGeneros->displayModificarGenero($genero);
        }

        public function modificarGenero() { 
            $this->controllerUser->checkLogIn();
            $id_gen = $_POST['id'];
            $nombre = $_POST['nombre'];

            $this->modelGeneros->actualizarGenero($id_gen, $nombre);
            header("Location: " . URL_GENEROS_ADMIN);
        }

        public function showGenerosAdmin(){
            $this->controllerUser->checkLogIn();
            $generos = $this->modelGeneros->getGeneros();
            $this->viewGeneros->displayGenerosAdmin($generos);
        }
    }