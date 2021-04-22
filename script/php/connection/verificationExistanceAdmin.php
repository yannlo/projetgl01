<?php

/** 
 * Verifier si un administrateur existe deja
*/ 

// connexion a la base de donnee
 include("script/php/global/connexionBDD.php ");

// recuperation de la liste des gestionnaire
 $request = $bdd ->query("SELECT * FROM gestionnaire");

// verifier que la liste n'est pas vide
if($request->rowCount() == 0){
    // redirection vers le formulaire d'ajout de gestionnaire
    header("Location: test/formulaire/formulaireGestionnaire.php");
    exit();
}

?>