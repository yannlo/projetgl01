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
        <title>BT - liste des emprunts</title>
    </head>
    <body>
        <div class="containt">

            <?php
            // header
            include("script/php/asset/header.php");
            ?>

            <div class="center">
                <a href="index.php" class="btnAndSbt">Retour</a>
                <h1>liste de emprunt</h1>
                <section class="listEmprunt">

                    <?php 
                    // verifier si un code d'erreur existe 
                    include("script/php/global/verifierErreur.php");
                    ?>

                    <!-- tableau contenant les informations de chaque emprunt -->
                    <form method="post" action="script/php/loan/terminerEmprunt.php" id="supForm">
                        <div class="formElt">
                            <a href="formulaireEmprunt.php" id="linkRedirection" class="btnAndSbt">debuter</a>
                            <input type="submit" value="terminer" class="btnAndSbt">
                        </div>
                        <table>
                            <tr>
                                <th>N°</th>
                                <th><input type="checkbox" value="all" name ="selector[]" class="selector"></th>
                                <th>Nom Etudiant</th>
                                <th>Nom Livre</th>
                                <th>Date Debut</th>
                            </tr>
                            <?php
                            // connexion a la base de donnee
                            include("script/php/global/connexionBDD.php ");

                            // requete de selection des champs de la table emprunt
                            $request = $bdd -> query("SELECT * FROM emprunt WHERE FINEMPRUNT is null ORDER BY DEBUTEMPRUNT");


                            // affichage de toute les valeurs dans un tableau
                            $i=1;
                            while($champ = $request -> fetch()){

                                // convertion d'affichage de date format francais
                                $date = preg_replace('#([0-9]{4})-([0-9]{2})-([0-9]{2})#',"$3/$2/$1",$champ['DEBUTEMPRUNT']);

                                // requete de selection des champs de la table etudiant
                                $request1 = $bdd -> query("SELECT * FROM etudiant WHERE MATRICULEE ='".$champ['MATRICULEE']."' ");

                                // requete de selection des champs de la table etudiant
                                $request2 = $bdd -> query("SELECT * FROM exemplaire WHERE CODEEXEMPLAIRE ='".$champ['CODEEXEMPLAIRE']."' ");
                                $livreInf = "";
                                while($champ2 = $request2 -> fetch()){ $livreInf = $champ2["CODEL"];}

                                $request3 = $bdd -> query("SELECT * FROM livre WHERE CODEL ='".$livreInf."' ");
                                // affichage de toute les valeurs dans un tableau
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><input type="checkbox" value="<?php echo $champ["MATRICULEE"].' '.$champ["CODEEXEMPLAIRE"].' '.$champ["DEBUTEMPRUNT"] ; ?>" name ="selector[]" class="selector"></td>
                                        <td><?php while($champ1 = $request1 -> fetch()){ echo $champ1["NOME"]." ".$champ1["PRENOME"];} ?></td>
                                        <td><?php while($champ3 = $request3 -> fetch()){ echo $champ3["TITREL"];} ?></td>
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
        <script src="script/js/loan/ajouterEmpruntVerif.js"></script>

        
    </body>
</html>