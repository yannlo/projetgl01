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
        <link rel="stylesheet" href="style/exemplaire.css">
        <link rel="stylesheet" href="style/styleFooter.css">
        <link rel="stylesheet" href="style/buttonAndSubmit.css">
        <title>BT - liste de exemplaire</title>
    </head>
    <body>
    <div class="containt">

<?php
// header
include("script/php/asset/header.php");
?>

<div class="center">
    <a href="livreEtExemplaire.php" class="btnAndSbt">Retour</a>
    <h1>liste de exemplaire</h1>
    <section class="listLivre">

    <?php 
    // verifier si un code d'erreur existe 
    include("script/php/global/verifierErreur.php");
    ?>


        <!-- tableau contenant les informations de chaque exemplaire -->
        <form method="post" action="script/php/copy/supprimerExemplaire.php" id="supForm">
        <div class="formElt">
            <a href="formulaireExemplaire.php" id="linkRedirection" class="btnAndSbt">ajouter</a>
            <input type="submit" value="supprimer" class="btnAndSbt">
        
        </div>
            <table>
                <tr>
                    <th>N°</th>
                    <th><input type="checkbox" value="all" name ="selector[]" class="selector"></th>
                    <th>Code</th>
                    <th>Nom Livre</th>
                    <th>Etat</th>
                    <th>Date d'ajout</th>
                </tr>
                <?php
                // connexion a la base de donnee
                include("script/php/global/connexionBDD.php ");

                // requete de selection des champs de la table exemplaire
                $request = $bdd -> query("SELECT * FROM exemplaire WHERE DELETEEXEMLPAIRE is null ORDER BY CODEL");

                // affichage de toute les valeurs dans un tableau
                $i=1;
                while($champ = $request -> fetch()){
                    // convertion d'affichage de date format francais
                    $date = preg_replace('#([0-9]{4})-([0-9]{2})-([0-9]{2})#',"$3/$2/$1",$champ['DATEAJOUTEXEMPLAIRE']);

                    // requete de selection des champs de la table livre
                    $request1 = $bdd -> query("SELECT * FROM livre WHERE CODEL ='".$champ['CODEL']."' ");

                    // requete de selection des champs de la table genre
                    $request2 = $bdd -> query("SELECT * FROM etat WHERE IDETAT ='".$champ['IDETAT']."' ");

                    // affichage de toute les valeurs dans un tableau
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><input type="checkbox" value="<?php echo $champ["CODEEXEMPLAIRE"]; ?>" name ="selector[]" class="selector"></td>
                            <td><?php echo $champ["CODEEXEMPLAIRE"]; ?></td>
                            <td><?php while($champ1 = $request1 -> fetch()){ echo $champ1["TITREL"];} ?></td>
                            <td><?php while($champ2 = $request2 -> fetch()){ echo $champ2["NOMETAT"];} ?></td>
                            <td><?php echo $date; ?></td>
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
        <script src="script/js/copy/supprimerExemplaireVerif.js"></script>
        <script src="script/js/copy/ajouterExemplaireVerif.js"></script>
        
    </body>
</html>