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
        <link rel="stylesheet" href="style/formLivre.css">
        <link rel="stylesheet" href="style/styleFooter.css">
        <link rel="stylesheet" href="style/buttonAndSubmit.css">
        <link rel="stylesheet" href="style/inputAndLabel.css">
        <title>BT - Formulaire d'ajout de livre</title>
    </head>
    <body>
    <div class="containt">

<?php
// header
include("script/php/asset/header.php");
?>

<div class="center">

    <a href="listeLivre.php" class="btnAndSbt">Retour</a>
    <h1>Formulaire d'ajout de livre</h1>
    <section class="listLivre">


        <?php 
        // verifier si un code d'erreur existe 
        include("script/php/global/verifierErreur.php");
        ?>

        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="script/php/book/ajouterLivre.php">
            <p><label for="titreLivre"> Entrer le titre du livre :<input type="text" name="titreLivre" id="titreLivre"></label></p>
            <p><label for="nbPageLivre"> Nombre de page :<input type="number" name="nbPageLivre" id="nbPageLivre" min="0"></label></p>
            <p>
                <label for="idAuteurLivre"> Selectionner l'auteur :
                <select name="idAuteurLivre" id="idAuteurLivre">
                <?php
                // connexion a la base de donnee
                include("script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table classe
                $request = $bdd -> query("SELECT * FROM auteur WHERE DELETEAUTEUR is NULL ORDER BY IDAUTEUR");

                // affichage des information de classe
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['IDAUTEUR'].'">'.$champ['NOMAUTEUR'].'</option>';
                }
                ?>
                </select></label>
            </p>
            <p>
                <label for="idGenreLivre"> Selectionner le genre :
                <select name="idGenreLivre" id="idGenreLivre">
                <?php
                // connexion a la base de donnee
                include("script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table classe
                $request = $bdd -> query("SELECT * FROM genre WHERE DELETEGENRE is NULL ORDER BY IDGENRE");

                // affichage des information de classe
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['IDGENRE'].'">'.$champ['NOMGENRE'].'</option>';
                }
                ?>
                </select></label>
            </p>
            <input type="submit" value="envoyer">
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