<?php

require_once('../Model/Connection.php');
class newsGateway
{
    private $connection;
    private $tabN;

    public function __construct(){
        $this->connection= new Connection('mysql:host=localhost;dname=projet','root','1234');
    }

    public function SelectByIdNews($id):News{
        $query='SELECT * FROM News WHERE id=:id';
        $this->connection->executeQuery($query,array(
            ':title'=>array($id,PDO::PARAM_INT)
        ));
        return $res=$this->connection->getResults();
    }

    public function SelectAllNews():array{
        $query='SELECT * FROM News order by date';
        $this->connection->executeQuery($query,array());
        $res=$this->connection->getResults();
        foreach ($res as $row){
            $this->tabN[]= new News($row['']);              //a compléter
        }
        return $this->tabN;
    }

    public function deleteNews($News){
        $query='DELETE FROM News WHERE title=:title';
        $this->connection->executeQuery($query, array(
            ':title'=>array($News->titre,PDO::PARAM_STR)
        ));
    }

    public function countNews(): int{
        $query='SELECT count(*) FROM News';
        $this->connection->executeQuery($query,array());
        return $res=$this->connection->getResults();
    }

    public function insertNews($News){
        $query='INSERT INTO News VALUES (:titre,:des,:date)';
        $this->connection->executeQuery($query, array(
            ':titre'=>array($News->titre,PDO::PARAM_STR),
            ':des'=>array($News->des,PDO::PARAM_STR),
            ':date'=>array($News->date,PDO::PARAM_STR)
        ));
    }
}