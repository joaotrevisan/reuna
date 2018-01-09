<?php
    require_once('functions.php');

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if(findUsuario($usuario,$senha)){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        header('location:..\main\index.php');
    }
    else{
        unset ($_SESSION['usuario']);
        unset ($_SESSION['senha']);
        header('location:..\index.php?t=1');
    }


?>