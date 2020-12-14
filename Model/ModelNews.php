<?php
include ('../Gateway/NewsGateway.php');
include ('Metier/News.php');
class ModelNews
{
    private $gateway;

    public function __construct(){
        $gateway= new NewsGateway();
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