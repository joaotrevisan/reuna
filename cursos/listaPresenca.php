<?php

require_once('functions.php'); 
require_once('../constants.php');

    $id_curso = 0;

    if (isset($_GET['id'])){
        
        $id_curso = $_GET['id'];
        $orderby = $_GET['orderby'];
        
        //Recupera o curso selecionado
        view($id_curso);
        
        //Recupera os alunos matriculados no curso
        listarAlunosMatriculados($orderby);
    }
    else
    {
        echo "Erro: não foi possível localizar o curso";
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <style>            
            @media print {
                @page { margin: 0; }
                @page { size: A4; }
                body { margin: 1.5cm; }
            }
            
            tr { height: 25px; }
            
            body {
                font-family: "Courier New";
            }
            
            .lblField 
            {                
                font-weight: bold;
                font-size: 14px;
            }
            
            .lblValue
            {                
                font-weight: normal;
                font-style: italic;
                font-size: 14px;
            }
            
            .tblHeader {
                border-collapse: collapse;
                border: 1px solid black;
                border-bottom: 0px;
                width: 680px;
                height: 80px;
            }
            
            
            
            .tblContent {
                border-collapse: collapse;
                width: 680px;
            }
            
            .tblContent td {
                border: 1px solid black;
            }
            
            .lblContentField {
                font-size: 12px;                
            }
            
            .lblContentTitle{
                font-size: 13px;
                text-align: center;
                font-weight: bold;
            }
            
        </style>
    </head>
    <body>
        <table class="tblHeader">
            <tr style="border-bottom: 1px solid black;">
                <th colspan="2">LISTA DE PRESENÇA (<?= ($orderby == "NOME_ALUNO")? "PORTARIA" : "SECRETARIA" ?>)</th>
            </tr> 
            <tr>
                <td><label class="lblField">Curso:</label> <label class="lblValue"><?= $curso['nome'] ?></label></td>
                <td><label class="lblField">Monitor:</label> <label class="lblValue"><?= $curso['nome_monitor'] ?></label></td>
            </tr>
            <tr>                
                <td><label class="lblField">Início:</label> <label class="lblValue"><?= date('d/m/Y',strtotime($curso['data_inicio'])); ?></label></td>
                <td><label class="lblField">Término:</label> <label class="lblValue"><?= date('d/m/Y',strtotime($curso['data_termino'])); ?></label></td>                
            </tr>
        </table>
        <table class="tblContent">
            <tr>
                <td align="center"><label class="lblContentTitle">#</label></td>
                <td><label class="lblContentTitle">ALUNO</label></td>
                <td align="center"><label class="lblContentTitle">SEG</label></td>
                <td align="center"><label class="lblContentTitle">TER</label></td>
                <td align="center"><label class="lblContentTitle">QUA</label></td>
                <td align="center"><label class="lblContentTitle">QUI</label></td>
                <td align="center"><label class="lblContentTitle">SEX</label></td>
                <td align="center"><label class="lblContentTitle">SAB</label></td>
                <td align="center"><label class="lblContentTitle">DOM</label></td>
                <td align="center"><label class="lblContentTitle">CAD</label></td>
                <td align="center"><label class="lblContentTitle">OBSERVAÇÃO</label></td>
            </tr>
            
            <?php $count = 0; ?>
            <?php if ($matriculas) : ?>
                <?php foreach ($matriculas as $m) : ?>
                    <?php $count++; ?>
                <tr>
                    <td width="20px" align="center"><label class="lblContentField"><?= $count ?></label></td>
                    <td width="250px"><label class="lblContentField"><?= substr($m['nome_aluno'], 0 ,40) ?></label></td>
                    <td align="center"><label class="lblContentField"><?= $m['falta_seg'] ?></label></td>
                    <td align="center"><label class="lblContentField"><?= $m['falta_ter'] ?></label></td>
                    <td align="center"><label class="lblContentField"><?= $m['falta_qua'] ?></label></td>
                    <td align="center"><label class="lblContentField"><?= $m['falta_qui'] ?></label></td>
                    <td align="center"><label class="lblContentField"><?= $m['falta_sex'] ?></label></td>
                    <td align="center"><label class="lblContentField"><?= $m['falta_sab'] ?></label></td>
                    <td align="center"><label class="lblContentField"><?= $m['falta_dom'] ?></label></td>
                    <td align="center"><label class="lblContentField"><?= ($m['cadeira'] > 0 ? $m['cadeira'] : "") ?></label></td>
                    <td><label class="lblContentField"></label></td>
                </tr>
            
                <?php endforeach; ?>
            
                <!-- COLOCAR LINHAS EM BRANCO -->
                <?php for($i=0; $i<(35-count($matriculas)); $i++) : ?>
                    <?php $count++; ?>
                    <tr>
                        <td width="20px" align="center"><label class="lblContentField"><?= $count ?></label></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>            
                <?php endfor; ?>
            
                <tr>
                    <td colspan="11" align="center"><label class="lblContentTitle">REUNA - impresso dia <?= date('d/m/Y'); ?></label></td>
                </tr>
            
            <?php else : ?>                            
                <div class="col"> Nenhum registro encontrado. </div>                            
            <?php endif; ?>
            
        </table>
    </body>
</html>


    
