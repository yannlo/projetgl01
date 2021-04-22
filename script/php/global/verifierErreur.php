<?php 
// verifier si un code d'erreur existe
if(isset($_SESSION['codeErreur'])){
    // verifier la valeur du code d'erreur
    if($_SESSION['codeErreur']["value"] == 0){
        echo "<div class='errorFormFactor'>
        <h3>Information:</h3>
        <p>". $_SESSION['codeErreur']['message'] ."</p>
        </div>
        ";
    }else if($_SESSION['codeErreur']["value"] == 1){
        echo "<div class='errorFormFactor'> <h3>Information:</h3><p>". $_SESSION['codeErreur']['message'] ."</p>
        </div>";
    }else if($_SESSION['codeErreur']["value"] == 2){
        echo "<div class='errorFormFactor'><h3>Information:</h3> <p>". $_SESSION['codeErreur']['message'] ."</p>
        </div>";
    }
}
$_SESSION['codeErreur'] = NULL;

?>