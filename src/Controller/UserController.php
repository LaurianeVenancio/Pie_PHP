<?php
namespace Controller;

class UserController extends \Core\Controller {

    public $verify;
    public $table;

    public function __construct(){
        $app = new \Core\Request();
        $this->verify = $app->treat();
    }

    public function redirectTo($page){
        header("Location: $page");
        exit;
    }

    public function registerAction(){

        $error = "";
        $table = "user";
        if(isset($this->verify["log_in"])){
            if (!empty($this->verify['email']) && !empty($this->verify['password'])) {
                $pw = password_hash($this->verify['password'], PASSWORD_DEFAULT);
                $this->verify['password'] = $pw;
                $app = new \Model\UserModel();
                $app->create($table, [ "email" => $this->verify["email"], 
                                        "password" => $this->verify["password"]]);
                $this->redirectTo('login');  
            }
            else {
                $error = "Merci de remplir les champs";
            }
        }
        $this->render("register", ['error' => $error]);

    }

    public function indexAction(){
        $this->render("index");
    }

    public function loginAction()
    {
        $error = "";
        if (isset($this->verify['connect'])){
            if (!empty($this->verify['email']) && !empty($this->verify['password'])){
                $email = $this->verify['email'];
                $obj = new \Model\UserModel();
                $login = $obj->login($email);
                $hash = $login["password"];
                if (password_verify($this->verify["password"], $hash) && $login['email'] == $this->verify['email']){
                    $_SESSION['id'] = $login['id_user'];
                    $this->redirectTo('profil');  
                }
                else {
                    $error = "Le email ou le mot de passe est incorrect";
                }
            }    
            else {
                $error = "Merci de remplir tout les champs";
            }
        }
        $this->render("login", ['error' => $error]);
    }

    public function profilAction(){

        $table = "user";
        if(isset($_SESSION["id"])){
            $id = $_SESSION["id"];
            $obj = new \Model\UserModel();
            $infos = $obj->read($table, $id);
            if (isset($this->verify['edit'])){
                $this->redirectTo('edit_profil');  
            }
            if (isset($this->verify['delete'])){
                $obj = new \Model\UserModel();
                $obj->delete($table, $id);
                $_SESSION = array();
                session_destroy();
                $this->redirectTo('login');
            }
            $email = $infos["email"];
            $this->render("profil", ['email' => $email]);
        }
        else {
            $this->redirectTo('login');  
        }
    }

    public function logoutAction(){
        if (isset($this->verify['logout'])){
            $_SESSION = array();
            $this->redirectTo('login');
        }
    }

    public function editAction(){

        $error = "";
        $table = "user";
        $id = $_SESSION["id"];
        if(isset($_SESSION["id"])){
            if (isset($this->verify['edit_profile'])){
                if((!empty($this->verify['email'])) && isset($this->verify['email'])) {
                    $new_email = $this->verify['email'];
                    $obj = new \Model\UserModel();
                    $obj->update($table, $id, [ "email" => $this->verify["email"]]);
                }
                else{
                    $error = "Merci de renseigner une nouvelle adresse mail";
                }
            }
            if (isset($this->verify['edit_pw'])){
                if((!empty($this->verify['password'])) && isset($this->verify['password'])) {
                    $password = password_hash($this->verify['password'], PASSWORD_DEFAULT);
                    $obj = new \Model\UserModel();
                    $obj->update($table, $id, ["password" => $password]);
                }
                else {
                    $error = "Merci de renseigner un nouveau mot de passe";
                }
            }
            $this->render("edit_profil", ['error' => $error]);
        }
        else {
            $this->redirectTo('login');  
        }
    }

    public function showAction(){
        $this->render("show");
    }
}