<?php
/**
 * Verifier si le information de connexion on etez envoyer ainsi que leur validiter
 */

 // verification de l'existance d'une session
 include("../../script/global/verifierConnexion.php");

  /**  initiallisation du code d'erreur
   * 0 -> aucun soucis
   * 1 -> information de connexion invalide
   * 2 -> aucune information envoyer
   */ 
 
  $_SESSION['codeErreur'] = 0; 

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

        // verification du mot de passe et de l'email
        if($champ["EMAILG"] == $email AND password_verify($password, $champ["MOTDEPASSEG"])){
            // initalisation de la session
            session_start();

            // enregistrement des informations de connexion
            $_SESSION["matricule"] = $champ["CODEG"];
            $_SESSION["nomAdmin"] = $champ["NOMG"];
            $_SESSION["prenomAdmin"] = $champ["PRENOMG"];
            header('Location: ../../test/index.php ');
            exit();
        }else{
            // modification du code d'erreur
            $_SESSION['codeErreur'] = 1;
            header('Location: ../../test/index.php ');
            exit();
        }
    }

}else{
    // modification du code d'erreur
    $_SESSION['codeErreur'] = 2;
    header('Location: ../../test/index.php ');
    exit();
}

?>