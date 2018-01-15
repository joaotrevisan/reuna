<?php

require_once('functions.php'); 
require_once('../constants.php');

$curso = "";
if (isset($_GET['curso'])){        
    $curso = $_GET['curso'];
}
$letra = "";
if (isset($_GET['letra'])){        
    $letra = $_GET['letra'];
}
$nome = "";
if (isset($_GET['nome'])){        
    $nome = $_GET['nome'];
}
$foto = "";
if (isset($_GET['foto'])){        
    $foto = $_GET['foto'];
}

$width = 260;
$height = 170;
?>

<html>
    <head>
        <meta charset="UTF-8">
        <style>            
            @media print {
                @page { margin: 0cm; }
                @page { size: A4; }
                body { margin: 1.5cm; }
            }
            
            #divMainColor {
                position:absolute;
                top:0;
                left:0;
                width: <?= $width ?>px;
                height: <?= $height ?>px;
                background: #C71585;
            }
            
            #divMainWhite {
                position:absolute;
                top:5;
                left:5;
                width: <?= $width-10 ?>px;
                height: <?= $height-10 ?>px;
                background: #FFF;
            }
            
            #divSubMainColor {
                position:absolute;
                top:7;
                left:7;
                width: <?= $width-14 ?>px;
                height: <?= $height-14 ?>px;
                background: #C71585;
            }
            
            #divSubMainWhite {
                position:absolute;
                top:9;
                left:9;
                width: <?= $width-18 ?>px;
                height: <?= $height-18 ?>px;
                background: #FFF;
            }
            
            #divFoto {
                position:absolute;
                top:11;
                left:11;
                width: 100px;
                height: 120px;                              
                border: 1px solid #C71585;
            }
            
            #divNome{
                position:absolute;
                top:133;
                left:0;
                width: <?= $width ?>px;
                height: 30px;                              
                border: 0px solid #000;
                text-align: center;
                padding-top: 10px;
                font-family: "Courier New";
                font-size: 11px;
                font-weight: bold;
            }
            
            #divLogo {
                position:absolute;
                top:20;
                left:107;                
                border: 0px solid #000;
            }
            
            #divLetra {
                position:absolute;
                top:85;
                left:180;                
                border: 0px solid #000;
                font-size: 25px;
                font-family: "Courier New";
                font-weight: bold;
            }
            
            #divLinhaDiagonal {
                position:absolute;
                top:-185;
                left:-20;                
                width: 13px;
                height: 354px;
                background: #C71585;
                -webkit-transform: skew(57deg); /* Chrome, Opera */
                    -ms-transform: skew(57deg); /* IE */
                        transform: skew(57deg); /* Padrão */
            }
            
            #divCorrecao {
                position:absolute;
                top:<?= $height-10 ?>;
                left:<?= $width ?>; 
                width: 10px;
                height: 10px;
                border: 0px solid #000;
                background-color: #FFF;
            }
           
            
        </style>
    </head>
    <body>
        
        <div id="divMainColor"></div>
        <div id="divMainWhite"></div>
        <div id="divSubMainColor"></div>
        <div id="divSubMainWhite"></div>        
        <div id="divLinhaDiagonal"></div>
        <div id="divFoto"></div>
        <div id="divNome"><?= $nome ?></div>
        <div id="divLogo"><img src="../reuna-logo.png" width="150" height="70" alt="reuna"></div>
        <div id="divLetra"><?= $letra ?></div>
        <div id="divCorrecao"></div>
    </body>
</html>