<html lang="fr">
<head>
    <meta cnarset="utf-8">
    <meta name="viewport" content="">
    <title>Lecteur de flux RSS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<header>
    <center>
        <table>
            <tr>
                <td align="left"><h1>Regardez toutes ces NEWS !!!</h1></td>
                <td align="right">
                    <form method="post" action="index.php?action=connection">
                        <center>
                            <table>
                                <tr>
                                    <td>Email :</td>
                                    <td><input type="email" name="email" value="Alexis.BOURGADE@etu.uca.fr" size="20"
                                               required></td>
                                </tr>
                                <tr>
                                    <td>Mot de passe :</td>
                                    <td><input type="password" name="psw" value="1234" size="20" required></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td><input type="submit" value="Se connecter"></td>
                                </tr>
                            </table>
                        </center>
                        <input type="hidden" name="action" value="connection">
                    </form>
                </td>
            </tr>
        </table>
    </center>
</header>
<hr>

<?php


if (isset($listN)) {
    echo " <main class='container'>
        <div class='row'>
            <section class='col - 12'>
                <h1>Liste des News</h1>
                <table class='table'>
                    <thead>
                        <th>Date</th>
                        <th>Titre</th>
                        <th>Article</th>
                    </thead>
                    <tbody>";
    foreach ($listN as $ln) {
        echo "      <tr>
                        <td>Date :" . $ln->getDate() . " &nbsp;</td>
                        <td><a href=" . $ln->getUrl() . ">  " . $ln->getTitle() . "</a>&nbsp;</td>
                        <td><a href=" . $ln->getUrl() . ">   " . $ln->getDescription() . "</a>&nbsp;</td>
                    </tr>";
    }
    echo "</tbody>
         </table>";
} else {
    if($fluxEmpty){
        echo "pas de flux enregistré<br/>";
    }
}
?>
<nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page - item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for ($page = 1; $page <= $nbPage; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
        <li class="page-item <?= ($currentPage == $nbPage) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>


</body>
</html>
