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
        <title>page de classe</title>
    </head>
    <body>
        <h1>liste de classe</h1>

        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/php/global/verifierErreur.php");
        ?>

        <!-- tableau contenant les informations de chaque Classe -->
        <form method="post" action="../../script/php/classroom/supprimerClasse.php">
            <a href="../formulaire/formulaireClasse.php">ajouter</a>
            <input type="submit" value="supprimer">
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

                // requete de selection des champs de la table classe
                $request = $bdd -> query("SELECT * FROM classe WHERE DELETECL is null ORDER BY LIBELLECL");

                // affichage de toute les valeurs dans un tableau
                $i=1;
                while($champ = $request -> fetch()){
                ?>
                <tr>
                    <th><?php echo $i; ?></th>
                    <th><?php echo $champ["CODECL"]; ?></th>
                    <th><input type="checkbox" value="<?php echo $champ["CODECL"]; ?>" name ="selector[]" class="selector"></th>
                    <th><?php echo $champ["LIBELLECL"]; ?></th>
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