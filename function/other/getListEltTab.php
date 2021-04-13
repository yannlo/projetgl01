<?php

function getListEltTab($table,$bdd){

    /**
     * la fonction retourne dans un tableau l'ensemble des valeurs d'une table
     */

    // recuperation de l'ensemble des champs de la table
    $request = $bdd -> query("SELECT * FROM $table");


    // verifier si la table est vide
    $colcount = $request->rowCount();
    if($colcount == 0){
        return 0;
    }
    else{
        $value=array();

        // recuperation de la valeur de l'ensemble des champs
        while($champ = $request -> fetch()){
            array_push($value, $champ);
        }
    
        // returne le tableau contenant les valeur
        return $value; 
    }

}

?>