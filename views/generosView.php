<?php

    require_once("libs/Smarty.class.php");

    class GenerosView{
        
        function __construct(){

        }

        public function displayGeneros($generos){
            $smarty = new Smarty();
            $smarty->assign('titulo',"MoviePlus_Generos");
            $smarty->assign('URL_GENEROS_ADMIN',URL_GENEROS_ADMIN);
            $smarty->assign('generos',$generos);
            $smarty->display('templates/ver_generos.tpl');
        }

        public function displayFormularioGeneros(){
            $smarty = new Smarty();
            $smarty->assign('titulo',"Ingreso de Genero");
            $smarty->display('templates/form_nuevo_genero.tpl');
        }

        public function displayGenerosAdmin($generos) {
            $smarty = new SmartyBC();
            $smarty->assign('titulo','MoviePlus_Admin_Generos');
            $smarty->assign('BASE_URL',BASE_URL);
            $smarty->assign('generos',$generos);
            $smarty->display('templates/generos_admin.tpl');
        }

        public function displayModificarGenero($genero) {
            $smarty = new Smarty();
            $smarty->assign('titulo','MoviePlus_Modificar_Genero');
            $smarty->assign('BASE_URL',BASE_URL);
            $smarty->assign('genero',$genero);
            $smarty->display('templates/modificar_genero.tpl');
        }
    }