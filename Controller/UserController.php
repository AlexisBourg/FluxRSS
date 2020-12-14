<?php
require 'Model/ModelNews.php';
require 'Model/ModelUser.php';
require 'Model/Metier/User.php';
require 'Gateway/UserGateway.php';
require 'Model/ModelNews.php';

class UserController
{

    public function __construct(){
        $action =$_GET['action'] ?? null;
        try {
            switch (strtolower($action)){
                case null:
                case 'displayAll':
                    $this->displayAll();
                    break;
                case 'openNews':
                    $this->openNews();
                    break;
                case 'connection':
                    $this->connection();
                    break;
                case 'inscription':
                    $this->inscription();
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

    public function displayAll(){
        $mdlN= new ModelNews();
        $lNews[] = $mdlN->getAllNews();
        require(' ../Vues/listeNews.php');
    }

    public function openNews(){
        $id= $_GET['id'] ?? null;
        if($id === null) {
            $erreur = 'La news n\'existe pas';
            require('../Vues/erreur.php');
        }
        else{
            $mdl= new ModelNews();
            $news= $mdl->SelectByIdNews($id );
            header('Location: ' . $news->geturl());
        }
    }

    public function connection(){
        // TODO ajouter la validation

        $mdl= new ModelUser();
        $mdl->connection();
    }

    public function inscription($name,$firstname,$mail,$password){
        $mdl= new ModelUser();
        $mdl->inscription($name,$firstname,$mail,$password);
    }

    public function isAdmin():bool{
        $mdl= new ModelUser();
        return $mdl->isAdmin();
    }

}