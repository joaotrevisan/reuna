<?php
    session_start();

    //Verificando se está logado
    if(!isset ($_SESSION['usuario']) == true){
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        //header("location:..\index.php");
    }
?>