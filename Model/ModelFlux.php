<?php


class ModelFlux
{
    private $gateway;

    public function __construct(){
        $this->gateway = new FluxGateway();
    }

    public function addFlux($title,$url){
        $this->gateway->addFlux(new Flux($title,$url));

    }

    public function delFlux($title){
        $this->gateway->delFlux($title);
    }

    public function getAllFlux():array{
        return $this->gateway->SelectAllFlux();
    }

    public function isEmpty():bool{
        return $this->gateway->isEmpty();
    }
}