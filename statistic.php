<?php


//  include("script/php/connection/verifConnexionActive.php ");
include("script/php/global/verifierConnexion.php ");
include("script/php/connection/verifConnexionActive.php ");
?>
<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Mois', 'nombre d\'emprunts'],
          <?php
            // verification de l'ouveture d'une session
            include("script/php/global/connexionBDD.php");
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 1 ');
          echo "['Janvier"."',".$resultat->fetch()['emprunt']."],";
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 2 ');
          echo "['Fevrier"."',".$resultat->fetch()['emprunt']."],";
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 3 ');
          echo "['Mars"."',".$resultat->fetch()['emprunt']."],";
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 4 ');
          echo "['Avril"."',".$resultat->fetch()['emprunt']."],";
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 5 ');
          echo "['Mai"."',".$resultat->fetch()['emprunt']."],";
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 6 ');
          echo "['Juin"."',".$resultat->fetch()['emprunt']."],";
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 7 ');
          echo "['Juillet"."',".$resultat->fetch()['emprunt']."],";
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 8 ');
          echo "['Aout"."',".$resultat->fetch()['emprunt']."],";
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 9 ');
          echo "['Septembre"."',".$resultat->fetch()['emprunt']."],";
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 10 ');
          echo "['Octobre"."',".$resultat->fetch()['emprunt']."],";
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 11 ');
          echo "['Novembre"."',".$resultat->fetch()['emprunt']."],";
          $resultat=$bdd->query('SELECT COUNT(*) AS emprunt FROM emprunt WHERE MONTH(DEBUTEMPRUNT) = 12 ');
          echo "['Decembre"."',".$resultat->fetch()['emprunt']."],";
          ?>
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'statistiques',
            subtitle: 'graphe des dates par rapport aux emprunts' },
          axes: {
            x: {
              0: { side: 'top', label: 'statistiques generales des emprunts'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style/styleGeneral.css">
        <link rel="stylesheet" href="style/styleHeader.css">
        <link rel="stylesheet" href="style/statistic.css">
        <link rel="stylesheet" href="style/styleTableau.css">
        <link rel="stylesheet" href="style/formExemplaire.css">
        <link rel="stylesheet" href="style/styleFooter.css">
        <link rel="stylesheet" href="style/buttonAndSubmit.css">

  </head>
  <body>
  <div class="containt">

<?php
// header
include("script/php/asset/header.php");
?>

<div class="center">
    <a href="index.php" class="btnAndSbt">Retour</a>
    <h1>Formulaire d'ajout d'emprunt</h1>
    <section class="listLivre">


    <div id="top_x_div" style="width: 250px; height: 500px;"></div>
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