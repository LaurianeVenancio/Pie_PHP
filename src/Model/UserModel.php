<?php

namespace Model;

class UserModel extends \Core\Entity {

    private $orm;
    private $bdd;

    public function login($email){
        try {
            $this->bdd = new \PDO('mysql:host=localhost;dbname=piephp;charset=utf8', 'root', 'root');
        }
        catch (\Exception $erreur){
            echo "Echec de la connection à la base de données : $erreur";
        }
        $query = "SELECT id_user, email, password FROM user
                  WHERE 1 AND email= :email";
        $stmt = $this->bdd->prepare($query);
        $stmt->bindValue('email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        $login = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $login;
    }
}