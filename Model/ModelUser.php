<?php


include 'Config/Clean.php';
include 'Gateway/UserGateway.php';

class ModelUser
{
    private $gateway;

    public function __construct()
    {
        $this->gateway= new UserGateway();
    }

    public function insertUser($name,$firstname,$mail,$password){
        $this->gateway->insertUser($name,$firstname,$mail,$password);
    }

    public function deleteUser($User){
        $this->gateway->deleteUser($User);
    }

    public function SelectUserByMailPassword($User):User{
        return $this->gateway->SelectUserByMailPassword($User->getMail(),$User->getPassword());
    }

    public function connection($mail,$password){

        $mail = Clean::mailClean($mail);
        $password = Clean::stringClean($password);
        $res = $this->gateway->SelectUserByMailPassword($mail, $password);
        if ($res == null) {
            require('../Vues/Erreur.php');
        }
        else{
            $_SESSION['role']="admin";
            $_SESSION['login']=$mail;
        }
    }

    public function inscription($name,$firstname,$mail,$password):bool{
        Validation::val_form($name,$firstname,$mail,$password);
        if(!$this->gateway->insertUser($name,$firstname,$mail,$password)){
            return false;
        }
        $_SESSION['role']="admin";
        $_SESSION['login']=$mail;
        return true;
    }

    public function isAdmin():bool {
        if(isset($_SESSION['login'])&& isset($_SESSION['role']) && $_SESSION['role']=="admin"){
            return true;
        }
        return false;
    }

    public function deconnection(){
        session_unset();
        session_destroy();
        $_SESSION =array();
    }
}