<?php

/**
 * ajouter un nouveau champ dans la table genre de la base de donnée
 */

   /**  initiallisation du code d'erreur
   * 0 -> aucun soucis
   * 1 -> insertion dans la base de donnee impossible 
   */ 
 
  $_SESSION['codeErreur'] = 0; 

 // verification de l'ouveture,d'une session
 include("../global/verifierConnexion.php");

 // connexion a la base de donnee
 include("../global/connexionBDD.php");

 // verification de la reception des donnee par la methode post
 if(isset($_POST['nomGenre'])){
    // redefinition des variables
    $nom = htmlspecialchars($_POST['nomGenre']);
    

    // creation de la requete d'ajout genre
    $request = $bdd -> prepare("INSERT INTO genre ( CREATEGENRE, NOMGENRE) VALUES (:createGenre, :nom)");

    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "createGenre" => $_SESSION['matricule'],
            "nom" => $nom
        ));
    
    } catch (\Throwable $th) {
        // modification du code d'erreur
        $_SESSION['codeErreur'] = 1; 

        // redirection sur la page d'affichage
        header('Location: ../../test/index.php ');
        exit();
    }

    // redirection sur la page d'affichage
    header('Location: ../../test/index.php ');
    exit();

 }

?>