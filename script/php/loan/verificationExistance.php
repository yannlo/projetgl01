<?php

// initiallisationdes code d'erreur
$codeErreur['code'] = 0;
$codeErreur['message'] = "creation des elements selectionner possible";

// connexion a la base de donnee
include("../global/connexionBDD.php");

// redaction de la requete de verification d'existance de exmplaire et de etudiant
$request =$bdd-> query("SELECT * FROM exemplaire WHERE DELETEEXEMLPAIRE is NULL");
$request1 =$bdd-> query("SELECT * FROM etudiant WHERE DELETEE is NULL");

if ($request->rowCount() == 0 && $request1->rowCount() == 0 ){
    // modicication du code d'erreur
    $codeErreur['code'] = 1;
    $codeErreur['message'] = "impossible de debuter un emprunt car aucun exemplaire ni etudiant n'existe";
}
else if($request->rowCount() == 0){
        // modicication du code d'erreur
        $codeErreur['code'] = 1;
        $codeErreur['message'] = "impossible de debuter un emprunt car aucun exemplaire n'existe";
}
else if($request1->rowCount() == 0){
    // modicication du code d'erreur
    $codeErreur['code'] = 1;
    $codeErreur['message'] = "impossible de debuter un emprunt car aucun etudiant n'existe";
}

 $result = json_encode($codeErreur);
 echo($result);


?>
