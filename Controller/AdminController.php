<?php


class AdminController extends UserController
{
    public function __construct(){
        global $rep, $vues, $tVueErreur, $fluxEmpty;
        $action = $_GET['action'] ?? null;
        try {
            switch ($action) {
                case 'openNews':
                    $this->openNews();
                    break;
                case 'disconnection':
                    $this->disconnection();
                    break;
                case 'addAdmin':
                    $this->addAdmin();
                    break;
                case 'delAdmin':
                    $this->delAdmin();
                    break;
                case 'delNews':
                    $this->delNews();
                    break;
                case 'upNbNPage':
                    $this->upNbNPage($tVueErreur);
                    $this->getNbP();
                    break;
                case 'addFlux':
                    $this->addFlux($tVueErreur);
                    break;
                case 'delFlux':
                    $this->delFlux($tVueErreur);
                    break;
                default:
                    require($rep . $vues['error']);
            }
            $this->display();
        } catch (PDOException $e) {
            echo $e->getMessage();
            $tVueErreur[] = 'Erreur de base de donnée';
            require($rep . $vues['error']);
        } catch (Exception $e) {
            echo $e->getMessage();
            $tVueErreur[] = 'Autre erreur';
            require($rep . $vues['error']);
        }
    }

    public function disconnection(){
        $mld = new ModelUser();
        $mld->deconnection();
    }

    public function addAdmin($name, $firstname, $mail, $password): bool{
        $mld = new ModelUser();
        return $mld->inscription($name, $firstname, $mail, $password);
    }

    public function delAdmin($mail, $pasword){
        $mdl = new ModelUser();
        $mdl->deleteUser(new User(null, null, $mail, $pasword));
    }

    public function delNews($news){
        $mdl = new ModelUser();
        $mdl->deleteNews($news);
    }

    public function getNbP(): int{
        $mdl = new ModelNbPage();
        return $mdl->getNbP();
    }

    public function upNbNPage($tVueErreur){
        $nb = $_POST['nbNews'];
        Validation::val_int($nb, $tVueErreur);
        $mdl = new ModelNbPage();
        $mdl->changeNbP($nb);
    }

    public function addFlux($tVueErreur){
        $title = $_POST['title'];
        $url = $_POST['url'];
        Validation::val_flux($title, $url,$tVueErreur);
        $mdlF = new ModelFlux();
        $mdlF->addFlux($title, $url);
    }

    public function delFlux($tVueErreur){
        $title = $_POST['title'];
        Validation::val_sting($title,$tVueErreur);
        $mdlF = new ModelFlux();
        $mdlF->delFlux($title);
    }
}