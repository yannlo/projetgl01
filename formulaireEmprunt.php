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
        <title>BT - Formulaire d'ajout d'emprunt</title>
    </head>
    <body>
    <div class="containt">

<?php
// header
include("script/php/asset/header.php");
?>

<div class="center">
    <a href="listeEmprunt.php" class="btnAndSbt">Retour</a>
    <h1>Formulaire d'ajout d'emprunt</h1>
    <section class="listLivre">

    <?php 
    // verifier si un code d'erreur existe 
    include("script/php/global/verifierErreur.php");
    ?>
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="script/php/loan/ajouterEmprunt.php">
            <p>
                <label for="classe"> Selectionner la classe de l'etudiant :
                <select name="classe" id="classe">
                    <option value="none">none</option>
                <?php
                // connexion a la base de donnee
                include("script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table etudiant
                $request = $bdd -> query("SELECT * FROM classe WHERE DELETECL is null ORDER BY LIBELLECL ");

                // affichage des information de eleve
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['CODECL'].'">'.$champ['LIBELLECL'].'</option>';
                }
                ?>
                </select>
                </label>
            </p>
            <p>
                <label for="matriculeEtudiant"> Selectionner l'etudiant :
                <select name="matriculeEtudiant" id="matriculeEtudiant">
                <?php
                // connexion a la base de donnee
                include("script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table etudiant
                $request = $bdd -> query("SELECT * FROM etudiant WHERE DELETEE is null ORDER BY NOME ");

                // affichage des information de eleve
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['MATRICULEE'].'">'.$champ['NOME']." ".$champ['PRENOME'].'</option>';
                }
                ?>
                </select>
                </label>
            </p>

            <p>
                <label for="livre"> Selectionner le livre:
                <select name="livre" id="livre">
                <option value="none">none</option>
                    <?php
                    // connexion a la base de donnee
                    include("script/php/global/connexionBDD.php");

                    // requete de recuperation de champ de la table etudiant
                    $request = $bdd -> query("SELECT * FROM livre WHERE DELETEL is null ORDER BY TITREL ");

                    // affichage des information de eleve
                    while($champ = $request -> fetch()){
                        echo '<option value="'.$champ['CODEL'].'">'.$champ['TITREL'].'</option>';
                    }

                    ?>
                </select>
                </label>
            </p>
            <p>
                <label for="codeExemplaire"> Selectionner un exemplaire du livre :
                <select name="codeExemplaire" id="codeExemplaire">
                <?php
                // connexion a la base de donnee
                include("script/php/global/connexionBDD.php");

                // requete de recuperation de champ de la table etudiant
                $request = $bdd -> query("SELECT * FROM exemplaire WHERE DELETEEXEMLPAIRE is null ORDER BY CODEEXEMPLAIRE ");

                // affichage des information de eleve
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['CODEEXEMPLAIRE'].'">'.$champ['CODEEXEMPLAIRE'].'</option>';
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
        <script src="script/js/loan/trierExemplaire.js"></script>
        <script src="script/js/loan/trierEtudiant.js"></script>
        
    </body>
</html>