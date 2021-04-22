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
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/linkStyle.css">
    <link rel="stylesheet" href="style/styleHeader.css">
    <link rel="stylesheet" href="style/styleFooter.css">
    <link rel="stylesheet" href="style/styleGeneral.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>BT - Acceuil</title>
</head>
<body>


    <div id="containt">

    
    <?php
    // header
    include("script/php/asset/header.php");
    ?>
        <section id="part1">
            <h1>Page d'acceuil</h1>

            <?php 
            // verifier si un code d'erreur existe 
            include("script/php/global/verifierErreur.php");
            ?>

            <div class="linkStyle">
                <a href="listeEmprunt.php" class="linkStyleComp"><span>Listes des emprunts</span></a>
                <a href="livreEtExemplaire.php" class="linkStyleComp"><span>Listes des livres et exemplaires</span></a>
                <a href="classeEtEtudiant.php" class="linkStyleComp"><span>Listes des classes et etudiants</span></a>
                <a href="listeGestionnaire.php" class="linkStyleComp"><span>Listes des gestionnaires</span></a>
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