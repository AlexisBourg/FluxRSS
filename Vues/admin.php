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
                    <form method="post" action="index.php?action=disconnection">
                        <input type="submit" value="Se deconnecter">
                    </form>
                </td>
            </tr>
        </table>
    </center>
</header>
<hr>
<?php
echo "<center>
    <table>
        <tr>
            
            <td>
                <form method='post' action='index.php?action=addFlux'>
                    <table>
                        <td>Ajouter un flux RSS :</td>
                        <td>Titre :</td>
                        <td><input type='text' name='title'></td>
                        <td>Url :</td>
                        <td><input type='url' name='url'></td>
                        <td><input type='submit' value='Valider'></td>
                    </table>
                </form>
            </td>
        </tr>
        <tr>
            
            <td>
                <form method='post' action='index.php?action=delFlux'>
                <table>
                    <td>Supprimer un flux RSS :</td>
                    <td>Titre :</td>
                    <td><input type='text' name='title'></td>
                    <td><input type='submit' value='Valider'></td>
                </table>
                </form>
            </td>
        </tr>
           
            <td>
                <form method='post' action='index.php?action=upNbNPage'>
                    <table>
                        <td>Nombre de News par page :</td>
                        <td><input type='number' name='nbNews' value=" . $mldNb->getNbP() . " ></td> 
                        <td><input type='submit' value='Valider'></td>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</center>";
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
    echo 'Pas de news à afficher.';
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
