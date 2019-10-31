<?php
    require_once('./views/peliculasView.php');
    require_once('./models/peliculasModel.php');
    require_once('./controllers/userController.php');

    class PeliculasController{
        private $viewPeliculas;
        private $modelPeliculas;

        //Lo uso para comparar los generos con los id_genero
        private $modelGeneros;

        //Tengo que crear variable para controlar el login
        private $controllerUser;

        public function __construct(){
            $this->viewPeliculas = new PeliculasView();
            $this->modelPeliculas = new PeliculasModel();

            $this->modelGeneros = new GenerosModel();

            $this->controllerUser = new UserController();

        }
    
        public function showPeliculas(){
            $ordenar = isset($_GET['ordenar']);
            $pelis = $this->modelPeliculas->getPeliculas($ordenar);
            $generos = $this->modelGeneros->getGeneros();
            //Envío peliculas y generos y despues en el template, comparo id y muestro nombre
            $this->viewPeliculas->displayPeliculas($pelis, $generos);   
        }

        public function formularioNuevaPeli(){
            $this->controllerUser->checkLogIn();
            $generos = $this->modelGeneros->getGeneros();
            $this->viewPeliculas->DisplayFormularioPelis($generos);
        }

        public function registerPelicula() {
            $this->controllerUser->checkLogIn();
            $id_gen = $_POST['taskOption'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $imagen = (file_get_contents($_FILES['image']['tmp_name']));
            //move_uploaded_file esto vamos a usar para guardar las imagenes

            $this->modelPeliculas->insertarPelicula($id_gen,$nombre,$descripcion,$imagen);
            header("Location: " . URL_PELIS_ADMIN);

        }

        //Funcion para mostrar la info de vermas peli
        public function verMas($id) {
            if($id == 6) {
                //EasterEgg
                $this->viewPeliculas->displayEasterEgg();
            } else {
                $peli = $this->modelPeliculas->getPeliculaId($id);
                $genero = $this->modelGeneros->getGeneroId($peli->id_genero);
                $this->viewPeliculas->DisplayVerMas($peli, $genero);
            }
        }


        //Para el Administrador
        public function showPeliculasAdmin(){
            $this->controllerUser->checkLogIn();
            $pelis = $this->modelPeliculas->getPeliculas();
            $generos = $this->modelGeneros->getGeneros();
            //Envío peliculas y generos y despues en el template, comparo id y muestro nombre
            $this->viewPeliculas->displayPeliculasAdmin($pelis, $generos);
        }

        public function borrarPelicula($id){
            $this->controllerUser->checkLogIn();
            $this->modelPeliculas->borrarPelicula($id);
            header("Location: " . URL_PELIS_ADMIN);
        }

        public function displayFormularioModificar($id){
            $this->controllerUser->checkLogIn();

            $peli = $this->modelPeliculas->getPeliculaId($id);
            $generos = $this->modelGeneros->getGeneros();
            $this->viewPeliculas->displayModificarPelicula($peli, $generos);
        }

        public function modificarPelicula() {
            
            $this->controllerUser->checkLogIn();
            $id_peli = $_POST['id'];
            $id_gen = $_POST['taskOption'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $imagen = (file_get_contents($_FILES['image']['tmp_name']));
            //move_uploaded_file esto vamos a usar para guardar las imagenes

            $this->modelPeliculas->actualizarPelicula($id_peli, $id_gen, $nombre, $descripcion, $imagen);
            header("Location: " . URL_PELIS_ADMIN);
        }
    }