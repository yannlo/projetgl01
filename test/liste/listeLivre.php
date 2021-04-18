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
        <h1>liste de livre</h1>

        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/php/global/verifierErreur.php");
        ?>

        <!-- tableau contenant les informations de chaque livre -->
        <form method="post" action="../../script/php/book/supprimerLivre.php">
            <a href="../formulaire/formulaireLivre.php">ajouter</a>
            <input type="submit" value="supprimer">
            <table>
                <tr>
                    <th>N°</th>
                    <th>Code</th>
                    <th><input type="checkbox" value="all" name ="selector[]" class="selector"></th>
                    <th>Nom</th>
                    <th>Auteur</th>
                    <th>Genre</th>
                    <th>Nb de page</th>
                </tr>
                <?php
                // connexion a la base de donnee
                include("../../script/php/global/connexionBDD.php ");

                // requete de selection des champs de la table livre
                $request = $bdd -> query("SELECT * FROM livre WHERE DELETEL is null ORDER BY TITREL");

                // affichage de toute les valeurs dans un tableau
                $i=1;
                while($champ = $request -> fetch()){
                    // requete de selection des champs de la table auteur
                    $request1 = $bdd -> query("SELECT * FROM auteur WHERE IDAUTEUR ='".$champ['IDAUTEUR']."' ");

                    // requete de selection des champs de la table genre
                    $request2 = $bdd -> query("SELECT * FROM genre WHERE IDGENRE ='".$champ['IDGENRE']."' ");

                    // affichage de toute les valeurs dans un tableau
                    ?>
                        <tr>
                            <th><?php echo $i; ?></th>
                            <th><?php echo $champ["CODEL"]; ?></th>
                            <th><input type="checkbox" value="<?php echo $champ["CODEL"]; ?>" name ="selector[]" class="selector"></th>
                            <th><?php echo $champ["TITREL"]; ?></th>
                            <th><?php while($champ1 = $request1 -> fetch()){ echo $champ1["NOMAUTEUR"];} ?></th>
                            <th><?php while($champ2 = $request2 -> fetch()){ echo $champ2["NOMGENRE"];} ?></th>
                            <th><?php echo $champ["NBPAGEL"]; ?></th>
                        </tr>

                    <?php
                    $i++;
                }

                ?>

            </table>
        </form>


        <!-- lien de retour sur la page d'acceuil -->
        <p>
            <a href="../index.php"><button>retour</button></a>
        </p>
        
        <script src="../../script/js/global/selectAll.js"></script>
        
    </body>
</html>