<?php

/**
 * ajouter un nouveau champ dans la table classe de la base de donnée
 */

   // verification de l'ouveture d'une session
   include("../global/verifierConnexion.php");

   /**  initiallisation du code d'erreur
   * 0 -> aucun soucis
   * 1 -> insertion dans la base de donnee impossible 
   */ 
 
  $_SESSION['codeErreur']["value"] = 0;
  $_SESSION['codeErreur']["message"] ="Ajout du classe effectuer";



 // connexion a la base de donnee
 include("../global/connexionBDD.php");

 // verification de la reception des donnee par la methode post
 if(isset($_POST['libelleClasse'])){
    // redefinition des variables
    $libelle = htmlspecialchars($_POST['libelleClasse']);
 

    // creation de la requete d'ajout de classe
    $request = $bdd -> prepare("INSERT INTO classe (CODECL, CREATECL, LIBELLECL) VALUES (:code, :createcl, :libelle)");

    // generation et sauvegarde du matricule
    include("../../../function/matricule/matriculeGenerateur.php");
    $matriculeLivre = matriculeGenerateur("classe","CODECL",$bdd,"CLS");

    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "code" => $matriculeLivre,
            "createcl" => $_SESSION['matricule'],
            "libelle" => $libelle
        ));
    
    } catch (Exception $e) {
        // modification du code d'erreur
        $_SESSION['codeErreur']["value"] = 1;
        $_SESSION['codeErreur']["message"] = $e -> getMessage();

        // redirection sur la page d'affichage
        header('Location: ../../../test/formulaire/formulaireClasse.php ');
        exit();
    }

    
    // redirection sur la page d'affichage
    header('Location: ../../../test/formulaire/formulaireClasse.php ');
    exit();

 }

?>