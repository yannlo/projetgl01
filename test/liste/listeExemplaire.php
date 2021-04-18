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
        <title>page de exemplaire</title>
    </head>
    <body>
        <h1>liste de exemplaire</h1>

        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/php/global/verifierErreur.php");
        ?>

        <!-- tableau contenant les informations de chaque exemplaire -->
        <form method="post" action="../../script/php/copy/supprimerExemplaire.php" id="supForm">
            <a href="../formulaire/formulaireExemplaire.php" id="linkRedirection">ajouter</a>
            <input type="submit" value="supprimer">
            <table>
                <tr>
                    <th>N°</th>
                    <th>Code</th>
                    <th><input type="checkbox" value="all" name ="selector[]" class="selector"></th>
                    <th>Nom Livre</th>
                    <th>Etat</th>
                    <th>Date d'ajout</th>
                </tr>
                <?php
                // connexion a la base de donnee
                include("../../script/php/global/connexionBDD.php ");

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
                            <th><?php echo $i; ?></th>
                            <th><?php echo $champ["CODEEXEMPLAIRE"]; ?></th>
                            <th><input type="checkbox" value="<?php echo $champ["CODEEXEMPLAIRE"]; ?>" name ="selector[]" class="selector"></th>
                            <th><?php while($champ1 = $request1 -> fetch()){ echo $champ1["TITREL"];} ?></th>
                            <th><?php while($champ2 = $request2 -> fetch()){ echo $champ2["NOMETAT"];} ?></th>
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
        
        <script src="../../script/js/global/selectAll.js"></script>
        <script src="../../script/js/copy/supprimerExemplaireVerif.js"></script>
        <script src="../../script/js/copy/ajouterExemplaireVerif.js"></script>
        
    </body>
</html>