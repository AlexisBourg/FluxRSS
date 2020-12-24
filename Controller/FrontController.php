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
                $action=$_REQUEST['action'];
                $listAction_Admin = ['','disconnection', 'addAdmin', 'delAdmin','delNews','upNbNPage','addFlux','delFlux'];
                $mdl = new ModelUser();
                try {
                    if (array_search($action, $listAction_Admin)) {
                        if ($mdl->isAdmin()) {
                            new AdminController();
                        }
                        else{
                            $tVueErreur[]="Erreur de droit";
                            require ($rep . $vues['error']);
                        }
                    } else {
                        new UserController();
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                    $tVueErreur[] =	"Erreur d'appel php";
                    require ($rep.$vues['error']);
                }
            }

        }
    }
?>