<?php

class ORM {

public $fields;

public function create($table, $fields){
    $cle = "";
    $valeur = "";
    foreach($fields as $key => $value){
        $cle .= "," . $key;
        $valeur .= ",:" . $key;
    }
    $colonne = substr($cle,1);
    $bind = substr($valeur,1);
    $query = "INSERT INTO " . $table . " (" . $colonne . ") VALUES (" . $bind . ")"; 
    echo $query;
    foreach($fields as $key => $value){
        $stmt->bindValue($key, $value, \PDO::PARAM_STR);
    }
}
}

$orm = new ORM();
$orm->create("articles", array('titre' => "un super titre",
'content' => "et voici un super article de blog",
'author' => "Rodrigue"));
