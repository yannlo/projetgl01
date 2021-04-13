<?php
include("../script/global/verifierConnexion.php ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Page de test</h1>
    <?php 

    if(isset($_SESSION['matricule']) ){
        echo "<p> bienvenue </p>";

    }else if(isset($_SESSION['codeErreur'])){
            if($_SESSION['codeErreur'] == 1){
                echo "<p> information de connexion invalide </p>";
            }else if($_SESSION['codeErreur'] == 2){
                echo "<p> aucune information envoyer </p>";
            }
            
    }
    session_destroy();
    
    // $bdd = new PDO('mysql:host=localhost;dbname=projetgl1','yannlo','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // include("../function/matricule/matriculeGenerateur.php");
    

    // $newMatricule = matriculeGenerateur("gestionnaire","CODEG",$bdd,"GES");
    // // echo "<p> $newMatricule </p>";

    
    // include("../function/other/getListEltTab.php");
    // $newTab = getListEltTab("gestionnaire",$bdd);



    // for($i =0;$i<count($newTab);$i++) {
    //     for($j =0;$j<count($newTab[$i])/2;$j++) {
    //         echo "<p>". (string) $newTab[$i][$j]. "</p>";
    //     }
    // }
    ?>

    <form method="POST" action="../script/connection/verificationAdmin.php">
        <p><label for="emailUser"> Entrer votre email :<input type="email" name="emailUser" id="emailUser"></label></p>
        <p><label for="passwordUser"> Entrer votre mot de passe<input type="password" name="passwordUser" id="passwordUser"></label></p>
        <input type="submit" value="envoyer">
    </form>

    
    
</body>
</html>