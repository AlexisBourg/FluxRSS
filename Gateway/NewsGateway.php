<?php

class NewsGateway
{
    private $connection;

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

    public function SelectNbNews($firstN,$nb):array{
        $query='SELECT * FROM NEWS order by date DESC LIMIT :first, :last ';
        $this->connection->executeQuery($query,array(
            ":first" => array($firstN, PDO::PARAM_INT),
            ":last" => array($nb, PDO::PARAM_INT)
        ));
        $res= $this->connection->getResults();
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

    public function countNews():int{
        $query='SELECT count(*) FROM News';
        $this->connection->executeQuery($query,array());
        $res=$this->connection->getResults();
        return $res[0]["count(*)"];
    }

    public function insertNews($News){
        $query='INSERT INTO News VALUES (:url,:title,:des,:date)';
        $this->connection->executeQuery($query, array(
            ':url'=>array($News->url,PDO::PARAM_STR),
            ':title'=>array($News->title,PDO::PARAM_STR),
            ':des'=>array($News->description,PDO::PARAM_STR),
            ':date'=>array($News->date,PDO::PARAM_STR)
        ));
    }

    public function dropNews(){
        $query='TRUNCATE TABLE news';
        $this->connection->executeQuery($query,array());

    }
}