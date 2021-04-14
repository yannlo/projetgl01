<?php

/**
 * ajouter un nouveau champ dans la table genre de la base de donnée
 */

   /**  initiallisation du code d'erreur
   * 0 -> aucun soucis
   * 1 -> insertion dans la base de donnee impossible 
   */ 
 
  $_SESSION['codeErreur']["value"] = 0;
  $_SESSION['codeErreur']["message"] ="ajout d'un nouveau genre effectuer";
  $_SESSION['codeErreur']["type"]="genre";

 // verification de l'ouveture,d'une session
 include("../global/verifierConnexion.php");

 // connexion a la base de donnee
 include("../global/connexionBDD.php");

 // verification de la reception des donnee par la methode post
 if(isset($_POST['nomGenre'])){
    // redefinition des variables
    $nom = htmlspecialchars($_POST['nomGenre']);
    

    // creation de la requete d'ajout genre
    $request = $bdd -> prepare("INSERT INTO genre (IDGENRE, CREATEGENRE, NOMGENRE) VALUES (:idgenre, :createGenre, :nom)");

    // generation et sauvegarde du matricule
    include("../../function/matricule/matriculeSimple.php");
    $matriculeGenre = matriculeSimple("genre","IDGENRE",$bdd);

    // insertion des valeurs dans la table
    try {
        $request ->execute(array(
            "idgenre" => $matriculeGenre,
            "createGenre" => $_SESSION['matricule'],
            "nom" => $nom
        ));
    
    } catch (Exception $e) {
        // modification du code d'erreur
        $_SESSION['codeErreur']["value"] = 1;
        $_SESSION['codeErreur']["message"] = $e -> getMessage();
        $_SESSION['codeErreur']["type"]="genre";

        // redirection sur la page d'affichage
        header('Location: ../../test/formulaire/formulaireAuteurEtGenre.php ');
        exit();
    }

        // mise a jour du code d'erreur
        $_SESSION['codeErreur']["value"] = 0;
        $_SESSION['codeErreur']["message"] ="ajout d'un nouveau genre effectuer";
        $_SESSION['codeErreur']["type"]="genre";


    // redirection sur la page d'affichage
    header('Location: ../../test/formulaire/formulaireAuteurEtGenre.php ');
    exit();

 }

?>