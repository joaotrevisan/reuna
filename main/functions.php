<?php

require_once('../config.php');
require_once(DBAPI);

$usuarios = null;
$usuario = null;

/**
 *  Listagem de Usuarios
 */
function index() {
	global $usuarios;
	$usuarios = find_all('usuarios');
}

/**
 *  Visualização de um Usuaior
 */
function view($id = null) {
  global $usuario;
  $usuario = find('usuarios', $id);
}

/**
 *  Cadastro de Alunos
 */
function add() {

  if (!empty($_POST['usuario'])) {
    save('usuarios', $usuario);
    header('location: ..\index.php');
  }
}