<?php

require_once('functions.php'); 
require_once('../constants.php');

$width = 420;
$height = 240;
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
                top:10;
                left:10;
                width: <?= $width-23 ?>px;
                height: <?= $height-23 ?>px;
                background: #FFF;
            }
            
            #divSubMainColor {
                position:absolute;
                top:13;
                left:13;
                width: <?= $width-29 ?>px;
                height: <?= $height-29 ?>px;
                background: #C71585;
            }
            
            #divSubMainWhite {
                position:absolute;
                top:17;
                left:17;
                width: <?= $width-37 ?>px;
                height: <?= $height-37 ?>px;
                background: #FFF;
            }
            
            #divFoto {
                position:absolute;
                top:20;
                left:20;
                width: 120px;
                height: 150px;                              
                border: 1px solid #C71585;
            }
            
            #divNome{
                position:absolute;
                top:180;
                left:20;
                width: 371px;
                height: 30px;                              
                border: 0px solid #000;
                text-align: center;
                padding-top: 10px;                
            }
            
            #divLogo {
                position:absolute;
                top:50;
                left:170;                
                border: 0px solid #000;
            }
            
            #divLetra {
                position:absolute;
                top:150;
                left:260;                
                border: 0px solid #000;
                font-size: 25px;
            }
            
            #divLinhaDiagonal {
                position:absolute;
                top:-215;
                left:-20;                
                width: 25px;
                height: 442px;
                background: #C71585;
                -webkit-transform: skew(62deg); /* Chrome, Opera */
                    -ms-transform: skew(62deg); /* IE */
                        transform: skew(62deg); /* Padrão */
            }
            
        </style>
    </head>
    <body>
        <div id="divMainColor"></div>        
        <div id="divMainWhite"></div>
        <div id="divSubMainColor"></div>
        <div id="divSubMainWhite"></div>        
        <div id="divLinhaDiagonal"></div>
        <div id="divFoto">FOTO</div>
        <div id="divNome">NOME COMPLETO DO ALUNO MAIOR</div>
        <div id="divLogo"><img src="../reuna-logo.png" alt="reuna"></div>
        <div id="divLetra">D</div>
    </body>
</html>