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
        <link rel="stylesheet" href="style/buttonAndSubmit.css">
        <link rel="stylesheet" href="style/inputAndLabel.css">
        <title>BT - Formulaire d'ajout d'etudiant</title>
    </head>
    <body>
        <div class="containt">
            
            <?php
// header
include("script/php/asset/header.php");
?>

<div class="center">
    <a href="listeEtudiant.php" class="btnAndSbt">Retour</a>
    <h1>formulaire d'ajout d'etudiant</h1>
    <section class="listEmprunt">
        
        <?php 
        // verifier si un code d'erreur existe 
        include("script/php/global/verifierErreur.php");
        ?>

        
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="script/php/student/ajouterEtudiant.php">
            <p><label for="nomEtudiant"> Entrer votre nom :<input type="text" name="nomEtudiant" id="nomEtudiant"></label></p>
            <p><label for="prenomEtudiant"> Entrer votre prenom :<input type="text" name="prenomEtudiant" id="prenomEtudiant"></label></p>
            <p><label for="adresseEtudiant"> Entrer votre adresse :<input type="text" name="adresseEtudiant" id="adresseEtudiant"></label></p>

            <p>
                <label for="codeClasse"> Selectionner votre classe :
                <select name="codeClasse" id="codeClasse">
                <?php
                // connexion a la base de donnee
                include("script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table classe
                $request = $bdd -> query("SELECT * FROM classe WHERE DELETECL is null ORDER BY LIBELLECL");


                // affichage des information de classe
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['CODECL'].'">'.$champ['LIBELLECL'].'</option>';
                }
                ?>
                </select></label>
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