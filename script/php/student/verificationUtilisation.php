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
    $request =$bdd-> query("SELECT * FROM emprunt WHERE FINEMPRUNT is NULL");

    // initialisation de message d'erreur
    $message="";

    // verification de l'utilisation des information de l'etudiant
    while($champ = $request -> fetch()){


        // verification pour l'ensemble des valeur receptionner
        for($i=0;$i<count($selector);$i++){

            // verification de l'utilisation de l'etudiant
            if($selector[$i] == $champ["MATRICULEE"]){
                $codeErreur['code'] = 2;
                $message .= $champ["MATRICULEE"]."<br/>";
            }
        }
    }

    // formatage du message d'erreur
    if($codeErreur['code']==2){
        $codeErreur['message']="les etudiant suivantes ne peuvent etre supprimer: </br>";
        $codeErreur['message'] .=$message;
    }


}else {
    // modicication du code d'erreur
    $codeErreur['code'] = 1;
    $codeErreur['message'] = "aucun element selectionner";

}

 $result = json_encode($codeErreur);
 echo($result);


?>