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
        <link rel="stylesheet" href="style.styleTableau.css">
        <title>page de genstionnaire</title>
    </head>
    <body>
        <h1>liste de genstionnaire</h1>

        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/global/verifierErreur.php");
        ?>

        <!-- tableau contenant les informations de chaque genstionnaire -->
        <form method="post" action="../../script/admin/supprimerGestionnaire.php">
            <input type="submit" value="supprimer">
            <table>
                <tr>
                    <th>N°</th>
                    <th>Code</th>
                    <th><input type="checkbox" value="all" name ="selector[]"></th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Contact</th>

                </tr>
                <?php
                // connexion a la base de donnee
                include("../../script/global/connexionBDD.php ");

                // requete de selection des champs de la table gesntionnaire
                $request = $bdd -> query("SELECT * FROM gestionnaire WHERE DELETEG is null ORDER BY NOMG");

                // affichage de toute les valeurs dans un tableau
                $i=1;
                while($champ = $request -> fetch()){
                ?>
                <tr>
                    <th><?php echo $i; ?></th>
                    <th><?php echo $champ["CODEG"]; ?></th>
                    <th><input type="checkbox" value="<?php echo $champ["CODEG"]; ?>" name ="selector[]"></th>
                    <th><?php echo $champ["NOMG"].' '.$champ["PRENOMG"]; ?></th>
                    <th><?php echo $champ["EMAILG"]; ?></th>
                    <th><?php echo $champ["CONTACTG"]; ?></th>
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
        
        
    </body>
</html>