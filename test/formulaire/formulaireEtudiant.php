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
        <title>page d'etudiant</title>
    </head>
    <body>
        <h1>formulaire d'ajout de etudiant</h1>
        <?php 
        // verifier si un code d'erreur existe 
        include("../../script/global/verifierErreur.php");

        ?>
        
        <!-- formulaire de connexion a la platform -->
        <form method="POST" action="../../script/student/ajouterEtudiant.php">
            <p><label for="nomEtudiant"> Entrer votre nom :<input type="text" name="nomEtudiant" id="nomEtudiant"></label></p>
            <p><label for="prenomEtudiant"> Entrer votre prenom :<input type="text" name="prenomEtudiant" id="prenomEtudiant"></label></p>
            <p><label for="adresseEtudiant"> Entrer votre adresse :<input type="text" name="adresseEtudiant" id="adresseEtudiant"></label></p>

            <p>
                <label for="codeClasse"> Selectionner votre classe :</label>
                <select name="codeClasse" id="codeClasse">
                <?php
                // connexion a la base de donnee
                include("../../script/global/connexionBDD.php");

                // requete de recuperation de champ de la table classe
                $request = $bdd -> query("SELECT * FROM classe WHERE DELETECL is null ORDER BY LIBELLECL");


                // affichage des information de classe
                while($champ = $request -> fetch()){
                    echo '<option value="'.$champ['CODECL'].'">'.$champ['LIBELLECL'].'</option>';
                }
                ?>
                </select>
            </p>
            <input type="submit" value="envoyer">
        </form>

        <!-- lien de retour sur la page d'acceuil -->
        <p>
            <a href="../index.php"><button>retour</button></a>
        </p>
        
        
    </body>
</html>