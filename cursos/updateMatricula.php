<?php

    require_once('../config.php');
    require_once(DBAPI);

    $idMatricula = $_POST['p_idMatricula'];
    $strField = $_POST['p_strField'];
    $valueField = $_POST['p_valueField'];

    $resp = atualizarCampoMatricula($idMatricula, $strField, $valueField); 
    echo $resp;
?>