<?php
// verification de l'existance d'une session
include("../../script/global/verifierConnexion.php ");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>page de gestionnaire</title>
    </head>
    <body>
        <h1>formulaire d'ajout de gestionnaire</h1>
        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/global/verifierErreur.php");

        ?>
        
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="../../script/admin/ajouterGestionnaire.php">
            <p><label for="nomAdmin"> Entrer votre nom :<input type="text" name="nomAdmin" id="nomAdmin"></label></p>
            <p><label for="prenomAdmin"> Entrer votre prenom :<input type="text" name="prenomAdmin" id="prenomAdmin"></label></p>
            <p><label for="emailAdmin"> Entrer votre email :<input type="email" name="emailAdmin" id="emailAdmin"></label></p>
            <p><label for="passwordAdmin"> Entrer votre mot de passe :<input type="password" name="passwordAdmin" id="passwordAdmin"></label></p>
            <p><label for="contactAdmin"> Entrer votre numero de telephone :<input type="tel" name="contactAdmin" id="contactAdmin"></label></p>
            <input type="submit" value="envoyer">
        </form>

        <!-- lien de retour sur la page d'acceuil -->
        <p>
            <a href="../index.php"><button>retour</button></a>
        </p>
        
        
    </body>
</html>