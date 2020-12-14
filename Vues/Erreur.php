
<!DOCTYPE html>
<html lang="fr">
<body>
<h1>ERREUR !!!!!</h1>
<?php
    if (isset($dataVueErreur)) {
        foreach ($dataVueErreur as $value){
            echo $value;
        }
    }
?>

