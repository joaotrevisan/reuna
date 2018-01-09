<?php

session_start();

if((isset ($_SESSION['email']) == true) and (isset ($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['nome']);
    header('location:..\index.php');
}
else{
    header('location:..\index.php');
}


?>