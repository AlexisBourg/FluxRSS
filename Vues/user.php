<html lang="fr">
<head>
    <meta cnarset="utf-8">
    <meta name="viewport" content="">
    <title>Lecteur de flux RSS</title>
</head>

<body>
<header>
    <table>
        <tr>
            <td align="left"><h1>Regardez toutes ces NEWS !!!</h1></td>
            <td align="right">
                <form method="post" action="index.php?action=connection">
                    <center>
                        <table>
                            <tr>
                                <td>Email :</td>
                                <td><input name="email" value="test@orange.fr" type="email" size="20" required></td>
                            </tr>
                            <tr>
                                <td>Mot de passe :</td>
                                <td><input name="psw" value="psw" type="password" size="20" required></td>
                            </tr>
                            <tr>
                        </table>
                        <table>
                            <tr>
                                <td><input type="submit" value="Se connecter"></td>
                                <!--<td> <a type="submit" href="/cours/Projet/index.php">Annuler</a></td>-->
                            </tr>
                        </table>
                    </center>
                    <!-- action !!!!!!!!!!-->
                    <input type="hidden" name="action" value="connection">
                </form>
            </td>
        </tr>
    </table>
</header>
<hr>

<?php

//TODO voir si on ne pourrait pas envoyer un mail des qu'une news apparait

if (isset($listN)) {
    foreach ($listN as $ln) {
        echo "<table class='news'>
                    <tr>
                        <td>Date :" . $ln->getDate() . " &nbsp;</td>
                        <td><a href=" . $ln->getUrl() . ">  " . $ln->getTitle() . "</a>&nbsp;</td>
                        <td><a href=" . $ln->getUrl() . ">   " . $ln->getDescription() . "</a>&nbsp;</td>
                        <br/>
                    </tr>
             </table>";
    }
} else {
    echo 'Pas de news à afficher.';
}
?>
</body>
</html>
