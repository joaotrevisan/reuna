<?php

require_once('../config.php');
require_once(DBAPI);

$cursos = null;
$curso = null;
$monitores = null;
$matriculas = null;

/**
 *  Listagem de Cursos
 */
function index() {
	global $cursos;	
    if (count(find_all('cursos')) > 0){        
        $cursos = findCursosJoin();
    }
}

/**
 *  Recupera todos os Monitores
 */
function listarMonitores() {
  global $monitores;
  $monitores = findMonitores();
}


/**
 *  Cadastro de Cursos
 */
function add() {

  if (!empty($_POST['curso'])) {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $curso = $_POST['curso'];
    $curso['modified'] = $curso['created'] = $today->format("Y-m-d H:i:s");
    
    save('cursos', $curso);
    header('location: index.php');
  }
}



/**
 *	Atualizacao/Edicao de Cliente
 */
function edit() {

  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_POST['curso'])) {

      $curso = $_POST['curso'];
      $curso['modified'] = $now->format("Y-m-d H:i:s");

      update('cursos', $id, $curso);
      header('location: index.php');
    } else {

      global $curso;
      $curso = find('cursos', $id);
    } 
  } else {
    header('location: index.php');
  }
}


/**
 *  Visualização de um Curso
 */
function view($id = null) {
  global $curso;
  $curso = find('cursos', $id);
}


/**
 *  Exclusão de um Cliente
 */
function delete($id = null) {

  global $curso;
  $curso = remove('cursos', $id);

  header('location: index.php');
}

/**
 *  Recupera todos os alunos matriculados no curso
 */
function listarAlunosMatriculados($orderby = null){
    global $matriculas;
    
    if (isset($_GET['id'])) //id do Curso
        $matriculas = findMatriculasByCurso($_GET['id'], $orderby);      
}

function abreviarNome($nome = null){
    $nomeArray = explode(" ",$nome);
    $nome = "";
    $c = 0;
    while($c < count($nomeArray)){
        if($c == 0){
            $nome .= $nomeArray[$c]." ";
        }
        else if($c == count($nomeArray) - 1){
            $nome .= $nomeArray[$c];
        }
        else{
            $nome .= $nomeArray[$c][0].". ";
        }
        $c += 1;
    }
    return $nome;
}
