<?php
// verification de l'existance d'une session
include("script/php/global/verifierConnexion.php ");
include("script/php/connection/verificationExistanceAdmin.php ");
include("script/php/connection/verifConnexionActive2.php ");


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
    <link rel="stylesheet" href="style/styleFooter.css">
    <link rel="stylesheet" href="style/buttonAndSubmit.css">
    <link rel="stylesheet" href="style/inputAndLabel.css">
    <link rel="stylesheet" href="style/connexion.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>BT - Connexion</title>
</head>
<body>
    <div id="containt">

    <?php
    // header
    include("script/php/asset/header.php");
    ?>

    <div class="center">
        <section id="connectionForm">
            <h1>Connectez-vous</h1>
            <?php 
            // verifier si un code d'erreur existe 
            include("script/php/global/verifierErreur.php");
            ?>
            <!-- formulaire de connexion a la platform -->
            <form method="POST" action="script/php/connection/verificationAdmin.php">
                <p><label for="emailUser"> Entrer votre email :<input type="email" name="emailUser" id="emailUser" required></label></p>
                <p><label for="passwordUser"> Entrer votre mot de passe<input type="password" name="passwordUser" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="passwordUser" required></label></p>
                <p><a href="#" id="forget">Mot de passe oublié?</a></p>
                <input type="submit" value="envoyer" class="btnAndSbt">
            </form>
        
        </section>
    </div>


    <?php
    // footer
    include("script/php/asset/footer.php");
    ?>

    </div>
    
</body>
</html>