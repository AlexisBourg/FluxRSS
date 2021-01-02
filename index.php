<?php
    require_once(__DIR__ . '/Config/config.php');
    //chargement autoloader pour autochargement des classes
    require_once(__DIR__ . '/Config/Autoloader.php');
    Autoloader::load();
    if (@fsockopen("www.google.fr", 80)) { //reelement utile uniquement si on heberge localement le site
        new ParseurXml();
        new FrontController();
    } else {
        $tVueErreur[] = "Pas de connection à internet";
        require($rep . $vues['error']);
    }

?>