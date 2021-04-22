<?php


// verification de l'existance d'une session
include("script/php/global/verifierConnexion.php ");
include("script/php/connection/verifConnexionActive.php ");


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/classeEtEtudiant.css">
    <link rel="stylesheet" href="style/linkStyle.css">
    <link rel="stylesheet" href="style/buttonAndSubmit.css">
    <link rel="stylesheet" href="style/styleHeader.css">
    <link rel="stylesheet" href="style/styleFooter.css">
    <link rel="stylesheet" href="style/styleGeneral.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>BT - Classe et étudiant</title>
</head>
<body>


    <div id="containt">

    
    <?php
    // header
    include("script/php/asset/header.php");
    ?>
        <section id="part1">
            <a href="index.php" class="btnAndSbt">Retour</a>
            <h1>Page de classe et étudiant</h1>

            <div class="linkStyle">
                <a href="listeClasse.php" class="linkStyleComp"><span>Listes des classes</span></a>
                <a href="listeEtudiant.php" class="linkStyleComp"><span>Listes des etudiants</span></a>
            </div>

        </section>



    <?php
    // footer
    include("script/php/asset/footer.php");
    ?>

    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
</body>
</html>