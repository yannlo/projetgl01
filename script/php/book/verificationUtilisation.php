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
    $request =$bdd-> query("SELECT * FROM exemplaire WHERE DELETEEXEMLPAIRE is NULL");

    // initialisation de message d'erreur
    $message="";

    // verification de l'utilisation de la livre
    while($champ = $request -> fetch()){


        // verification pour l'ensemble des valeur receptionner
        for($i=0;$i<count($selector);$i++){

            // verification de l'utilisation de la livre
            if($selector[$i] == $champ["CODEL"]){
                $codeErreur['code'] = 2;
                $message .= $champ["CODEL"]."<br/>";
            }
        }
    }

    // formatage du message d'erreur
    if($codeErreur['code']==2){
        $codeErreur['message']="les livres suivantes ne peuvent etre supprimer: </br>";
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