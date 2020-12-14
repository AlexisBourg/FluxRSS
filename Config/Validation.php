<?php

namespace config;

class Validation {

    static function val_action($action) {
        if (!isset($action)) {
            throw new Exception('pas d\'action');
        }
    }

    static function val_form(string &$name,string &$firstname,string &$Mail, string &$password,&$dVueEreur) {

        if (!isset($name)||$name=="") {
            $dVueEreur[] =	"pas de nom";
            $name="";
        }

        if ($name != Clean::stringClean($name))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $name="";
        }

        if (!isset($firstname)||$firstname=="") {
            $dVueEreur[] =	"pas de nom";
            $firstname="";
        }

        if ($firstname != Clean::stringClean($firstname))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $firstname="";
        }

        if (!isset($Mail)||$Mail=="") {
            $dVueEreur[] =	"pas de nom";
            $Mail="";
        }

        if ($Mail != Clean::mailClean($Mail))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $name="";
        }

        if (!isset($password)||$password=="") {
            $dVueEreur[] =	"pas de mot de passe";
            $pasword="";
        }

        if ($password != Clean::stringClean($password))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $password="";
        }

        

    }

}
?>