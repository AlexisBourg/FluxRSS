<?php


class Flux
{
    private $title;
    private $url;

    public function __construct($title,$url){
        $this->title=$title;
        $this->url=$url;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

}