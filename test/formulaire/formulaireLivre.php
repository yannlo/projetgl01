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
        <title>page de livre</title>
    </head>
    <body>
        <h1>formulaire d'ajout de livre</h1>
        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/php/global/verifierErreur.php");
        ?>
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="../../script/php/book/ajouterLivre.php">
            <p><label for="titreLivre"> Entrer le titre du livre :<input type="text" name="titreLivre" id="titreLivre"></label></p>
            <p><label for="nbPageLivre"> Nombre de page :<input type="number" name="nbPageLivre" id="nbPageLivre" min="0"></label></p>
            <p>
                <label for="idAuteurLivre"> Selectionner l'auteur :</label>
                <select name="idAuteurLivre" id="idAuteurLivre">
                <?php
                // connexion a la base de donnee
                include("../../script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table classe
                $request = $bdd -> query("SELECT * FROM auteur ORDER BY IDAUTEUR");

                // affichage des information de classe
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['IDAUTEUR'].'">'.$champ['NOMAUTEUR'].'</option>';
                }
                ?>
                </select>
            </p>
            <p>
                <label for="idGenreLivre"> Selectionner le genre :</label>
                <select name="idGenreLivre" id="idGenreLivre">
                <?php
                // connexion a la base de donnee
                include("../../script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table classe
                $request = $bdd -> query("SELECT * FROM genre ORDER BY IDGENRE");

                // affichage des information de classe
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['IDGENRE'].'">'.$champ['NOMGENRE'].'</option>';
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