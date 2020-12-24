<?php


class nbPageGateway
{
    public function __construct()
    {
        global $dsn, $login, $mdp;
        $this->connection = new Connection($dsn, $login, $mdp);
    }

    public function getNbP(): int{
        $query = 'SELECT nbNpage FROM nbNpage WHERE id=:id';
        $this->connection->executeQuery($query, array(
            ':id' => array(1, PDO::PARAM_INT)
        ));
        $nb = $this->connection->getResults();
        return $nb[0]['nbNpage'];
    }

    public function changeNbP($nb)
    {
        $query = 'UPDATE nbNpage SET nbNpage=:nb where id=1';
        $this->connection->executeQuery($query, array(
            ':nb' => array($nb, PDO::PARAM_INT)
        ));
    }

}