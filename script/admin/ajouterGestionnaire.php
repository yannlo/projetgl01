<?php

/**
 * ajouter un nouveau champ dans la table gestionnaire de la base de donnée
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
 if(isset($_POST['nomAdmin']) AND isset($_POST['prenomAdmin']) AND isset($_POST['emailAdmin']) AND isset($_POST['passwordAdmin']) AND isset($_POST['contactAdmin'])){
    // redefinition des variables
    $nom = htmlspecialchars($_POST['nomAdmin']);
    $prenom = htmlspecialchars($_POST['prenomAdmin']);
    $email = htmlspecialchars($_POST['emailAdmin']);
    $password = password_hash($_POST['passwordAdmin'],PASSWORD_DEFAULT) ;
    $contact = $_POST['contactAdmin'];

    // creation de la requete d'ajout de gestionnaire
    $request = $bdd -> prepare("INSERT INTO gestionnaire (CODEG, CREATEG ,NOMG, PRENOMG, EMAILG, MOTDEPASSEG, CONTACTG) VALUES (:code, :createg, :nom, :premon,  :email, :motDePasse, :contact)");

    // generation et sauvegarde du matricule
    include("../../function/matricule/matriculeGenerateur.php");
    $matriculeGestionnaire = matriculeGenerateur("gestionnaire","CODEG",$bdd,"GES");

    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "code" => $matriculeGestionnaire,
            "createg" => $_SESSION['matricule'],
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "motDePasse" => $password,
            "contact" => $contact
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