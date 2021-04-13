<?php

/**
 * ajouter un nouveau champ dans la table auteur de la base de donnée
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
 if(isset($_POST['nomAuteur'])){
    // redefinition des variables
    $nom = htmlspecialchars($_POST['nomAuteur']);
    

    // creation de la requete d'ajout auteur
    $request = $bdd -> prepare("INSERT INTO auteur ( CREATEAUTEUR, NOMAUTEUR) VALUES (:createAuteur, :nom)");

    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "createAuteur" => $_SESSION['matricule'],
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