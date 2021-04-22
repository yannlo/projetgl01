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
        <link rel="stylesheet" href="style/livre.css">
        <link rel="stylesheet" href="style/styleFooter.css">
        <link rel="stylesheet" href="style/buttonAndSubmit.css">
        <title>BT - liste de livre</title>
    </head>
    <body>
    <div class="containt">

<?php
// header
include("script/php/asset/header.php");
?>

<div class="center">

    <a href="livreEtExemplaire.php" class="btnAndSbt">Retour</a>
    <h1>liste de livres</h1>
    <section class="listLivre">


        <?php 
        // verifier si un code d'erreur existe 
        include("script/php/global/verifierErreur.php");
        ?>

        <!-- tableau contenant les informations de chaque livre -->
        <form method="post" action="script/php/book/supprimerLivre.php" id="supForm">
        <div class="formElt">
            <a href="formulaireLivre.php" id="linkRedirection" class="btnAndSbt">ajouter</a>
            <input type="submit" value="supprimer" class="btnAndSbt">
        </div>
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
                include("script/php/global/connexionBDD.php ");

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
                            <td><?php echo $i; ?></td>
                            <td><?php echo $champ["CODEL"]; ?></td>
                            <td><input type="checkbox" value="<?php echo $champ["CODEL"]; ?>" name ="selector[]" class="selector"></td>
                            <td><?php echo $champ["TITREL"]; ?></td>
                            <td><?php while($champ1 = $request1 -> fetch()){ echo $champ1["NOMAUTEUR"];} ?></td>
                            <td><?php while($champ2 = $request2 -> fetch()){ echo $champ2["NOMGENRE"];} ?></td>
                            <td><?php echo $champ["NBPAGEL"]; ?></td>
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
        <script src="script/js/book/supprimerLivreVerif.js"></script>
        <script src="script/js/book/ajouterLivreVerif.js"></script>
        
    </body>
</html>