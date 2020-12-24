<?php


class FluxGateway
{
    private $connection;

    public function __construct()
    {
        global $dsn, $login, $mdp;
        $this->connection = new Connection($dsn, $login, $mdp);
    }

    public function addFlux($flux)
    {
        $query = 'INSERT INTO Flux VALUES (:title,:url)';
        $this->connection->executeQuery($query, array(
            ':title' => array($flux->getTitle(), PDO::PARAM_STR),
            ':url' => array($flux->getUrl(), PDO::PARAM_STR)
        ));
    }

    public function delFlux($title)
    {
        $query = 'DELETE FROM Flux WHERE nomSite=:title';
        $this->connection->executeQuery($query, array(
            ':title' => array($title, PDO::PARAM_STR)
        ));
    }

    public function SelectAllFlux():array{
        $query='SELECT * FROM Flux';
        $this->connection->executeQuery($query,array());
        $res=$this->connection->getResults();
        foreach ($res as $row){
            $tabN[]= new Flux($row['nomSite'],$row['url']);
        }
        return $tabN;
    }

    public function isEmpty():bool{
        $query='SELECT count(*) FROM Flux';
        $this->connection->executeQuery($query,array());
        $res=$this->connection->getResults();
        if ($res[0]['count(*)']==0){
            return true;
        }
        return false;
    }
}