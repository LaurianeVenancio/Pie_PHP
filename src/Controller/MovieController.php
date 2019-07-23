<?php
namespace Controller;

class MovieController extends \Core\Controller {

    public $verify;

    public function __construct(){
        $app = new \Core\Request();
        $this->verify = $app->treat();
    }

    public function redirectTo($page){
        header("Location: $page");
        exit;
    }

    public function homeAction(){
        
        $error = "";
        $table = "film";
        if(isset($_SESSION["id"])){
            $obj = new \Model\MovieModel();
            $films = $obj->read_all($table);
            if (isset($this->verify["add_film"])){
                if (!empty($this->verify['titre']) && !empty($this->verify['resum'])) {
                    $app = new \Model\MovieModel();
                    $app->create($table, ["titre" => $this->verify["titre"], 
                                          "resum" => $this->verify["resum"]]);
                    $this->redirectTo('home');  
                }
                else {
                    $error = "Merci de remplir les champs";
                }
            }
            if (isset($this->verify['delete'])){
                $liste = $_POST["del"];
                if(!empty($liste)){
                    foreach ($liste as $id_film){
                        $obj = new \Model\MovieModel();
                        $obj->delete($table, $id_film);
                    }
                    $this->redirectTo('home');  
                }
                else {
                    $error = "Merci de renseigner des films a supprimer";
                }
            }
            $this->render("home", ['films' => $films, 'error'=> $error]);
        }
        else {
            $this->redirectTo('login');  
        }
    }

    public function detailAction(){

        $error = "";
        $table = "film";
        $id = $_GET["id_film"];
        if(isset($_SESSION["id"])){
            $obj = new \Model\MovieModel();
            $film = $obj->read($table, $id);
            if (isset($this->verify['edit_film'])){
                if((!empty($this->verify['resum'])) && isset($this->verify['resum'])) {
                    $obj = new \Model\MovieModel();
                    $obj->update($table, $id, [ "resum" => $this->verify["resum"]]);
                    $this->redirectTo("detail?id_film=" . $id);  
                }
                else{
                    $error = "Merci de renseigner un nouveau résumé";
                }
            }
        }
        $this->render("detail", ['film' => $film, 'error' => $error]);
    }
}