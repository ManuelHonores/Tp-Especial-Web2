<?php
    require_once("./libs/Smarty.class.php");
    
    class UserView{
        public function successfulRegistration(){
            $smarty = new Smarty();
            $smarty->assign('titulo',"Movieplus: registred!");
            $smarty->display('./templates/registro_exitoso.tpl');
            //header("Location: " . URL_PELIS);
            header('refresh: 1; url = http://localhost:80/WEB2/TP-Especial/login');
        }

        public function displaySignUp(){
            $smarty = new Smarty();
            $smarty->assign('titulo',"Movieplus: registration");
            $smarty->display('./templates/form_signup.tpl');
        }

        public function repeatedMail(){
            $smarty = new Smarty();
            $smarty->assign('titulo',"Movieplus: registration");
            $smarty->display('./templates/form_signup.tpl');
            die();
        }

        public function displayLogIn(){
            $smarty = new Smarty();
            $smarty->assign('titulo',"Movieplus: login");
            $smarty->display('./templates/form_login.tpl');
        }

    }