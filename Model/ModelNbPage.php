<?php


class ModelNbPage
{
    private $gateway;

    public function __construct(){
        $this->gateway= new NbPageGateway();
    }

    public function getNbP(): int{
        return (int) $this->gateway->getNbP();
    }

    public function changeNbP($nb){
        $this->gateway->changeNbP($nb);
    }
}