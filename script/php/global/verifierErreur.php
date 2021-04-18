<?php 
// verifier si un code d'erreur existe
if(isset($_SESSION['codeErreur'])){
    // verifier la valeur du code d'erreur
    if($_SESSION['codeErreur']["value"] == 0){
        echo "<p>". $_SESSION['codeErreur']['message'] ."</p>";
    }else if($_SESSION['codeErreur']["value"] == 1){
        echo "<p>". $_SESSION['codeErreur']['message'] ."</p>";
    }
}
$_SESSION['codeErreur'] = NULL;

?>