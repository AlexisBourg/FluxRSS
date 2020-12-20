<?php
    class FrontController
    {
        public function __construct(){
            session_start();
            global $rep,$vues;

            $tVueErreur =array();

           if(!isset($_REQUEST['action'])){
                new UserController();
            }
            else {
                $action = strtolower($_REQUEST['action']) ?? null;
                $listAction_Admin = ['addRSSflux', 'delFlux', 'deconnection', 'addAdmin', 'delAdmin'];
                $mdl = new ModelUser();
                try {
                    if (array_search($action, $listAction_Admin)) {
                        if ($mdl->isAdmin()) {
                            require('Vues/admin.php');
                        } else {
                            new AdminController();
                        }
                    } else {
                        new UserController();
                    }
                } catch (Exception $e) {
                    $tVueErreur[] =	"Erreur d'appel php";
                    require ($rep.$vues['erreur']);
                }
            }

        }
    }
?>