<?php
// verification de l'existance d'une session
include("../../script/php/global/verifierConnexion.php ");
include("../../script/php/connection/verificationExistanceAdmin.php ");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>page de connexion</title>
    </head>
    <body>
        <h1>formulaire de connexion</h1>
        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/php/global/verifierErreur.php");
        ?>
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="../../script/php/connection/verificationAdmin.php">
            <p><label for="emailUser"> Entrer votre email :<input type="email" name="emailUser" id="emailUser" required></label></p>
            <p><label for="passwordUser"> Entrer votre mot de passe<input type="password" name="passwordUser" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="passwordUser" required></label></p>
            <input type="submit" value="envoyer">
        </form>

        <!-- lien de retour sur la page d'acceuil -->
        <p>
            <a href="../index.php"><button>retour</button></a>
        </p>
        
        
    </body>
</html>