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
        <title>page de exemplaire</title>
    </head>
    <body>
        <h1>formulaire d'ajout d'exemplaire</h1>
        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/global/verifierErreur.php");
        ?>
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="../../script/copy/ajouterExemplaire.php">
            <p>
                <label for="idLivre"> Selectionner le livre :</label>
                <select name="idLivre" id="idLivre">
                <?php
                // connexion a la base de donnee
                include("../../script/global/connexionBDD.php");

                // requete de recuperation de champ de la table livre
                $request = $bdd -> query("SELECT * FROM livre ORDER BY TITREL");

                // affichage des information de livre
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['CODEL'].'">'.$champ['TITREL'].'</option>';
                }
                ?>
                </select>
            </p>

            <p>
                <label for="idEtat"> Selectionner l'etat :</label>
                <select name="idEtat" id="idEtat">
                <?php
                // connexion a la base de donnee
                include("../../script/global/connexionBDD.php");

                // requete de recuperation de champ de la table etat
                $request = $bdd -> query("SELECT * FROM etat ORDER BY IDETAT");

                // affichage des information de etat
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['IDETAT'].'">'.$champ['NOMETAT'].'</option>';
                }
                ?>
                </select>
            </p>
            <input type="submit" value="envoyer">
        </form>

        <!-- lien de retour sur la page d'acceuil -->
        <p>
            <a href="../index.php"><button>retour</button></a>
        </p>
        
        
    </body>
</html>