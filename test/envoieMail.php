<?php
// ini_set( 'display_errors', 1);
// error_reporting( E_ALL );

// // Il s’agit de l’adresse d’expédition de l’email. beaucoup d’hébergeurs Web demandent à ce qu’il soit indiqué une adresse email valide.
// $from = "projetgl01@gmail.com";

// // L’adresse email du destinataire.
// $to ="ehui.yann729@gmail.com";

// // Le sujet de l’email
// $subject = "Vérification PHP Mail";

// // Le contenu de l’email
// $message = "PHP mail marche";

// // Il s’agit de l’entête de l’email.
// $headers = "From:" . $from;

// // IL s’agit de la fonction PHP qui va exécuter l’email. Cette ligne ne doit pas être modifier afin d’assurer le bon fonctionnement du script.
// mail($to,$subject,$message, $headers);

// // confirmation de l'envoie
// echo "L'email a été envoyé.";


$to_email = "ehui.yann729@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi,nn This is test email send by PHP Script";
$headers = "From: sender\'s email";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}


?>