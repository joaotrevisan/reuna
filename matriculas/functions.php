<?php

require_once('../config.php');
require_once(DBAPI);

$alunos = null;
$aluno = null;

/**
 *  Listagem de Alunos
 */
function index() {
	global $alunos;
	$alunos = find_all('alunos');
}