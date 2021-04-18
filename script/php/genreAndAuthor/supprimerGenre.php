<?php

/**
 * supprimer l'ensemble de valeur selectionner
 */
print_r($_POST);

    // verification de l'ouveture d'une session
    include("../global/verifierConnexion.php");

    /**  initiallisation du code d'erreur
    * 0 -> aucun soucis
    * 1 -> insertion dans la base de donnee impossible 
    */ 
  
   $_SESSION['codeErreur']["value"] = 0;
   $_SESSION['codeErreur']["message"] ="Suppression des genres suivante: <br/>";
   $_SESSION['codeErreur']['type']="genre";
 
 
 
  // connexion a la base de donnee
  include("../global/connexionBDD.php");
 
  // verification de la reception des donnee par la methode post
  if(isset($_POST['selector'])){

     // redefinition des variables
     $selector = $_POST['selector'];

    // creation de la requete de supression de genre
    $request = $bdd -> prepare("UPDATE genre SET DELETEGENRE = :deleteG WHERE IDGENRE = :idG");


    // supression des valeurs dans la table
    for($i=0;$i<count($selector);$i++){
        if($selector[$i]!='all'){
            
            try {
                $request ->execute(array(
                    "deleteG" => $_SESSION['matricule'],
                    "idG" => $selector[$i]
                ));
                $_SESSION['codeErreur']["message"].="- $selector[$i] <br/> ";
            
            } catch (Exception $e) {
                // modification du code d'erreur
                $_SESSION['codeErreur']["value"] = 1;
    
                // verification de la premier suppression
                if($i == 0){
                    $_SESSION['codeErreur']["message"] = $e -> getMessage();
                }else{
                    $_SESSION['codeErreur']["message"] .= $e -> getMessage();
                }
    
                // redirection sur la page d'affichage
                header('Location: ../../../test/liste/listeAuteurEtGenre.php ');
                exit();
            }
        }
    }
    
 
 
     // redirection sur la page d'affichage
     header('Location: ../../../test/liste/listeAuteurEtGenre.php ');
     exit();
 
  }
 
 ?>


?>