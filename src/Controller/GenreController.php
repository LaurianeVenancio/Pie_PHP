<?php
namespace Controller;

class GenreController extends \Core\Controller {

    public $verify;

    public function __construct(){
        $app = new \Core\Request();
        $this->verify = $app->treat();
    }

    public function redirectTo($page){
        header("Location: $page");
        exit;
    }

    public function detailAction(){

        $error = "";
        $id = $_GET["id_film"];
        if(isset($_SESSION["id"])){
            $table = "film";
            $obj = new \Model\MovieModel();
            $film = $obj->read($table, $id);
            if (!is_null($film['id_genre'])){
                $table = "genre";
                $id = $film["id_genre"];
                $obj = new \Model\GenreModel();
                $genre = $obj->read($table, $id);
            }
        }
        $this->render("detail", ['film' => $film, 'genre' => $genre]);
    }
}