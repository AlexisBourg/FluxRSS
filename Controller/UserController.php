<?php

class UserController
{
    public function __construct()
    {
        global $rep, $vues, $tVueErreur;
        $action = $_REQUEST['action'] ?? null;
        try {
            switch ($action) {
                case 'openNews':
                    $this->openNews();
                    break;
                case 'connection':
                    $this->connection($tVueErreur);
                    break;
                default:
            }
            //$this->displayAll();
            $this->display();
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
        $mdlU = new ModelUser();
        $listN = $mdlN->getAllNews();
        if ($mdlU->isAdmin()) {
            require($rep . $vues['admin']);
        } else {
            require($rep . $vues['user']);
        }
    }

    public function display(){
        global $rep,$vues, $fluxEmpty;
        $mdlN = new ModelNews();
        $mdlU = new ModelUser();
        $mldNb = new ModelNbPage();
        $nbPage=1;

        if(isset($_GET['page']) && !empty($_GET['page'])){ //on détermine la page sur laquelle on se trouve
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }

        $nbn=$mdlN->countNews();//nombre de News de la base de donnée
        if($nbn==0){
            if ($mdlU->isAdmin()) {
                require($rep . $vues['admin']);
            } else {
                require($rep . $vues['user']);
            }
            return;
        }
        $newsPPage=$mldNb->getNbP();        //nombre de News par page
        $nbPage=ceil($nbn/$newsPPage); //nombre de page total
        $firstN=($currentPage*$newsPPage)-$newsPPage;
        $listN=$mdlN->getNbNews($firstN,$newsPPage) ;

        if ($mdlU->isAdmin()) {
            require($rep . $vues['admin']);
        } else {
            require($rep . $vues['user']);
        }
    }

    public function getNbNews($nb){
        global $rep, $vues;
        $mdlN = new ModelNews();
        $mdlU = new ModelUser();
        $listN = $mdlN->getNbNews($nb);
        if ($mdlU->isAdmin()) {
            require($rep . $vues['admin']);
        } else {
            require($rep . $vues['user']);
        }
    }

    public function openNews()
    {
        global $rep, $vues;
        $id = $_GET['id'] ?? null;
        if ($id === null) {
            $tVueErreur[] = 'La news n\'existe pas';
            require($rep . $vues['error']);
        }
        else {
            $mdl = new ModelNews();
            $news = $mdl->SelectByIdNews($id);
            header('Location: ' . $news->geturl());
        }
    }

    public function connection($tVueErreur)
    {
        $mail = $_POST['email'];
        $password = $_POST['psw'];
        Validation::val_form2($mail, $password, $tVueErreur);
        $mdl = new ModelUser();
        if (!$mdl->connection($mail, $password)) {
            echo "Identifiant ou mot de passe incorrect";
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