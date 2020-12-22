<html lang="fr">
<head>
    <meta cnarset="utf-8">
    <meta name="viewport" content="">
    <title>Lecteur de flux RSS</title>
</head>

<form method="post" action="../index.php?action=connection">
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
                <td> <a type="submit" href="/cours/Projet/index.php">Annuler</a></td>
            </tr>
        </table>
    </center>
    <!-- action !!!!!!!!!!-->
    <input type="hidden" name="action" value="connection">
</form>
</div>
</html>