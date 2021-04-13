<?php

/**
 * ajouter un nouveau champ dans la table etudiant de la base de donnée
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
 if(isset($_POST['nomEtudiant']) AND isset($_POST['prenomEtudiant']) AND isset($_POST['adresseEtudiant']) AND isset($_POST['codeClasse'])){
    // redefinition des variables
    $nom = htmlspecialchars($_POST['nomEtudiant']);
    $prenom = htmlspecialchars($_POST['prenomEtudiant']);
    $adresse = htmlspecialchars($_POST['adresseEtudiant']);
    $codeClasse = $_POST['codeClasse'];

    // creation de la requete d'ajout de etudiant
    $request = $bdd -> prepare("INSERT INTO etudiant (MATRICULEE, CODECL , CREATEE, NOMG, PRENOMG,  ADRESSEE) VALUES (:matricule, :codel, :createe, :nom, :prenom,  :adresse)");

    // generation et sauvegarde du matricule
    include("../../function/matricule/matriculeGenerateur.php");
    $matriculeGestionnaire = matriculeGenerateur("etudiant","MATRICULEE",$bdd,"STD");

    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "matricule" => $matriculeGestionnaire,
            "codel" => $codeClasse,
            "createg" => $_SESSION['matricule'],
            "nom" => $nom,
            "prenom" => $prenom,
            "adresse" => $adresse
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