<?php

require_once('../config.php');
require_once(DBAPI);

$alunos = null;
$cursos = null;

/**
 *  Listagem de Alunos
 */
function index($idCursoAtual = null) {
	global $alunos;
	if(isset($idCursoAtual))
        $alunos = findAlunosByCurso($idCursoAtual);
    
    global $cursos;
    if (count(find_all('cursos')) > 0){
        $cursos = array_reverse(find_all('cursos'));        
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
