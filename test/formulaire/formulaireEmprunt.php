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
        <title>page de emprunt</title>
    </head>
    <body>
        <h1>formulaire d'ajout d'emprunt</h1>
        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/php/global/verifierErreur.php");
        ?>
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="../../script/php/loan/ajouterEmprunt.php">
            <p>
                <label for="matriculeEtudiant"> Selectionner l'etudiant :</label>
                <select name="matriculeEtudiant" id="matriculeEtudiant">
                <?php
                // connexion a la base de donnee
                include("../../script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table etudiant
                $request = $bdd -> query("SELECT * FROM etudiant ORDER BY NOME ");

                // affichage des information de eleve
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['MATRICULEE'].'">'.$champ['NOME'].' '.$champ['PRENOME'].'</option>';
                }
                ?>
                </select>
            </p>

            <p>
                <label for="codeExemplaire"> Selectionner l'exemplaire :</label>
                <select name="codeExemplaire" id="codeExemplaire">
                <?php
                // connexion a la base de donnee
                include("../../script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table exemplaire
                $request = $bdd -> query("SELECT * FROM exemplaire ORDER BY CODEEXEMPLAIRE");

                // recuperation des information de exemplaire
                while($champ = $request -> fetch()){
                    // requete de recuperation de champ de la table livre
                    $request1 = $bdd -> query("SELECT * FROM livre ORDER BY TITREL");
                    // affichage des information de classe
                    while($champ1 = $request1 -> fetch()){
                        echo '<option value="'.$champ['CODEEXEMPLAIRE'].'">'.$champ1['TITREL'].'</option>';

                    }

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