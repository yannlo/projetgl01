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
        <title>page de etudiant</title>
    </head>
    <body>
        <h1>liste de etudiant</h1>

        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/php/global/verifierErreur.php");
        ?>

        <!-- tableau contenant les informations de chaque gestionnaire -->
        <form method="post" action="../../script/php/student/supprimerEtudiant.php" id="supForm">
            <a href="../formulaire/formulaireEtudiant.php" id="linkRedirection">ajouter</a>
            <input type="submit" value="supprimer">
            <table>
                <tr>
                    <th>N°</th>
                    <th>Code</th>
                    <th>Classe</th>
                    <th><input type="checkbox" value="all" name ="selector[]" class="selector"></th>
                    <th>Nom</th>
                </tr>
                <?php
                // connexion a la base de donnee
                include("../../script/php/global/connexionBDD.php ");

                // requete de selection des champs de la table classe
                $request = $bdd -> query("SELECT * FROM classe ORDER BY LIBELLECL");

                // affichage de toute les valeurs dans un tableau
                $i=1;
                while($champ = $request -> fetch()){
                // requete de selection des champs de la table etudiant
                    $request1 = $bdd -> query("SELECT * FROM etudiant WHERE DELETEE is null AND CODECL ='".$champ['CODECL']."' ORDER BY NOME ");

                    // affichage de toute les valeurs dans un tableau

                    while($champ1 = $request1 -> fetch()){

                    ?>
                        <tr>
                            <th><?php echo $i; ?></th>
                            <th><?php echo $champ1["MATRICULEE"]; ?></th>
                            <th><?php echo $champ["LIBELLECL"]; ?></th>
                            <th><input type="checkbox" value="<?php echo $champ1["MATRICULEE"]; ?>" name ="selector[]" class="selector"></th>
                            <th><?php echo $champ1["NOME"].' '.$champ1["PRENOME"]; ?></th>
                        </tr>

                    <?php
                    $i++;
                    }
                }

                ?>

            </table>
        </form>


        <!-- lien de retour sur la page d'acceuil -->
        <p>
            <a href="../index.php"><button>retour</button></a>
        </p>
        <script src="../../script/js/global/selectAll.js"></script>
        <script src="../../script/js/student/supprimerEtudiantVerif.js"></script>
        <script src="../../script/js/student/ajouterEtudiantVerif.js"></script>
        
        
    </body>
</html>