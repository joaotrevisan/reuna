<?php

require_once('../config.php');
require_once(DBAPI);

$clientes = null;
$cliente = null;

//LISTAGEM DE CLIENTES
function index(){
    global $clientes;
    $clientes = find_all('clientes');
}

//ADICIONAR
function add(){
    if(!empty($_POST['cliente'])){
        $cliente = $_POST['cliente'];
        save('clientes',$cliente);
        unset($_POST['cliente']);
        header('Refresh:0');
    }
}

//EDITAR REGISTRO
function edit(){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        
        if(isset($_POST['clienteEdit'])){
            $cliente = $_POST['clienteEdit'];
            update('clientes', $id, $cliente);
            unset($_POST['clienteEdit']);
            header('Refresh:0');
        }
    }
}

//EDITAR REGISTRO
function delete(){
    if(isset($_POST['idDelete'])){
        $id = $_POST['idDelete'];
        remove('clientes', $id);
        unset($_POST['clienteDelete']);
        header('Refresh:0');
    }
}

//LISTA AS COLUNAS DOS CLIENTES
function listarColunas(){
    return listColumns('clientes');
}

//CRIA UMA TABELA COM FUNÇÃO DE PESQUISA
function table($table = null, $col = null, $value = null){
    tableSimple($table,$col,$value);
}