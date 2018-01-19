<?php
mysqli_report(MYSQLI_REPORT_STRICT);


function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}


function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find( $table = null, $id = null ) {
  
	$database = open_database();
	$found = null;

	try {
	  if ($id) {
	    $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
	    $result = $database->query($sql);
	    
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_assoc();
	    }
	    
	  } else {
	    
	    $sql = "SELECT * FROM " . $table;
	    $result = $database->query($sql);
	    
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
        
        /* Metodo alternativo
        $found = array();

        while ($row = $result->fetch_assoc()) {
          array_push($found, $row);
        } */
	    }
	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
}


/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function find_all($table) {
  return find($table);
}


/**
*  Insere um registro no BD
*/
function save($table = null, $data = null) {

  $database = open_database();
  $last_id = 0;

  $columns = null;
  $values = null;

  //print_r($data);

  foreach ($data as $key => $value) {
    $columns .= trim($key, "'") . ",";
    $values .= "'$value',";
  }

  // remove a ultima virgula
  $columns = rtrim($columns, ',');
  $values = rtrim($values, ',');
  
  $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";

  try {
    $database->query($sql);
    $last_id = $database->insert_id;     

    $_SESSION['message'] = 'Registro cadastrado com sucesso.';
    $_SESSION['type'] = 'success';
  
  } catch (Exception $e) { 
  
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);
  return $last_id;
}


/**
 *  Atualiza um registro em uma tabela, por ID
 */
function update($table = null, $id = 0, $data = null) {

  $database = open_database();

  $items = null;

  foreach ($data as $key => $value) {
    $items .= trim($key, "'") . "='$value',";
  }

  // remove a ultima virgula
  $items = rtrim($items, ',');

  $sql  = "UPDATE " . $table;
  $sql .= " SET $items";
  $sql .= " WHERE id=" . $id . ";";

  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro atualizado com sucesso.';
    $_SESSION['type'] = 'success';

  } catch (Exception $e) { 

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);
}



/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function remove( $table = null, $id = null ) {

  $database = open_database();
	
  try {
    if ($id) {

      $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);

      if ($result = $database->query($sql)) {   	
        $_SESSION['message'] = "Registro Removido com Sucesso.";
        $_SESSION['type'] = 'success';
      }
    }
  } catch (Exception $e) { 

    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }

  close_database($database);
}

// ************************************************************
// MÉTODOS CUSTOMIZADOS
//*************************************************************

/**
 *  Insere uma nova matricula na base
 */
function criarMatricula($id_aluno = null, $id_curso = null){
    
    $database = open_database();
    
    $estado = MATRICULA_TIPO_INSCRITO;
    $cadeira = 0;
    $created = $modified = date_create('now', new DateTimeZone('America/Sao_Paulo'))->format("Y-m-d H:i:s");
    
    try{
        $sql = "INSERT INTO matriculas (id, id_aluno, id_curso, estado, cadeira, created, modified) VALUES (NULL, ".$id_aluno.", ".$id_curso.", '".$estado."', ".$cadeira.", '".$created."', '".$modified."');";  
        $database->query($sql);
    }
     catch (Exception $e){
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }    
}


/**
 *  Ao criar um novo aluno, cria o registro na matricula com o curso "NOVO_ALUNO"
 */
function criarMatriculaComoNovoAluno($id_aluno = null){
    
    $database = open_database();
    
    try{
        if(isset($id_aluno)){
            $sql = "INSERT INTO matriculas (id, id_aluno, id_curso, estado, cadeira, created, modified) VALUES (NULL, ".$id_aluno.", 1, '".MATRICULA_TIPO_INSCRITO."', 0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
            $database->query($sql);
        }
    }
     catch (Exception $e){
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }    
}

