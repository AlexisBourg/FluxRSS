<?php


class AdminController extends UserController
{
    public function __construct(){
        global $rep,$vues;
        $action =$_GET['action'] ?? null;
        try {
            $this->displayAll();
            switch (strtolower($action)){
                /*case NULL:
                case 'displayAll':

                    break;*/
                case 'openNews':
                    $this->openNews();
                    break;
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
                    require($rep . $vues['error']);
            }
        }catch (PDOException $e){
            $tVueErreur[]='Erreur de base de donnée';
            require($rep . $vues['error']);
        }catch (Exception $e){
            $tVueErreur[]='Autre erreur';
            require($rep . $vues['error']);
        }
    }

    public function deconnection(){
        global $vues,$rep;
        $mld = new ModelUser();
        $mld->deconnection();
        require ($rep . $vues['user']);
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