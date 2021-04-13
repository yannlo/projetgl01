<?php

/**
 * ajouter un nouveau champ dans la table exemplaire de la base de donnée
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
 if(isset($_POST['idLivre']) AND isset($_POST['idEtat'])){
    // redefinition des variables
    $idLivre = $_POST['idLivre'];
    $idGenre = $_POST['idGenreLivre'];

    // creation de la requete d'ajout d'exemplaire
    $request = $bdd -> prepare("INSERT INTO exemplaire (CODEEXEMPLAIRE, CODEL, IDETAT, CREATEEXEMPLAIRE, DATEAJOUTEXEMPLAIRE) VALUES (:code, :codeLivre, :idEtat, :createExemplaire, :dateAjout)");

    // generation et sauvegarde du matricule
    include("../../function/matricule/matriculeGenerateur.php");
    $matriculeExemplaire = matriculeGenerateur("exemplaire","CODEEXEMPLAIRE",$bdd,"EXP");

    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "code" => $matriculeExemplaire,
            "codeLivre" => $idLivre,
            "idEtat" => $idGenre,
            "createExemplaire" => $_SESSION['matricule'],
            "dateAjout" => date("Y-m-d")
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