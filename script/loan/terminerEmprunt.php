<?php

/**
 * supprimer l'ensemble de valeur selectionner
 */


    // verification de l'ouveture d'une session
    include("../global/verifierConnexion.php");

    /**  initiallisation du code d'erreur
    * 0 -> aucun soucis
    * 1 -> insertion dans la base de donnee impossible 
    */ 
  
   $_SESSION['codeErreur']["value"] = 0;
   $_SESSION['codeErreur']["message"] ="Fin des emprunts suivant: <br/>";
 
 
 
  // connexion a la base de donnee
  include("../global/connexionBDD.php");
 
  // verification de la reception des donnee par la methode post
  if(isset($_POST['selector'])){

     // redefinition des variables
     $selector = $_POST['selector'];


    // creation de la requete de supression de livre
    $request = $bdd -> prepare("UPDATE emprunt SET FINEMPRUNT = :fin WHERE MATRICULEE = :matricule AND CODEEXEMPLAIRE= :code AND DEBUTEMPRUNT = :debut ");


    // supression des valeurs dans la table
    for($i=0;$i<count($selector);$i++){
        // separation des information de la chaine
        $tableauSeparationValeur = preg_split('# #',$selector[$i]);
        print_r($tableauSeparationValeur);
        
        // tentative d'insertion dans la table
        try {
            $request ->execute(array(
                "fin" => date("Y-m-d"),
                "matricule" => $tableauSeparationValeur[0],
                "code" => $tableauSeparationValeur[1],
                "debut" =>$tableauSeparationValeur[2]
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
            header('Location: ../../test/liste/listeEmprunt.php ');
            exit();
        }
    }
    
 
     // redirection sur la page d'affichage
     header('Location: ../../test/liste/listeEmprunt.php ');
     exit();
 
  }
 
 ?>


?>