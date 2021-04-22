<?php
// verification de l'existance d'une session
include("script/php/global/verifierConnexion.php ");
include("script/php/connection/verifConnexionActive.php ");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style/styleGeneral.css">
        <link rel="stylesheet" href="style/styleHeader.css">
        <link rel="stylesheet" href="style/styleTableau.css">
        <link rel="stylesheet" href="style/formAuteurEtGenre.css">
        <link rel="stylesheet" href="style/styleFooter.css">
        <link rel="stylesheet" href="style/inputAndLabel.css">
        <link rel="stylesheet" href="style/buttonAndSubmit.css">
        <title>BT - formulaire d'auteur et de genre</title>
    </head>
    <body>
    <div class="containt">

<?php
// header
include("script/php/asset/header.php");
?>

<div class="center">
    <a href="listeAuteurEtGenre.php" class="btnAndSbt">Retour</a>
    <section class="listAuteurEtGenre">
        <h1>liste de auteur</h1>
        <div id="auteur">
        <?php 
        // verifier si un code d'erreur existe 
        if(isset($_SESSION['codeErreur']) AND $_SESSION['codeErreur']['type']==="auteur"){
            include("script/php/global/verifierErreur.php");
        }
        ?>
        
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="script/php/genreAndAuthor/ajouterAuteur.php">
            <p><label for="nomAuteur"> Entrer votre nom de l'auteur:<input type="text" name="nomAuteur" id="nomAuteur"></label></p>
            <input type="submit" value="envoyer" class="btnAndSbt">
        </form>

    </div>

    <h1>formulaire d'ajout de genre</h1>
    <div id="genre">
        <?php 
        // verifier si un code d'erreur existe 
        if(isset($_SESSION['codeErreur']) AND $_SESSION['codeErreur']['type']==="genre"){
            include("script/php/global/verifierErreur.php");
        }
        ?>
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="script/php/genreAndAuthor/ajouterGenre.php">
            <p><label for="nomGenre"> Entrer votre nom du genre:<input type="text" name="nomGenre" id="nomGenre"></label></p>
            <input type="submit" value="envoyer" class="btnAndSbt">
        </form>

        </div>
    </section>
            </div>


            <?php
            // footer
            include("script/php/asset/footer.php");
            ?>
        </div>


        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </body>
</html>