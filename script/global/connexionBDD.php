<?php 
// connexion a la base de donnee avec PDO
$bdd = new PDO('mysql:host=localhost;dbname=projetgl1','yannlo','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>