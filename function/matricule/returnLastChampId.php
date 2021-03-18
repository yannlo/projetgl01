<?php 

function returnLastChampId($table ,$idChamp,$bdd){
    /**
     * 
     */
    
    
    $value =NULL;

    // recuperation du dernier champs de la table
    $request = $bdd -> query("SELECT $idChamp FROM $table ORDER BY $idChamp DESC LIMIT 1");

    // recuperation de la valeur de l'id du champs
    while($champ = $request ->fletch()){
        $value = $champ[$idChamp];
    }

    // returne la valeur de l'id
    return $value;
}

?>