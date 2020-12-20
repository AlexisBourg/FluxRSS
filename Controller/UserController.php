<?php

class UserController
{
    public function __construct(){
        global $rep,$vues;
        $action=$_GET['action'] ?? null;
        try {
            switch (strtolower($action)){
                case NULL:
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
            }
        }catch (PDOException $e){
            $tVueErreur[]=$e->getMessage();      //'Erreur de base de donnée';
            require($rep.$vues['erreur']);
        }catch (Exception $e){
            $tVueErreur[]= 'Autre erreur';
            require($rep.$vues['erreur']);
        }
    }

    public function displayAll(){
        global $rep,$vues;
        $mdlN= new ModelNews();
        $listN= $mdlN->getAllNews();
        require($rep . $vues['user']);
    }

    public function openNews(){
        global $rep,$vues;
        $id= $_GET['id'] ?? null;
        if($id === null) {
            $erreur = 'La news n\'existe pas';
            require($rep . $vues['erreur']);
        }
        else{
            $mdl= new ModelNews();
            $news= $mdl->SelectByIdNews($id);
            header('Location: '.$news->geturl());
        }
    }

    public function connection($mail,$password){
        global $rep,$vues;
        $mailClean= Clean::mailClean($mail);
        $passwordClean = Clean::stringClean($password);
        $mdl= new ModelUser();
        if($mdl->connection($mailClean,$passwordClean)){
            require ($rep . $vues['admin']);
        }
        else{
            require ($rep . $vues['erreur']);
        }
    }

    public function inscription($name,$firstname,$mail,$password){
        Validation::val_form($name,$firstname,$mail,$password);
        $mdl= new ModelUser();
        $mdl->inscription($name,$firstname,$mail,$password);
    }

    public function isAdmin():bool{
        $mdl= new ModelUser();
        return $mdl->isAdmin();
    }
}