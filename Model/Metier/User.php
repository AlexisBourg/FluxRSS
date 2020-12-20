<?php


class User
{
    private $name;
    private $firstname;
    private $mail;
    private $password;


    public function __construct($name=null,$firstname=null,$Mail,$password="password")
    {
        $this->name=$name;
        $this->firstname=$firstname;
        $this->mail=$Mail;
        $this->password=$password;

    }
    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstname;
    }
}