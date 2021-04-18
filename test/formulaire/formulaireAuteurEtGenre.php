<?php
// verification de l'existance d'une session
include("../../script/php/global/verifierConnexion.php ");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>page d'auteur et de genre</title>
    </head>
    <body>
    <div id="auteur">
        <h1>formulaire d'ajout d'auteur</h1>
        <?php 
        // verifier si un code d'erreur existe
        if(isset($_SESSION['codeErreur']) AND $_SESSION['codeErreur']['type']==="auteur"){
            include("../../script/php/global/verifierErreur.php");
        }
        ?>
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="../../script/php/genreAndAuthor/ajouterAuteur.php">
            <p><label for="nomAuteur"> Entrer votre nom de l'auteur:<input type="text" name="nomAuteur" id="nomAuteur"></label></p>
            <input type="submit" value="envoyer">
        </form>

    </div>

    <div id="genre">
        <h1>formulaire d'ajout de genre</h1>
        <?php 
        // verifier si un code d'erreur existe 
        if(isset($_SESSION['codeErreur']) AND $_SESSION['codeErreur']['type']==="genre"){
            include("../../script/php/global/verifierErreur.php");
        }
        ?>
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="../../script/php/genreAndAuthor/ajouterGenre.php">
            <p><label for="nomGenre"> Entrer votre nom du genre:<input type="text" name="nomGenre" id="nomGenre"></label></p>
            <input type="submit" value="envoyer">
        </form>

    </div>
        
    <!-- lien de retour sur la page d'acceuil -->
    <p>
        <a href="../index.php"><button>retour</button></a>
    </p>
        
    </body>
</html>