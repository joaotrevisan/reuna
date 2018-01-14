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
    <hea>
        <meta charset="utf-8">
    </hea>
    <style>            
            @media print {
                @page { margin: 0cm; }
                @page { size: A4; }
                body { margin: 1.5cm; }
            }
    </style>
    <bo>
        <table>
            <tr>
                <td><iframe width="500" height="350" src="../alunos/cracha.php?nome=JOAO VITOR TREVISAN&letra=D" frameborder="0"></iframe></td>
                <td><iframe width="500" height="350" src="../alunos/cracha.php?nome=LIAMARA GABRIELA TREVISAN&letra=E" frameborder="0"></iframe></td>
            </tr>
        </table>
    </bo>
</html>
