<?php

/**
 * ajouter un nouveau champ dans la table auteur de la base de donnée
 */

// verification de l'ouveture,d'une session
include("../global/verifierConnexion.php");

/**  initiallisation du code d'erreur
* 0 -> aucun soucis
* 1 -> insertion dans la base de donnee impossible 
*/ 
 
  $_SESSION['codeErreur']["value"] = 0;
  $_SESSION['codeErreur']["message"] ="ajout d'un nouveau auteur effectuer";
  $_SESSION['codeErreur']["type"]="auteur";



 // connexion a la base de donnee
 include("../global/connexionBDD.php");

 // verification de la reception des donnee par la methode post
 if(isset($_POST['nomAuteur'])){
    // redefinition des variables
    $nom = htmlspecialchars($_POST['nomAuteur']);
    

    // creation de la requete d'ajout auteur
    $request = $bdd -> prepare("INSERT INTO auteur ( IDAUTEUR, CREATEAUTEUR, NOMAUTEUR) VALUES (:idauteur, :createAuteur, :nom)");

        // generation et sauvegarde du matricule
        include("../../function/matricule/matriculeSimple.php");
        $matriculeAuteur = matriculeSimple("auteur","IDAUTEUR",$bdd);

    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "idauteur" => $matriculeAuteur,
            "createAuteur" => $_SESSION['matricule'],
            "nom" => $nom
        ));
    
    } catch (Exception $e) {
        // modification du code d'erreur
        $_SESSION['codeErreur']["value"] = 1;
        $_SESSION['codeErreur']["message"] = $e -> getMessage();
        $_SESSION['codeErreur']["type"]="auteur";

        // redirection sur la page d'affichage
        header('Location: ../../test/formulaire/formulaireAuteurEtGenre.php ');
        exit();
    }


    // redirection sur la page d'affichage
    header('Location: ../../test/formulaire/formulaireAuteurEtGenre.php ');
    exit();

 }

?>