<?php

class Validation
{

    static function val_action($action)
    {
        if (!isset($action)) {
            throw new Exception('pas d\'action');
        }
    }

    static function val_form(string &$name, string &$firstname, string &$Mail, string &$password, &$tVueEreur)
    {

        if (!isset($name) || $name == "") {
            $tVueEreur[] = "pas de nom";
            $name = "";
        }

        if ($name != stringValidation($name)) {
            $tVueEreur[] = "testative d'injection de code (attaque sécurité)";
            $name = "";
        }

        if (!isset($firstname) || $firstname == "") {
            $tVueEreur[] = "pas de nom";
            $firstname = "";
        }

        if ($firstname != stringValidation($firstname)) {
            $tVueEreur[] = "testative d'injection de code (attaque sécurité)";
            $firstname = "";
        }

        if (!isset($Mail) || $Mail == "") {
            $tVueEreur[] = "pas de nom";
            $Mail = "";
        }

        if ($Mail != mailValidation($Mail)) {
            $tVueEreur[] = "testative d'injection de code (attaque sécurité)";
            $name = "";
        }

        if (!isset($password) || $password == "") {
            $tVueEreur[] = "pas de mot de passe";
            $pasword = "";
        }

        if ($password != filter_var($password, FILTER_SANITIZE_STRING))
        {
            $tVueEreur[] = "testative d'injection de code (attaque sécurité)";
            $password = "";
        }
    }

    static function val_form2(string &$Mail, string &$password, &$tVueEreur)
    {

        if (!isset($Mail) || $Mail == "") {
            $tVueEreur[] = "pas de nom";
            $Mail = "";
        }

        if ($Mail != filter_var($Mail, FILTER_SANITIZE_EMAIL)) {
            $tVueEreur[] = "testative d'injection de code (attaque sécurité)";
            $Mail = "";
        }

        if (!isset($password) || $password == "") {
            $tVueEreur[] = "pas de mot de passe";
            $password = "";
        }

        if ($password != filter_var($password, FILTER_SANITIZE_STRING)) {
            $tVueEreur[] = "testative d'injection de code (attaque sécurité)";
            $password = "";
        }
    }

}
?>