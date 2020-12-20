<!DOCTYPE html>
<html lang="fr">
<body>
<h1>ERREUR !!!!!</h1>
    <?php
        if (isset($tVueErreur)) {
            foreach ($tVueErreur as $value) {
                echo $value;
            }
        }
    ?>
    <img src="erreur.jpg">
</body>

