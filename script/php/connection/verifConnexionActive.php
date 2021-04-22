<?php
// verifier si un gestionnaire ai connecter
if(!isset($_SESSION["matricule"])){
    header("location: connexion.php");
    exit();
}
?>