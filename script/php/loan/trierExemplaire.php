<?php


 // verification de l'ouveture d'une session
 include("../global/connexionBDD.php");

if(isset($_POST['code'])){
    $code = $_POST['code'];
    if($code=="none"){
        $request = $bdd -> query("SELECT * FROM  exemplaire WHERE DELETEEXEMLPAIRE is null");
        $options ="";
        while($champ = $request->fetch()){
            $options .='<option value="'.$champ['CODEEXEMPLAIRE'].'">'.$champ['CODEEXEMPLAIRE'].'</option>';
        }
        $tab = ["resultat"=>$options];
        $tab = json_encode($tab);

    }else{

        // creation de la requete d'ajout d'emprunt
        $request = $bdd -> prepare("SELECT * FROM  exemplaire WHERE  CODEL = :code AND DELETEEXEMLPAIRE is null");
        $request->execute(array(':code' =>$code));
        $options ="";
        while($champ = $request->fetch()){
            $options .='<option value="'.$champ['CODEEXEMPLAIRE'].'">'.$champ['CODEEXEMPLAIRE'].'</option>';
        }
        $tab = ["resultat"=>$options];
        $tab = json_encode($tab);

    }
    echo($tab);

}

?>