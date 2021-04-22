<?php
// verifie si une session est en cour
include ('verifierConnexion.php');

// detruit la session en cour
session_destroy();
header('location: ../../../index.php');
?>