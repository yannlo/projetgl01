<?php
/**
 * Verifier si le information de connexion on etez envoyer ainsi que leur validiter
 */

 // verification de l'existance d'une session
 include("../global/verifierConnexion.php");

  /**  initiallisation du code d'erreur
   * 0 -> aucun soucis
   * 1 -> information de connexion invalide
   * 2 -> aucune information envoyer
   */ 
 
  $_SESSION['codeErreur']["value"] = 0;
  $_SESSION['codeErreur']["message"] ="connexion du gestionnaire effectuer";

 // verifier si les informatino de connexion on bien etez envoyer avec la methode post
if(isset($_POST['emailUser']) AND isset($_POST['passwordUser'])){

    // redefinition des variable
    $email = $_POST['emailUser'];
    $password = $_POST['passwordUser'];

    // connexion a la base de donnee
    include("../global/connexionBDD.php ");

    // recuperation de l'email et du mot de passe dans la base de donnee
    $request = $bdd ->query("SELECT * FROM gestionnaire");

    // teste des valeurs recuperer par la requete
    while($champ = $request ->fetch()){
        print_r($champ);

        // verification du mot de passe et de l'email
        if($champ["EMAILG"] == $email AND password_verify($password, $champ["MOTDEPASSEG"])){

            if($champ["DELETEG"]==null){
                // enregistrement des informations de connexion
                $_SESSION["matricule"] = $champ["CODEG"];
                $_SESSION["nomAdmin"] = $champ["NOMG"];
                $_SESSION["prenomAdmin"] = $champ["PRENOMG"];

                header('Location: ../../../test/formulaire/formulaireConnexion.php ');
                exit();
            }
            else{
                $_SESSION['codeErreur']["value"] = 1;
                $_SESSION['codeErreur']["message"] ="compte admin supprimer";    
                header('Location: ../../../test/formulaire/formulaireConnexion.php ');
                exit();
            }
        }
    }

    // modification du code d'erreur
    $_SESSION['codeErreur']["value"] = 1;
    $_SESSION['codeErreur']["message"] ="information de connexion invalide";
    header('Location: ../../../test/formulaire/formulaireConnexion.php ');
    exit();

}

?>