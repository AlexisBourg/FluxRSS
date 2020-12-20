<html lang="fr">
<head>
    <meta cnarset="utf-8">
    <meta name="viewport" content="">
    <title>Lecteur de flux RSS</title>
</head>
<body>
<header>
    <p>testU</p>
</header>

<?php
//TODO si admin afficher un bouton ajouter flux et ajouter/supprimer admin
//TODO voir si on ne pourrait pas envoyer un mail des qu'une news apparait

if (isset($listN)) {
    foreach ($listN as $ln) {
        echo "<session class='news'>
                        <p>Date :" . $ln->getDate() . " </p><br/>
                        <p>Titre : <a href='UserController.php?action=cliquernews&newsUrl=" . $ln->getUrl() . "&" . $ln->getTitle() . "</a><p><br/>
                        <div>Description :" . $ln->getDescription() . "</p></div>
                    </session>";
    }
} else {
    echo 'Pas de news à afficher.';
}
?>
</body>
</html>
