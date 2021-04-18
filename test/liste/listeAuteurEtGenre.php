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
        <title>page de auteur et genre</title>
    </head>
    <body>

    <div id="auteur">
        <h1>liste de auteur</h1>

        <?php 
        // verifier si un code d'erreur existe 
        if(isset($_SESSION['codeErreur']) AND $_SESSION['codeErreur']['type']==="auteur"){
            include("../../script/php/global/verifierErreur.php");
        }
        ?>

        <!-- tableau contenant les informations de chaque auteur -->
        <form method="post" action="../../script/php/genreAndAuthor/supprimerAuteur.php" id="supForm">
            <a href="../formulaire/formulaireAuteurEtGenre.php">ajouter</a>
            <input type="submit" value="supprimer" >
            <table>
                <tr>
                    <th>N°</th>
                    <th>Code</th>
                    <th><input type="checkbox" value="all" name ="selector[]" class="selector"></th>
                    <th>Nom</th>
                </tr>
                <?php
                // connexion a la base de donnee
                include("../../script/php/global/connexionBDD.php ");

                // requete de selection des champs de la table auteur
                $request = $bdd -> query("SELECT * FROM auteur WHERE DELETEAUTEUR is null ORDER BY NOMAUTEUR");

                // affichage de toute les valeurs dans un tableau
                $i=1;
                while($champ = $request -> fetch()){
                ?>
                <tr>
                    <th><?php echo $i; ?></th>
                    <th><?php echo $champ["IDAUTEUR"]; ?></th>
                    <th><input type="checkbox" value="<?php echo $champ["IDAUTEUR"]; ?>" name ="selector[]" class="selector"></th>
                    <th><?php echo $champ["NOMAUTEUR"]; ?></th>
                </tr>

                <?php
                $i++;
                }

                ?>

            </table>
        </form>
    </div>

    <div id="genre">
        <h1>liste de genre</h1>

        <?php 
        // verifier si un code d'erreur existe 
        if(isset($_SESSION['codeErreur']) AND $_SESSION['codeErreur']['type']==="genre"){
            include("../../script/php/global/verifierErreur.php");
        }
        ?>

        <!-- tableau contenant les informations de chaque genre -->
        <form method="post" action="../../script/php/genreAndAuthor/supprimerGenre.php" id="supForm1">
            <a href="../formulaire/formulaireAuteurEtGenre.php">ajouter</a>
            <input type="submit" value="supprimer">
            <table>
                <tr>
                    <th>N°</th>
                    <th>Code</th>
                    <th><input type="checkbox" value="all" name ="selector[]" class ="selector1"></th>
                    <th>Nom</th>
                </tr>
                <?php
                // connexion a la base de donnee
                include("../../script/php/global/connexionBDD.php ");

                // requete de selection des champs de la table genre
                $request = $bdd -> query("SELECT * FROM genre WHERE DELETEGENRE is null ORDER BY NOMGENRE");

                // affichage de toute les valeurs dans un tableau
                $i=1;
                while($champ = $request -> fetch()){
                ?>
                <tr>
                    <th><?php echo $i; ?></th>
                    <th><?php echo $champ["IDGENRE"]; ?></th>
                    <th><input type="checkbox" value="<?php echo $champ["IDGENRE"]; ?>" name ="selector[]" class="selector1"></th>
                    <th><?php echo $champ["NOMGENRE"]; ?></th>
                </tr>

                <?php
                $i++;
                }

                ?>

            </table>
        </form>
    </div>
 


        <!-- lien de retour sur la page d'acceuil -->
        <p>
            <a href="../index.php"><button>retour</button></a>
        </p>
        
        <script src="../../script/js/global/selectAll.js"></script>
        <script src="../../script/js/genreAndAuthor/supprimerAuteurVerif.js"></script>
        <script src="../../script/js/genreAndAuthor/supprimerGenreVerif.js"></script>
        
    </body>
</html>