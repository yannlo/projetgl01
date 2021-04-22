<?php
// verification de l'existance d'une session
include("script/php/global/verifierConnexion.php ");
include("script/php/connection/verifConnexionActive.php ");

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
        <link rel="stylesheet" href="style/styleTableau.css">
        <link rel="stylesheet" href="style/gestionnaire.css">
        <link rel="stylesheet" href="style/styleFooter.css">
        <link rel="stylesheet" href="style/buttonAndSubmit.css">
        <title>BT - liste des gestionnaires</title>
    </head>
    <body>
    <div class="containt">

            <?php
            // header
            include("script/php/asset/header.php");
            ?>

            <div class="center">
                <a href="index.php" class="btnAndSbt">Retour</a>
                <h1>listes des gestionnaires</h1>
                <section class="listGestionnaire">

        <?php 
        // verifier si un code d'erreur existe 
        include("script/php/global/verifierErreur.php");
        ?>

        <!-- tableau contenant les informations de chaque genstionnaire -->
        <form method="post" action="script/php/admin/supprimerGestionnaire.php" id="supForm">
        <div class="formElt">
            <a href="#" class="btnAndSbt">ajouter</a>
            <input type="submit" value="supprimer" class="btnAndSbt">
        </div>
            <table>
                <tr>
                    <th>N°</th>
                    <th>Code</th>
                    <th><input type="checkbox" value="all" name ="selector[]" class ="selector"></th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Contact</th>

                </tr>
                <?php
                // connexion a la base de donnee
                include("script/php/global/connexionBDD.php ");

                // requete de selection des champs de la table gesntionnaire
                $request = $bdd -> query("SELECT * FROM gestionnaire WHERE DELETEG is null ORDER BY NOMG");

                // affichage de toute les valeurs dans un tableau
                $i=1;
                while($champ = $request -> fetch()){
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $champ["CODEG"]; ?></td>
                    <td><input type="checkbox" value="<?php echo $champ["CODEG"]; ?>" name ="selector[]"  class ="selector"></td>
                    <td><?php echo $champ["NOMG"].' '.$champ["PRENOMG"]; ?></td>
                    <td><?php echo $champ["EMAILG"]; ?></td>
                    <td><?php echo $champ["CONTACTG"]; ?></td>
                </tr>

                <?php
                $i++;
                }

                ?>

            </table>
        </form>
        </section>
            </div>


            <?php
            // footer
            include("script/php/asset/footer.php");
            ?>
        </div>


        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="script/js/global/selectAll.js"></script>
        <script src="script/js/admin/supprimerGestionnaireVerif.js"></script>
    </body>
</html>