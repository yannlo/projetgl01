<?php
// verifie si aucune session est active et en active une
if(session_status() == PHP_SESSION_NONE)   
{
    session_start();
}

?>