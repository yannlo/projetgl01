<?php 

function returnLastChampId($table ,$idChamp,$bdd){
    /**
     *  return l'id du dernier champ d'une table
     */
    
    $value =NULL;

    // recuperation du dernier champs de la table
    $request = $bdd -> query("SELECT * FROM $table ORDER BY $idChamp DESC LIMIT 1");

    
    // verifier si la table est vide
    $colcount = $request->rowCount();
    if($colcount == 0){
        return 0;
    }else
    {
        // recuperation de la valeur de l'id du champs
        while($champ = $request -> fetch()){
            $value = $champ[$idChamp];
        }
    
        // returne la valeur de l'id
        return $value;
    }


}

?>