function apagarMatriculas($id = null){
    
    $database = open_database();
    
    try{
        if(isset($id)){
            $sql = "REMOVE FROM matriculas WHER id_aluno = ".$id;
            $database->query($sql);
        }
    }
    catch(Exception $e){
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
}

/**
 * Muda o nome da foto do aluno para seu nome + o formato da imagem
 */
function atualizarFotoAluno($id_aluno = null){
    $database = open_database();
    
    print_r("ACESSOU FUNCAO");
    if(isset($id_aluno)){
    
        print_r("ESTÁ COM O ID");
        $aluno = find('alunos',$id_aluno);
        $foto = str_replace(' ', '_',strtolower($aluno['nome_completo'].FORMATO));
        $sql = "UPDATE alunos SET foto = '".$foto."' WHERE id = ".$id_aluno;
        $database->query($sql);
    }
    
    close_database($database);
}

/**
 *  Atualiza o status da matricula do aluno
 */
function atualizarEstadoMatricula($idAluno = null, $idCursoDestino = null, $status = null){
    
    $database = open_database();
    
    $modified = date_create('now', new DateTimeZone('America/Sao_Paulo'))->format("Y-m-d H:i:s");
    
    try{        
        $sql = "UPDATE matriculas SET estado = '".$status."', modified = '".$modified."' WHERE id_Aluno = ".$idAluno." AND id_Curso = ".$idCursoDestino.";";
        $database->query($sql);
        
    }
     catch (Exception $e){
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }    
}

/**
 *  Atualiza o curso atual do aluno
 */
function atualizarCursoAtualAluno($idAluno = null, $cursoAtual = null){
    
    $database = open_database();
    
    $modified = date_create('now', new DateTimeZone('America/Sao_Paulo'))->format("Y-m-d H:i:s");
    
    try{        
        $sql = "UPDATE alunos SET curso_atual = '".$cursoAtual."', modified = '".$modified."' WHERE id = ".$idAluno.";";
        $database->query($sql);
        
    }
     catch (Exception $e){
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }    
}

/**
 *  Atualiza o campo X da matricula
 */
function atualizarCampoMatricula($idMatricula = null, $strCampo = null, $valorCampo = null){
    
    $database = open_database();
    
    $modified = date_create('now', new DateTimeZone('America/Sao_Paulo'))->format("Y-m-d H:i:s");
    
    try{        
        $sql = "UPDATE matriculas SET ".$strCampo." = '".$valorCampo."', modified = '".$modified."' WHERE id = ".$idMatricula.";";
        $database->query($sql);
        return "1";
    }
     catch (Exception $e){
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';         
        return "0";
    }    
}

function findUsuario( $usuario = null, $senha = null ){
    
    $database = open_database();
    try{
        $sql = "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND senha='".$senha."'";
        $result = $database->query($sql);
        if ($result->num_rows > 0) {
            return 1;
	    }
        else{
            return 0;
        }
        
    }
    catch (Exception $e){

        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }

  close_database($database);
}

/**
 *  Pesquisa todos os Monitores na tabela Alunos
 */
function findMonitores() {
  
	$database = open_database();
	$found = null;

	try {
	    $sql = "SELECT * FROM alunos WHERE tipo = 'Monitor'";
	    $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
        }
        
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
}

/**
 *  Pesquisa todos os Alunos por nome
 */
function findAlunosByNome($nome = null) {
  
	$database = open_database();
	$found = null;

	try {
	    $sql = "SELECT * FROM alunos WHERE nome_completo like '%".$nome."%'";
	    $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
        }
        
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
}

/**
 *  Pesquisa todos os Alunos por curso
 */
function findAlunosByCurso($idCurso = null, $idAluno = null) {
  
	$database = open_database();
	$found = null;

    $sqlIdAluno = (isset($idAluno) ? " AND m.id_aluno = ".$idAluno : "");
    
	try {
        $sql = $sql = "SELECT M.id, M.id_aluno, M.id_curso, M.estado, A.nome_completo, A.curso_atual FROM matriculas M LEFT JOIN alunos A ON M.id_aluno = A.id WHERE M.id_curso = ".$idCurso . $sqlIdAluno." ORDER BY M.estado, A.nome_completo";
        //$sql = "SELECT a.id, a.nome_completo, a.curso_atual, m.estado FROM alunos as a INNER JOIN matriculas AS m ON a.id = m.id_aluno WHERE m.id_curso = ".$idCurso .$sqlIdAluno." ORDER BY m.estado, a.nome_completo";
	    
        $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
        }
        
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
}


/**
 *  Pesquisa todos as matriculas de um aluno
 */
function findMatriculasByAluno($idAluno = null, $idCurso = null, $orderby = null) {
  
    $database = open_database();
	$found = null;
    
    $strWhere = "";
    if (isset($idAluno)) //Se passar o aluno filtra por ele
        $strWhere = "a.id = ".$idAluno;
    if (isset($idCurso)) //Se passar o curso filtra por curso -> prioridade aluno
        $strWhere = "c.id = ".$idCurso;
    
    $strOrderBy = "";
    if (isset($orderby)){ //Monta a ordenacao da lista
        if ($orderby == "NOME_ALUNO") $strOrderBy = " ORDER BY a.nome_completo";
        if ($orderby == "CADEIRA") $strOrderBy = " ORDER BY m.cadeira";
        if ($orderby == "INSCRICAO") $strOrderBy = " ORDER BY m.created";
    }
    
    try {
	    $sql = "SELECT a.id as id_aluno, a.nome_completo as nome_aluno, m.id as id_matricula, c.id as id_curso, c.nome as nome_curso, m.estado, m.cadeira, 
                m.falta_seg, m.falta_ter, m.falta_qua, m.falta_qui, m.falta_sex, m.falta_sab, m.falta_dom, DATE_FORMAT(c.data_inicio, '%d/%m/%Y') as data_inscricao,
                c.letra as letra
                FROM alunos as a 
                inner join matriculas as m on a.id = m.id_aluno 
                inner join cursos as c on c.id = m.id_curso
                WHERE ".$strWhere . $strOrderBy;
        
        $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
        }
        
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
}

/**
 *  Pesquisa todos as matriculas dos alunos de um curso
 */
function findMatriculasByCurso($idCurso = null, $orderby = null){
    return findMatriculasByAluno(null, $idCurso, $orderby);
}


/**
 *  Apaga matricula do anulo com curso 'ALUNO NOVO' = id_curso = 1
 */
function excluirMatriculaAlunoNovo($idAluno = null){
    
    $database = open_database();
    
    try{        
        $sql = "DELETE FROM matriculas WHERE id_aluno = ".$idAluno." AND id_curso = 1;";
        echo $sql;
        $database->query($sql);
        
    }
     catch (Exception $e){
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }    
}

/**
 * Encontra os cursos com junto o nome completo do aluno
 */
function findCursosJoin(){
    
    $database = open_database();
    
    try{
        $sql = "SELECT C.id, C.nome, C.letra, C.tipo, C.estado, A.nome_completo FROM cursos C LEFT JOIN alunos A ON C.id_monitor = A.id";
        $result = $database -> query($sql);
        $found = $result->fetch_all(MYSQLI_ASSOC);
    }
    catch(Exception $e){
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
	
	close_database($database);
	return $found;
}
