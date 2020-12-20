<?php


class ModelNews
{
    private $gateway;

    public function __construct(){
        $this->gateway= new NewsGateway();
    }

    public function SelectByIdNews($id):News{
        return $this->gateway->SelectIdNews($id);
    }

    public function getAllNews():array{
        return $this->gateway->SelectAllNews();
    }

    public function addNews($news){
        $this->gateway->insertNews($news);
    }

    public function deleteNews($news){
        $this->gateway->deleteNews($news);
    }

    public function countNews():int{
        return $this->gateway->countNews();
    }
}