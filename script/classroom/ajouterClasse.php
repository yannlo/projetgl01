<?php

/**
 * ajouter un nouveau champ dans la table classe de la base de donnée
 */

   /**  initiallisation du code d'erreur
   * 0 -> aucun soucis
   * 1 -> insertion dans la base de donnee impossible 
   */ 
 
  $_SESSION['codeErreur'] = 0; 

 // verification de l'ouveture d'une session
 include("../global/verifierConnexion.php");

 // connexion a la base de donnee
 include("../global/connexionBDD.php");

 // verification de la reception des donnee par la methode post
 if(isset($_POST['libelleClasse'])){
    // redefinition des variables
    $libelle = htmlspecialchars($_POST['libelleClasse']);
 

    // creation de la requete d'ajout de classe
    $request = $bdd -> prepare("INSERT INTO classe (CODECL, LIBELLECL) VALUES (:code, :libelle)");

    // generation et sauvegarde du matricule
    include("../../function/matricule/matriculeGenerateur.php");
    $matriculeLivre = matriculeGenerateur("classe","CODECL",$bdd,"CLS");

    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "code" => $matriculeLivre,
            "libelle" => $libelle
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