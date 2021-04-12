<?php 

function returnLastChampId($table ,$idChamp,$bdd){
    /**
     *  return l'id du dernier champ d'une table
     */
    
    $value =NULL;

    // recuperation du dernier champs de la table
    $request = $bdd -> query("SELECT $idChamp FROM $table ORDER BY $idChamp DESC LIMIT 1");

    // recuperation de la valeur de l'id du champs

    $colcount = $request->rowCount();

    // verifier si la table est vide
    if($colcount == 0){
        return 0;
    }else
    {
        while($champ = $request ->fletch()){
            $value = $champ[$idChamp];
        }
    
        // returne la valeur de l'id
        return $value;
    }


}

?>