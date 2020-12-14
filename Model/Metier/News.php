<?php

include ('../../Gateway/NewsGateway.php');
class News
{
    private $title;
    private $description;
    private $date;
    private $url;


    public function __construct($t,$d,$date,$url)
    {
        $this->title=$t;
        $this->description=$d;
        $this->date=$date;
        $this->url=$url;

    }

    /**
     * @return mixed $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

}