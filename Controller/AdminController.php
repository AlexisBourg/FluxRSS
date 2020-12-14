<?php


class AdminController extends UserController
{

    public function __construct(){
        $action =$_GET['action'] ?? null;
        try {
            switch (strtolower($action)){
                case'addRSSflux':
                    $this->addFlux();
                    break;
                case'delFlux':
                    $this->delFlux();
                    break;
                case 'deconnection':
                    $this->deconnection();
                    break;
                case 'addAdmin':
                    $this->addAdmin();
                    break;
                case'delAdmin':
                    $this->delAdmin();
                    break;
                default:
                    require('../Vues/erreur.php');
            }
        }catch (PDOException $e){
            $erreur='Erreur de base de donnée';
            require('../Vues/erreur.php');
        }catch (Exception $e){
            $erreur='Autre erreur';
            require('../Vues/erreur.php');
        }
    }

    public function deconnection(){
        $mld = new ModelUser();
        $mld->deconnection();
    }
    public function addAdmin($name,$firstname,$mail,$password):bool{
        $mld= new ModelUser();
        return $mld->inscription($name,$firstname,$mail,$password);

    }

    public function delAdmin($mail,$pasword){
        $mdl= new ModelUser();
        $mdl->deleteUser(New User(null,null,$mail,$pasword));
    }



    public function addFlux(){


    }

    public function delFlux(){

    }


}