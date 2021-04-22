<?php

/**
 * ajouter un nouveau champ dans la table etudiant de la base de donnée
 */


 // verification de l'ouveture,d'une session
 include("../global/verifierConnexion.php");

    /**  initiallisation du code d'erreur
   * 0 -> aucun soucis
   * 1 -> insertion dans la base de donnee impossible 
   */ 
 
  $_SESSION['codeErreur']["value"] = 0;
  $_SESSION['codeErreur']["message"] ="ajout d'un nouveau etudiant effectuer";

 // connexion a la base de donnee
 include("../global/connexionBDD.php");

 // verification de la reception des donnee par la methode post
 if(isset($_POST['nomEtudiant']) AND isset($_POST['prenomEtudiant']) AND isset($_POST['adresseEtudiant']) AND isset($_POST['codeClasse'])){
    // redefinition des variables
    $nom = htmlspecialchars(strtoupper($_POST['nomEtudiant']));
    $prenom = htmlspecialchars(ucwords($_POST['prenomEtudiant']));
    $adresse = htmlspecialchars($_POST['adresseEtudiant']);
    $codeClasse = $_POST['codeClasse'];

    // creation de la requete d'ajout de etudiant
    $request = $bdd -> prepare("INSERT INTO etudiant (MATRICULEE, CODECL , CREATEE, NOME, PRENOME,  ADRESSEE) VALUES (:matricule, :codel, :createe, :nom, :prenom,  :adresse)");

    // generation et sauvegarde du matricule
    include("../../../function/matricule/matriculeGenerateur.php");
    $matriculeEtudiant = matriculeGenerateur("etudiant","MATRICULEE",$bdd,"STD");

    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "matricule" => $matriculeEtudiant,
            "codel" => $codeClasse,
            "createe" => $_SESSION['matricule'],
            "nom" => $nom,
            "prenom" => $prenom,
            "adresse" => $adresse
        ));
    
    } catch (Exception $e) {
        // modification du code d'erreur
        $_SESSION['codeErreur']["value"] = 1;
        $_SESSION['codeErreur']["message"] = $e -> getMessage();
        
        // redirection sur la page d'affichage
        header('Location: ../../../listeEtudiant.php ');
        exit();
    }

    // redirection sur la page d'affichage
    header('Location: ../../../listeEtudiant.php ');
    exit();

 }

?>