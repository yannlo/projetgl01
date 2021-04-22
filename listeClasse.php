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
        <link rel="stylesheet" href="style/emprunt.css">
        <link rel="stylesheet" href="style/styleFooter.css">
        <link rel="stylesheet" href="style/buttonAndSubmit.css">
        <title>BT - liste de classe</title>
    </head>
    <body>
    <div class="containt">

<?php
// header
include("script/php/asset/header.php");
?>

<div class="center">
    <a href="classeEtEtudiant.php" class="btnAndSbt">Retour</a>
    <h1>liste de classe</h1>
    <section class="listEmprunt">

        <?php 
        // verifier si un code d'erreur existe 
        include("script/php/global/verifierErreur.php");
        ?>

        <!-- tableau contenant les informations de chaque Classe -->
        <form method="post" action="script/php/classroom/supprimerClasse.php" id="supForm">
        <div class="formElt">
            <a href="formulaireClasse.php" class="btnAndSbt">ajouter</a>
            <input type="submit" value="supprimer" class="btnAndSbt">

        </div>
            <table>
                <tr>
                    <th>N°</th>
                    <th><input type="checkbox" value="all" name ="selector[]" class="selector"></th>
                    <th>Code</th>
                    <th>Nom</th>
                </tr>
                <?php
                // connexion a la base de donnee
                include("script/php/global/connexionBDD.php ");

                // requete de selection des champs de la table classe
                $request = $bdd -> query("SELECT * FROM classe WHERE DELETECL is null ORDER BY LIBELLECL");

                // affichage de toute les valeurs dans un tableau
                $i=1;
                while($champ = $request -> fetch()){
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><input type="checkbox" value="<?php echo $champ["CODECL"]; ?>" name ="selector[]" class="selector"></td>
                    <td><?php echo $champ["CODECL"]; ?></td>
                    <td><?php echo $champ["LIBELLECL"]; ?></td>
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
        <script src="script/js/classroom/supprimerClasseVerif.js"></script>
        
    </body>
</html>