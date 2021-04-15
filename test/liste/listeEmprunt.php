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
        <title>page de emprunt</title>
    </head>
    <body>
        <h1>liste de emprunt</h1>

        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/global/verifierErreur.php");
        ?>

        <!-- tableau contenant les informations de chaque emprunt -->
        <form method="post" action="../../script/loan/terminerEmprunt.php">
            <input type="submit" value="supprimer">
            <table>
                <tr>
                    <th>N°</th>
                    <th><input type="checkbox" value="all" name ="selector[]"></th>
                    <th>Nom Etudiant</th>
                    <th>Nom Livre</th>
                    <th>Date Debut</th>
                </tr>
                <?php
                // connexion a la base de donnee
                include("../../script/global/connexionBDD.php ");

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

                    // affichage de toute les valeurs dans un tableau
                    ?>
                        <tr>
                            <th><?php echo $i; ?></th>
                            <th><input type="checkbox" value="<?php echo $champ["MATRICULEE"].' '.$champ["CODEEXEMPLAIRE"].' '.$champ["DEBUTEMPRUNT"] ; ?>" name ="selector[]"></th>
                            <th><?php while($champ1 = $request1 -> fetch()){ echo $champ1["NOME"]." ".$champ1["PRENOME"];} ?></th>
                            <th><?php while($champ2 = $request2 -> fetch()){ echo $champ2["CODEEXEMPLAIRE"];} ?></th>
                            <th><?php echo $date; ?></th>
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