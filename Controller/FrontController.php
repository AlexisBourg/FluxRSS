<?php


class FrontController
{
    public function __construct($action) {
        //$action =$_GET['action'] ?? null;
        $listAction_Admin = array('addRSSflux','delFlux', 'deconnection','addAdmin','delAdmin');
        $mdl = new ModelUser();
        Try {
            if (array_search($action,$listAction_Admin)){
                if ($mdl->isAdmin()) {
                    require ('../Vues/connection.php');// ou appel ctrlUser avec action connecter
                }
                else{
                    new AdminController();
                }
            }
            else{
                new UserController();

            }
        }
        Catch(Exception $e){
            require('../Vues/Erreur.php');
        }
        session_start();
    }

}