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
    
    $bdd = new PDO('mysql:host=localhost;dbname=projetgl1','yannlo','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    include("../function/matricule/matriculeGenerateur.php");
    $newMatricule = matriculeGenerateur("gestionnaire","CODEG",$bdd,"GES");
    // echo "<p> $newMatricule </p>";


    include("../function/other/getListEltTab.php");
    $newTab = getListEltTab("gestionnaire",$bdd);


    for($i =0;$i<count($newTab);$i++) {
        for($j =0;$j<count($newTab[$i])/2;$j++) {
            echo "<p>". (string) $newTab[$i][$j]. "</p>";
        }
    }
    ?>
    
</body>
</html>