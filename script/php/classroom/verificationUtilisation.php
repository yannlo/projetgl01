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
    $request =$bdd-> query("SELECT * FROM Etudiant WHERE DELETEE is NULL");

    // initialisation de message d'erreur
    $message="";

    // verification de l'utilisation de la classe
    while($champ = $request -> fetch()){


        // verification pour l'ensemble des valeur receptionner
        for($i=0;$i<count($selector);$i++){

            // verification de l'utilisation de la classe
            if($selector[$i] == $champ["CODECL"]){
                $codeErreur['code'] = 2;
                $message .= $champ["CODECL"]." || ";
            }
        }
    }

    // formatage du message d'erreur
    if($codeErreur['code']==2){
        $codeErreur['message']="les classes suivantes ne peuvent etre supprimer:  ";
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