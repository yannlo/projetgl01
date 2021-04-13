<?php
// verifie si une session est active
// si non il en active une
if(session_status() == PHP_SESSION_NONE)   
{
    session_start();
}

?>