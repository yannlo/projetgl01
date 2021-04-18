<?php

/**
 * ajouter un nouveau champ dans la table gestionnaire de la base de donnée
 */

// verification de l'ouveture,d'une session
include("../global/verifierConnexion.php");

   /**  initiallisation du code d'erreur
   * 0 -> aucun soucis
   * 1 -> insertion dans la base de donnee impossible 
   */ 
 
  $_SESSION['codeErreur']["value"] = 0;
  $_SESSION['codeErreur']["message"] ="Ajout du gestionnaire effectuer";



 // connexion a la base de donnee
 include("../global/connexionBDD.php");

 // verification de la reception des donnee par la methode post
 if(isset($_POST['nomAdmin']) AND isset($_POST['prenomAdmin']) AND isset($_POST['emailAdmin']) AND isset($_POST['passwordAdmin']) AND isset($_POST['contactAdmin'])){
    // redefinition des variables
    $nom = htmlspecialchars(strtoupper($_POST['nomAdmin']));
    $prenom = htmlspecialchars(ucwords($_POST['prenomAdmin']));
    $email = htmlspecialchars($_POST['emailAdmin']);
    $password = password_hash($_POST['passwordAdmin'],PASSWORD_DEFAULT) ;
    $contact = $_POST['contactAdmin'];

    // creation de la requete d'ajout de gestionnaire
    $request = $bdd -> prepare("INSERT INTO gestionnaire (CODEG, CREATEG ,NOMG, PRENOMG, EMAILG, MOTDEPASSEG, CONTACTG) VALUES (:code, :createg, :nom, :prenom,  :email, :motDePasse, :contact)");

    // generation et sauvegarde du matricule
    include("../../../function/matricule/matriculeGenerateur.php");
    $matriculeGestionnaire = matriculeGenerateur("gestionnaire","CODEG",$bdd,"GES");

    // verification de l'existance d'un gestionnaire
    if(isset($_SESSION['matricule'])){

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
        
        } catch (Exception $e) {
            // modification du code d'erreur
            $_SESSION['codeErreur']["value"] = 1;
            $_SESSION['codeErreur']["message"] = $e -> getMessage();
            
            // redirection sur la page d'affichage
            header('Location: ../../../test/formulaire/formulaireGestionnaire.php ');
            exit();
        }

    }else{

        // insertion des valeurs dans la table
        try {
            $request ->execute(array(
                "code" => $matriculeGestionnaire,
                "createg" => NULL,
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "motDePasse" => $password,
                "contact" => $contact
            ));
        
        } catch (Exception $e) {
            // modification du code d'erreur
            $_SESSION['codeErreur']["value"] = 1;
            $_SESSION['codeErreur']["message"] = $e -> getMessage();
            
            // redirection sur la page d'affichage
            header('Location: ../../../test/formulaire/formulaireGestionnaire.php  ');
            exit();
        }


    }

    // redirection sur la page d'affichage
    header('Location: ../../../test/formulaire/formulaireGestionnaire.php  ');
    exit();

 }

?>