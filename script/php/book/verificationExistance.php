<?php

// initiallisationdes code d'erreur
$codeErreur['code'] = 0;
$codeErreur['message'] = "creation des elements selectionner possible";

// connexion a la base de donnee
include("../global/connexionBDD.php");

// redaction de la requete de verification d'existance de auteur et de genre
$request =$bdd-> query("SELECT * FROM auteur WHERE DELETEAUTEUR is NULL");
$request1 =$bdd-> query("SELECT * FROM genre WHERE DELETEGENRE is NULL");

if ($request->rowCount() == 0 && $request1->rowCount() == 0 ){
    // modicication du code d'erreur
    $codeErreur['code'] = 1;
    $codeErreur['message'] = "impossible d'ajouter un livre car aucun genre ni auteur n'existe";
}else if($request->rowCount() == 0){
        // modicication du code d'erreur
        $codeErreur['code'] = 1;
        $codeErreur['message'] = "impossible d'ajouter un livre car aucun auteur n'existe";
}else if($request1->rowCount() == 0){
    // modicication du code d'erreur
    $codeErreur['code'] = 1;
    $codeErreur['message'] = "impossible d'ajouter un livre car aucun genre n'existe";
}

 $result = json_encode($codeErreur);
 echo($result);


?>
