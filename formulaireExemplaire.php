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
        <link rel="stylesheet" href="style/formExemplaire.css">
        <link rel="stylesheet" href="style/styleFooter.css">
        <link rel="stylesheet" href="style/inputAndLabel.css">
        <link rel="stylesheet" href="style/buttonAndSubmit.css">
        <title>BT - Formulaire d'ajout d'exemplaire</title>
    </head>
    <body>
    <div class="containt">

<?php
// header
include("script/php/asset/header.php");
?>

<div class="center">
    <a href="listeExemplaire.php" class="btnAndSbt">Retour</a>
    <h1>Formulaire d'ajout d'exemplaire</h1>
    <section class="listLivre">

    <?php 
    // verifier si un code d'erreur existe 
    include("script/php/global/verifierErreur.php");
    ?>


        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="script/php/copy/ajouterExemplaire.php">
            <p>
                <label for="idLivre"> Selectionner le livre :
                <select name="idLivre" id="idLivre">
                <?php
                // connexion a la base de donnee
                include("script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table livre
                $request = $bdd -> query("SELECT * FROM livre WHERE DELETEL is null ORDER BY TITREL ");

                // affichage des information de livre
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['CODEL'].'">'.$champ['TITREL'].'</option>';
                }
                ?>
                </select>
                </label>
            </p>

            <p>
                <label for="idEtat"> Selectionner l'etat :
                <select name="idEtat" id="idEtat">
                <?php
                // connexion a la base de donnee
                include("script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table etat
                $request = $bdd -> query("SELECT * FROM etat ORDER BY IDETAT");

                // affichage des information de etat
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['IDETAT'].'">'.$champ['NOMETAT'].'</option>';
                }
                ?>
                </select>
                </label>
            </p>
            <input type="submit" value="envoyer" class="btnAndSbt">
        </form>
        </section>
            </div>


            <?php
            // footer
            include("script/php/asset/footer.php");
            ?>
        </div>


        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
    </body>
</html>