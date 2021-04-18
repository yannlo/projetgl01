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
        <title>page de classe</title>
    </head>
    <body>
        <h1>formulaire d'ajout de classe</h1>
        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/php/global/verifierErreur.php");
        ?>
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="../../script/php/classroom/ajouterClasse.php">
            <p><label for="libelleClasse"> Entrer votre nom de la classe:<input type="text" name="libelleClasse" id="libelleClasse"></label></p>
            <input type="submit" value="envoyer">
        </form>

        <!-- lien de retour sur la page d'acceuil -->
        <p>
            <a href="../index.php"><button>retour</button></a>
        </p>
        
        
    </body>
</html>