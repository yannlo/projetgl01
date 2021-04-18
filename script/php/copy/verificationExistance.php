<?php

// initiallisationdes code d'erreur
$codeErreur['code'] = 0;
$codeErreur['message'] = "creation des elements selectionner possible";

// connexion a la base de donnee
include("../global/connexionBDD.php");

// redaction de la requete de verification d'existance de classe
$request =$bdd-> query("SELECT * FROM livre WHERE DELETEL is NULL");

if ($request->rowCount() == 0){
    // modicication du code d'erreur
    $codeErreur['code'] = 1;
    $codeErreur['message'] = "impossible d'ajouter un exemplaire car aucun livre n'a ete cree";
}

 $result = json_encode($codeErreur);
 echo($result);


?>
