<?php

/**
 * ajouter un nouveau champ dans la table emprunt de la base de donnée
 */

 // verification de l'ouveture d'une session
 include("../global/verifierConnexion.php");

    /**  initiallisation du code d'erreur
   * 0 -> aucun soucis
   * 1 -> insertion dans la base de donnee impossible 
   */ 
  $_SESSION['codeErreur']["value"] = 0;
  $_SESSION['codeErreur']["message"] ="Ajout de l'emprunt effectuer";

 // connexion a la base de donnee
 include("../global/connexionBDD.php");

 // verification de la reception des donnee par la methode post
 if(isset($_POST['matriculeEtudiant']) AND isset($_POST['codeExemplaire'])){
    // redefinition des variables
    $matricule = $_POST['matriculeEtudiant'];
    $codeEx = $_POST['codeExemplaire'];

    // creation de la requete d'ajout d'emprunt
    $request = $bdd -> prepare("INSERT INTO emprunt (MATRICULEE, CODEEXEMPLAIRE, DEBUTEMPRUNT) VALUES (:matricule, :code, :debut)");


    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "matricule" => $matricule,
            "code" => $codeEx,
            "debut" => date("Y-m-d")
        ));
    } catch (Exception $e) {
        // modification du code d'erreur
        $_SESSION['codeErreur']["value"] = 1;
        $_SESSION['codeErreur']["message"] = $e -> getMessage();

        // redirection sur la page d'affichage
        header('Location: ../../test/formulaire/formulaireLivre.php ');
        exit();
    }

    // redirection sur la page d'affichage
    header('Location: ../../test/formulaire/formulaireEmprunt.php ');
    exit();

 }

?>