<?php

class NewsGateway
{
    private $connection;
    private $tabN;

    public function __construct(){
        global $dsn,$login,$mdp;
        $this->connection= new Connection($dsn,$login,$mdp);
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
            $tabN[]= new News($row['Title'],$row['Description'],$row['Date'],$row['URL']);
        }
        return $tabN;
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