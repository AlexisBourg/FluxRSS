<?php
require ('../Model/ModelUser.php');
require_once('../Model/Connection.php');
class UserGateway
{
    private $connection;
    private $user;

    public function __construct(){
        $this->connection= new Connection('mysql:host=localhost;dname=projet','root','1234');
    }

    public function insertUser($name,$firstname,$mail,$password):bool{
        $User = new User($name,$firstname,$mail,$password);
        $query='INSERT INTO user VALUES (:name,:firstname,:mail,:password)';
        $this->connection->executeQuery($query, array(
            ':name'=>array($User->getname(),PDO::PARAM_STR),
            ':firstname'=>array($User->getfirstname(),PDO::PARAM_STR),
            ':mail'=>array($User->getMail(),PDO::PARAM_STR),
            ':password'=>array($User->getpassword(),PDO::PARAM_STR)
        ));
        return $this->connection->getResults();
    }

    public function deleteUser($User){
        $query='DELETE FROM User WHERE mail=:mail AND pasword=:pasword';
        $this->connection->executeQuery($query, array(
            ':mail'=>array($User->getMail(),PDO::PARAM_STR),
            ':pasword'=>array($User->getPassword(),PDO::PARAM_STR)
        ));
    }

    public function SelectUserByMailPassword($mail,$password):User{
        $query='SELECT * FROM User WHERE mail=:mail AND password=:password';
        $this->connection->executeQuery($query,array(
            ':mail'=>array($mail,PDO::PARAM_STR),
            ':password'=>array($password,PDO::PARAM_STR)
        ));
        $this->user=$this->connection->getResults();
        return $this->user;
    }
}