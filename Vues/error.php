<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Erreur...</title>
</head>
<body bgcolor="B6DEE6">

<center>
    <table>
        <tr>
            <td><img src="Resources/erreur.jpg"></td>
            <td>
                <?php
                if (isset($tVueErreur)) {
                    foreach ($tVueErreur as $value) {
                        echo $value;
                    }
                }
                ?>
            </td>
        </tr>
    </table>
</center>
</body>

