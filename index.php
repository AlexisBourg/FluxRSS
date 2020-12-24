<?php
    require_once(__DIR__.'/Config/config.php');
    //chargement autoloader pour autochargement des classes
    require_once(__DIR__.'/Config/Autoloader.php');
    Autoloader::load();
    new ParseurXml();

    new FrontController();
?>