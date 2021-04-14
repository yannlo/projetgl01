<?php

/**
 * ajouter un nouveau champ dans la table livre de la base de donnée
 */

   /**  initiallisation du code d'erreur
   * 0 -> aucun soucis
   * 1 -> insertion dans la base de donnee impossible 
   */ 
  $_SESSION['codeErreur']["value"] = 0;
  $_SESSION['codeErreur']["message"] ="Ajout du livre effectuer";

 // verification de l'ouveture,d'une session
 include("../global/verifierConnexion.php");

 // connexion a la base de donnee
 include("../global/connexionBDD.php");

 // verification de la reception des donnee par la methode post
 if(isset($_POST['titreLivre']) AND isset($_POST['nbPageLivre']) AND isset($_POST['idAuteurLivre']) AND isset($_POST['idGenreLivre'])){
    // redefinition des variables
    $titre = htmlspecialchars($_POST['titreLivre']);
    $nbPage = $_POST['nbPageLivre'];
    $idAuteur = $_POST['idAuteurLivre'];
    $idGenre = $_POST['idGenreLivre'];

    // creation de la requete d'ajout de livre
    $request = $bdd -> prepare("INSERT INTO livre (CODEL, IDAUTEUR, IDGENRE, CREATEL, TITREL, NBPAGEL) VALUES (:code, :idAuteur, :idGenre, :createl, :titre, :nbPage)");

    // generation et sauvegarde du matricule
    include("../../function/matricule/matriculeGenerateur.php");
    $matriculeLivre = matriculeGenerateur("livre","CODEL",$bdd,"LIV");

    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "code" => $matriculeLivre,
            "idAuteur" => $idAuteur,
            "idGenre" => $idGenre,
            "createl" => $_SESSION['matricule'],
            "titre" => $titre,
            "nbPage" => $nbPage
        ));
    
    } catch (Exception $e) {
        // modification du code d'erreur
        $_SESSION['codeErreur']["value"] = 1;
        $_SESSION['codeErreur']["message"] = $e -> getMessage();

        // redirection sur la page d'affichage
        header('Location: ../../test/formulaire/formulaireLivre.php ');
        exit();
    }
    // mise a jour des code d'erreur
    $_SESSION['codeErreur']["value"] = 0;
    $_SESSION['codeErreur']["message"] ="Ajout du livre effectuer";

    // redirection sur la page d'affichage
    header('Location: ../../test/formulaire/formulaireLivre.php ');
    exit();

 }

?>