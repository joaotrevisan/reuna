<?php

require_once('functions.php');

global $confirmacao;
global $idCursoAtual;
global $idCursoDestino;
global $nomeCursoAtual;
global $nomeCursoDestino;
global $idListaAlunos;
global $strListaAlunos;

$confirmacao = false;
$idCursoAtual = 0;
$idCursoDestino = 0;
$nomeCursoAtual = "";
$nomeCursoDestino = "";
$idListaAlunos = [];
$strListaAlunos = "";


if(isset($_GET['confirmacao'])){
    $confirmacao = $_GET['confirmacao'];
}

if(isset($_GET['idCursoAtual'])){
    $idCursoAtual = $_GET['idCursoAtual'];
}

if(isset($_GET['idCursoDestino'])){
    $idCursoDestino = $_GET['idCursoDestino'];
}

if(isset($_GET['nomeCursoAtual'])){
    $nomeCursoAtual = $_GET['nomeCursoAtual'];
}

if(isset($_GET['nomeCursoDestino'])){
    $nomeCursoDestino = $_GET['nomeCursoDestino'];
}

if(isset($_GET['idLista'])){
    $strListaAlunos = $_GET['idLista'];
    $idListaAlunos = explode(",", $strListaAlunos);
}

/* Transferência dos Alunos de Curso */

if ($idCursoAtual != 0 && $idCursoDestino != 0 && count($idListaAlunos) > 0 && isset($nomeCursoDestino) && $confirmacao){
        
    foreach ($idListaAlunos as $idAluno){
        
        try{
            // Para cada Aluno criar uma matricula no curso destino com status Inscrito        
            add($idAluno, $idCursoDestino);
            
            // Para cada Aluno atualiza o curso atual do aluno para o curso Destino
            updateCursoAtualAluno($idAluno, $nomeCursoDestino);
                        
            // ALUNO_NOVO -> curso_atual = 1
            if ($idCursoAtual == 1) {
                // para cada Aluno, se estiver no curso ALUNO_NOVO -> apaga sua matricula
                deleteMatriculaAlunoNovo($idAluno);
            }else{
                // Para cada Aluno alterar o status da matricula atual para Concluido        
                updateStatus($idAluno, $idCursoAtual, "Concluido");                
            }
                
        }
        catch (Exception $e){
            $_SESSION['message'] = $e->GetMessage();
            $_SESSION['type'] = 'danger';
        } 
        
    }
    
    //3) Redirecionar o usuário para o menu
    
    header('location: ../main/index.php');
}
?>

<!--  LAYOUT **************************************************************************************** -->

<?php if ($confirmacao == false){ ?>

    <?php include(HEADER_TEMPLATE); ?>

    <div class="container" style="padding-top: 5%;">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h3 align="left"><i class="fas fa-question-circle fa-1x"></i>&nbsp;&nbsp;&nbsp;Confirmar Inscrição</h3>
                    </center>
                </div>
                <div class="card-body">
                    <form action="<?php echo "register.php?"."idCursoAtual=".$idCursoAtual."&idCursoDestino=".$idCursoDestino."&nomeCursoDestino=".$nomeCursoDestino."&idLista=".$strListaAlunos."&confirmacao=TRUE" ?>" method="post">
                      <!-- area de campos do form -->
                      <div class="row">
                        <div class="form-group col-md-5">
                          <label for="nome">Curso Atual</label>
                          <input type="text" class="form-control" name="curso_atual" style="text-transform: uppercase;" value="<?php echo $nomeCursoAtual ?>" disabled>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="letra">Curso Destino</label>
                          <input type="text" class="form-control" name="curso_destino" style="text-transform: uppercase;" value="<?php echo $nomeCursoDestino ?>" disabled>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="letra">Número de Alunos</label>
                          <input type="text" class="form-control" name="numero_alunos" style="text-transform: uppercase;" value="<?php echo count($idListaAlunos) ?>" disabled>
                        </div> 
                      </div>

                       <div class="row">
                        <div class="form-group col-md-12">
                            <label for="letra">Código dos Alunos</label>
                            <input type="text" class="form-control" name="codigos_alunos" style="text-transform: uppercase;" value="<?php foreach ($idListaAlunos as $idAluno) echo "#".$idAluno."   " ?>" disabled>
                        </div>
                       </div>   

                      <br> <!-- colocar como padrao -->
                      <div id="actions" class="row">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-outline-success"><i class="fas fa-check"></i> Confirmar</button>
                          <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include(FOOTER_TEMPLATE); ?>

<?php } ?>

<!--  LAYOUT **************************************************************************************** -->

