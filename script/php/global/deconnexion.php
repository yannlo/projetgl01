<?php
// verifie si une session est en cour
include ('verifierConnexion.php');

// detruit la session en cour
session_destroy();

// redirige vers la page d'acceuil
header('location: index.php');
?>