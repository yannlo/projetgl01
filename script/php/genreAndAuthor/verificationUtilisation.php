<?php

// initiallisationdes code d'erreur
$codeErreur['code'] = 0;
$codeErreur['message'] = "supression des elements selectionner possible";

// verification de reception de donnees
if(isset($_POST['selector'])){
    // redefinition des variables
    $selector = $_POST['selector'];

    // connexion a la base de donnee
    include("../global/connexionBDD.php");
    
    // redaction de la requete
    $request =$bdd-> query("SELECT * FROM livre WHERE DELETEL is NULL");

    // initialisation de message d'erreur
    $message="";
    
    // obtention du nom de l'auteur
    
    
    // verification de l'utilisation des information de auteur
    while($champ = $request -> fetch()){
        
        
        // verification pour l'ensemble des valeur receptionner
        for($i=0;$i<count($selector);$i++){
            
            // verification de l'utilisation de auteur
            if($selector[$i] == $champ["IDAUTEUR"]){
                $codeErreur['code'] = 2;
                $request2 =$bdd-> query("SELECT * FROM auteur WHERE IDAUTEUR ='".$selector[$i]."'");
                while($champ2 = $request2 -> fetch()){
                    $message .= $champ2["NOMAUTEUR"].", ";
                }
            }
        }
    }

    // formatage du message d'erreur
    if($codeErreur['code']==2){
        $codeErreur['message']="les auteurs suivantes ne peuvent etre supprimer: ";
        $codeErreur['message'] .= $message;
    }


}else {
    // modicication du code d'erreur
    $codeErreur['code'] = 1;
    $codeErreur['message'] = "aucun element selectionner";

}

 $result = json_encode($codeErreur);
 echo($result);


?>