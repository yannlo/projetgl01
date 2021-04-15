<?php
include ("returnLastChampId.php");

// format matricule ="GES-AA-XXX";

function matriculeGenerateur($table, $idChamp, $bdd, $type){
    // 
    /**
     * generer un nouveau matricule a pour l'ajout dun nouveau gestionnaire
     * $table,$idChamp,$bdd
     * $type (STD => etudiant; CLS => classe ;
     *        GES => gestionaire; 
     *        EXP => exemplaire; LIV => livre)
     */

     // recuperation du dernier id de la table
    $value = returnLastChampId($table,$idChamp,$bdd);

    // formalisation de l'année du matricule
    $endYear = preg_split('#^20#',date('Y'));

    // verication de la valeur retourner
    if($value === 0 ){
        return $type.'-'. (string) $endYear[1] .'-001';
    }

    //extraction de l'année et de numero du matricule dans un tableau
    $tabInf = preg_split('#-#',$value);

    $numMatricule = "";
    // verification de l'annee du matricule

    if($tabInf[1] == $endYear[1]){
        // generation du matricule a partir du numero actuel
        $numMatricule = (string)((int)$tabInf[2] + 1);

        // formater la valeur du numero du matricule

        $numLetter = str_split($numMatricule);

        switch (count($numLetter)){

            case 1:
                $numMatricule ="00" . $numMatricule;
                break;

            case 2:
                $numMatricule ="0" . $numMatricule;
                break;

            case 3:
                break;

            default:
                $numMatricule = "000";
        }


    }else{
        // generation du premier matricule de l'annee en cour
        $numMatricule = "001";
    }

    // formalisation du matricule

    $matricule = $tabInf[0].'-'. (string)$endYear[1].'-'. $numMatricule;

    return $matricule;

    


    


}

?>