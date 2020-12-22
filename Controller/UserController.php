<?php

class UserController
{
    public function __construct()
    {
        global $rep, $vues, $tVueErreur;
        $action = $_REQUEST['action'] ?? null;
        try {

            switch (strtolower($action)) {
                case NULL:
                case 'displayAll':
                    $this->displayAll();
                    break;
                case 'openNews':
                    $this->openNews();
                    break;
                case 'connection':
                    $this->connection($tVueErreur);
                    break;
                default:
            }
        } catch (PDOException $e) {
            $tVueErreur[] = $e->getMessage();      //'Erreur de base de donnée';
            require($rep . $vues['error']);
        } catch (Exception $e) {
            $tVueErreur[] = 'Autre erreur';
            require($rep . $vues['error']);
        }
    }

    public function displayAll()
    {
        global $rep, $vues;
        $mdlN = new ModelNews();
        $listN = $mdlN->getAllNews();
        require($rep . $vues['user']);
    }

    public function openNews()
    {
        global $rep, $vues;
        $id = $_GET['id'] ?? null;
        if ($id === null) {
            $tVueErreur[] = 'La news n\'existe pas';
            require($rep . $vues['error']);
        } else {
            $mdl = new ModelNews();
            $news = $mdl->SelectByIdNews($id);
            header('Location: ' . $news->geturl());
        }
    }

    public function connection($tVueErreur)
    {
        global $rep, $vues;
        $mail = $_POST['email'];
        $password = $_POST['psw'];
        Validation::val_form2($mail, $password, $tVueErreur);
        $mdl = new ModelUser();
        if ($mdl->connection($mail, $password)) {
            require($rep . $vues['admin']);
        } else {
            echo "Identifiant ou mot de passe incorrect";
            require($rep . $vues['user']);

        }
    }

    public function inscription($name, $firstname, $mail, $password)
    {
        global $tVueErreur;
        Validation::val_form($name, $firstname, $mail, $password);
        $mdl = new ModelUser();
        $mdl->inscription($name, $firstname, $mail, $password);
    }

    public function isAdmin(): bool
    {
        $mdl = new ModelUser();
        return $mdl->isAdmin();
    }
}