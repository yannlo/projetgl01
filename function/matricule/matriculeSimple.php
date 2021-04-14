<?php

include ("returnLastChampId.php");
// effectue une incrementation pour des id

function matriculeSimple($table, $idChamp, $bdd){
    // 
    /**
     * generer un nouveau matricule a pour l'ajout dun nouveau gestionnaire
     * $table,$idChamp,$bdd
     */

     // recuperation du dernier id de la table
    $value = returnLastChampId($table,$idChamp,$bdd);


    // verication de la valeur retourner
    if($value === 0 ){
        return 1 ;
    }else{
        return $value +1;
    }

}
?>