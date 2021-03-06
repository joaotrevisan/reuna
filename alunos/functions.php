<?php

require_once('../config.php');
require_once(DBAPI);

$alunos = null;
$aluno = null;

/**
 *  Listagem de Alunos
 */
function index($nome = null) {
	global $alunos;
    
    if (isset ($nome))        
        $alunos = findAlunosByNome(trim($nome));
    else
    {
        if (count(find_all('alunos')) > 0){
            $alunos = array_reverse(find_all('alunos'));        
        }
    }
}

/**
 *  Cadastro de Alunos
 */
function add() {

if (!empty($_POST['aluno'])) {
    
    //Copiando a foto da pasta fotos para a pasta fotos/copy com o nome do aluno como nome do arquivo.
    
    if(isset($_GET['f']) && isset($_GET['n']))
        copy('fotos/'.$_GET['f'],'fotos/copy/'.$_GET['n']);
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    
    $aluno = $_POST['aluno'];
    $aluno['modified'] = $aluno['created'] = $today->format("Y-m-d H:i:s");
    $lastId = save('alunos', $aluno);
      
    //Criar a matricula no curso "entrevista"
    criarMatriculaComoNovoAluno($lastId);     
    atualizarFotoAluno($lastId);
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
      
    if(isset($_GET['f']) && isset($_GET['n'])){
        copy('fotos/'.$_GET['f'],'fotos/copy/'.$_GET['n']);
    }
      
    if (isset($_POST['aluno'])) {

      $aluno = $_POST['aluno'];
      $aluno['modified'] = $now->format("Y-m-d H:i:s");

      update('alunos', $id, $aluno);
      header('location: index.php');
    } else {

      global $aluno;
      $aluno = find('alunos', $id);
    } 
  } else {
    header('location: index.php');
  }
}


/**
 *  Visualização de um Cliente
 */
function view($id = null) {
  global $aluno;
  $aluno = find('alunos', $id);
}


/**
 *  Exclusão de um Cliente
 */
function delete($id = null) {

  global $aluno;
  $aluno = remove('alunos', $id);
  apagarMatriculas($id);
  header('location: index.php');
}


/**
 *  Recupera todos os cursos que o aluno ja foi matriculado
 */
function listaMatriculasAluno(){
    global $matriculas;
    
    if (isset($_GET['id']))
        $matriculas = findMatriculasByAluno($_GET['id']);      
}


