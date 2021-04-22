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
    <link rel="stylesheet" href="style/livreEtExemlpaire.css">
    <link rel="stylesheet" href="style/linkStyle.css">
    <link rel="stylesheet" href="style/buttonAndSubmit.css">
    <link rel="stylesheet" href="style/styleHeader.css">
    <link rel="stylesheet" href="style/styleFooter.css">
    <link rel="stylesheet" href="style/styleGeneral.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>BT - livre et exemplaire</title>
</head>
<body>


    <div id="containt">

    
    <?php
    // header
    include("script/php/asset/header.php");
    ?>
        <section id="part1">
            <a href="index.php" class="btnAndSbt">Retour</a>
            <h1>Page de livre et exemplaire</h1>

            <div class="linkStyle">
                <a href="listeLivre.php" class="linkStyleComp"><span>Listes des livres</span></a>
                <a href="listeExemplaire.php" class="linkStyleComp"><span>Listes des exemplaires</span></a>
                <a href="listeAuteurEtGenre.php" class="linkStyleComp"><span>Listes des genres et auteurs</span></a>
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