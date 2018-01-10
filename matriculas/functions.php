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
	$cursos = array_reverse(find_all('cursos'));
}