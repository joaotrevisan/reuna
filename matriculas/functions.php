<?php

require_once('../config.php');
require_once(DBAPI);

$alunos = null;
$cursos = null;
$matricula = null;

/**
 *  Listagem de Alunos
 */
function index($idCursoAtual = null, $idAlunoAtual = null) {
	global $alunos;
	if(isset($idCursoAtual))
        $alunos = findAlunosByCurso($idCursoAtual, $idAlunoAtual);
    
    global $cursos;
    if (count(find_all('cursos')) > 0){
        $cursos = array_reverse(find_all('cursos'));        
    }	
}


/**
 *	Atualizacao/Edicao de Matricula
 */
function edit($idAluno = null) {
    
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_POST['matricula'])) {
      $matricula = $_POST['matricula'];
      $matricula['modified'] = $now->format("Y-m-d H:i:s");

      update('matriculas', $id, $matricula);
      
      if(isset($idAluno))    
        header('location: ../alunos/edit.php?id='.$idAluno);
      else
        header('location: index.php');
      
    } else {

      global $matricula;
      $matricula = find('matriculas', $id);
    } 
  } else {    
      header('location: index.php');
  }
}


/**
 *  Cadastro de Matriculas
 */
function add($idAluno = null, $idCursoDestino = null) {

    if (isset($idAluno) && isset($idCursoDestino))
        criarMatricula($idAluno, $idCursoDestino);    
}

/**
 *  Atualizar Status da Matricula
 */
function updateStatus($idAluno = null, $idCursoAtual = null, $status = null) {

    if (isset($idAluno) && isset($idCursoAtual) && isset($status))
        atualizarEstadoMatricula($idAluno, $idCursoAtual, $status);    
}


/**
 *  Atualizar curso atual no aluno
 */
function updateCursoAtualAluno($idAluno = null, $nomeCursoDestino = null) {

    if (isset($idAluno) && isset($nomeCursoDestino))
        atualizarCursoAtualAluno($idAluno, $nomeCursoDestino);    
}

/**
 *  Apagar o registro matricula do curso 'ALUNO_NOVO'
 */
function deleteMatriculaAlunoNovo($idAluno = null) {

    if (isset($idAluno))
        excluirMatriculaAlunoNovo($idAluno);    
}
