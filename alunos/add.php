<?php 
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Aluno</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="nome_completo">Nome Completo</label>
      <input type="text" class="form-control" name="aluno['nome_completo']">
    </div>

    <div class="form-group col-md-3">
      <label for="data_nascimento">Data Nascimento</label>
      <input type="text" class="form-control" name="aluno['data_nascimento']">
    </div>

    <div class="form-group col-md-2">
      <label for="hora_nascimento">Hora Nascimento</label>
      <input type="text" class="form-control" name="aluno['hora_nascimento']">
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-5">
      <label for="signo">Signo</label>
      <input type="text" class="form-control" name="aluno['signo']">
    </div>

    <div class="form-group col-md-3">
      <label for="estado_civil">Estado Civil</label>
      <input type="text" class="form-control" name="aluno['estado_civil']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="profissao">Profissão</label>
      <input type="text" class="form-control" name="aluno['profissao']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="endereco_residencial">Endereço Residencial</label>
      <input type="text" class="form-control" name="aluno['endereco_residencial']" disabled>
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-3">
      <label for="bairro">Bairro</label>
      <input type="text" class="form-control" name="aluno['bairro']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="cep">CEP</label>
      <input type="text" class="form-control" name="aluno['cep']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="cidade">Cidade</label>
      <input type="text" class="form-control" name="aluno['cidade']">
    </div>
    
    <div class="form-group col-md-1">
      <label for="estado">Estado</label>
      <input type="text" class="form-control" name="aluno['estado']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="telefone">Telefone</label>
      <input type="text" class="form-control" name="aluno['telefone']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="celular">Telefone</label>
      <input type="text" class="form-control" name="aluno['celular']">
    </div>
  </div>
    
  <div class="row">
    <div class="form-group col-md-12">
      <label for="email">E-mail</label>
      <input type="text" class="form-control" name="aluno['email']">
    </div>
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>