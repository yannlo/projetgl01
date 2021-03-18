<?php
include ("returnLastChampId.php");

// format matricule ="GES-AA-XXX";

function matriculeGestionnaire($value){
    /**
     * generer un nouveau matricule a pour l'ajout dun nouveau gestionnaire
     * $table,$idChamp,$bdd
     */

     // recuperation du dernier id de la table
    // $value = returnLastChampId($table,$idChamp,$bdd);
    //extraction de l'année et de numero du matricule dans un tableau

    $tabInf = preg_split('#^GES-{2}-{3}$#',$value);
    print_r($tabInf);


    


}

?>