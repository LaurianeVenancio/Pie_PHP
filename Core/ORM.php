<?php

namespace Core{

class ORM {

    private $bdd;
    public $table;
    public $fields;
    public $id;
    public $params;


    public function __construct(){
        try {
            $this->bdd = new \PDO('mysql:host=localhost;dbname=piephp;charset=utf8', 'root', 'root');
        }
        catch (\Exception $erreur){
            echo "Echec de la connection à la base de données : $erreur";
        }
    }

    public function create ($table, $fields) {
        $cle = "";
        $valeur = "";
        foreach($fields as $key => $value){
            $cle .= ", " . $key;
            $valeur .= ", :" . $key;
        }
        $colonne = substr($cle,2);
        $bind = substr($valeur,2);
        $query = "INSERT INTO " . $table . " (" . $colonne . ") VALUES (" . $bind . ")";
        $stmt = $this->bdd->prepare($query);
        foreach($fields as $key => $value){
            $stmt->bindValue($key, $value, \PDO::PARAM_STR);
        }
        $stmt->execute();
    }

    public function read ($table, $id) {
        $id_table = "id_" . $table;
        $query = "SELECT * FROM " . $table . " WHERE " . $id_table . " = :id";
        $stmt = $this->bdd->prepare($query);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        $infos_user = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $infos_user;
    }

    public function read_all ($table){
        $query = "SELECT * FROM " . $table;
        $stmt = $this->bdd->prepare($query);
        $stmt->execute();
        $tab = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $tab;
    }

    public function update ($table, $id, $fields) {
        $up = "";
        $valeur="";
        $id_table = "id_" . $table;
        foreach($fields as $key => $value){
            $valeur .= ":" . $key;
            $up .= ", " . $key . " = " . $valeur;
        }
        $new = substr($up,1);
        $query = "UPDATE " . $table . " SET " . $new . " WHERE " . $id_table . " = :id";
        $stmt = $this->bdd->prepare($query);
        $stmt->bindValue('id', $id);
        foreach($fields as $key => $value){
            $stmt->bindValue($key, $value, \PDO::PARAM_STR);
        }
        $stmt->execute();
        //print_r($stmt->errorInfo());
    }

    public function delete ($table, $id) {
        $id_table = "id_" . $table;
        $query = "DELETE FROM " . $table . " WHERE " . $id_table . " = :id";
        $stmt = $this->bdd->prepare($query);
        $stmt->bindValue('id', $id);
        $stmt->execute();
    }

    // public function find ($table, $params = array(
    //     'WHERE' => '1',
    //     'ORDER BY' => 'id ASC',
    //     'LIMIT' => '')){
    // }    
}
}
