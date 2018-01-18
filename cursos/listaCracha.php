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
        <?php if ($matriculas) : ?>
            <?php foreach ($matriculas as $matricula) : ?>                
                <iframe width="280" height="190" src="../alunos/cracha.php?nome=<?= $matricula['nome_aluno']?>&letra=<?= $matricula['letra']?>" frameborder="0"></iframe>
            <?php endforeach; ?>
        <?php else : ?>
        <hr>
        <div class="row">
            <div class="col">
                Nenhum registro encontrado.
            </div>
        </div>
        <?php endif; ?>        
    </bo>
</html>
