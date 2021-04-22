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
        <link rel="stylesheet" href="style/formExemplaire.css">
        <link rel="stylesheet" href="style/styleFooter.css">
        <link rel="stylesheet" href="style/buttonAndSubmit.css">
        <link rel="stylesheet" href="style/inputAndLabel.css">
        <title>BT - Formulaire d'ajout de classe</title>
    </head>
    <body>
    <div class="containt">
            
            <?php
// header
include("script/php/asset/header.php");
?>

<div class="center">
    <a href="listeClasse.php" class="btnAndSbt">Retour</a>
    <h1>formulaire d'ajout de classe</h1>
    <section class="listEmprunt">
        
        <?php 
        // verifier si un code d'erreur existe 
        include("script/php/global/verifierErreur.php");
        ?>

        
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="script/php/classroom/ajouterClasse.php">
            <p><label for="libelleClasse"> Entrer votre nom de la classe:<input type="text" name="libelleClasse" id="libelleClasse"></label></p>
            <input type="submit" value="envoyer" class="btnAndSbt">
        </form>
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