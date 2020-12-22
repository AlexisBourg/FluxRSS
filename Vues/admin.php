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
            <td align="right"><form method="post" action="index.php?action=deconnection">
                    <input type="submit" value="Se deconnecter">
                </form>
            </td>
        </tr>
    </table>
</header>
<hr>
<p>test admin</p>
<?php

//TODO voir si on ne pourrait pas envoyer un mail des qu'une news apparait

if (isset($listN)) {
    foreach ($listN as $ln) {
        echo "<table class='news'>
                    <tr>
                        <td>Date :" . $ln->getDate() . " &nbsp;</td>
                        <td><a href=" . $ln->getUrl() . ">  " . $ln->getTitle() . "</a>&nbsp;</td>
                        <td><a href=" . $ln->getUrl() . ">   " . $ln->getDescription() . "</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td></td>
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
