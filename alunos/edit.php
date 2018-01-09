<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<div class="container" style="padding-top: 5%;">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <center>
                    <i class="fas fa-edit fa-2x"></i>
                    <h3>Alterar Aluno</h3>
                </center>
            </div>
            <div class="card-body">
                <form action="edit.php?id=<?php echo $aluno['id']; ?>" method="post">
                  <div class="row">
                    <div class="form-group col-md-7">
                      <label for="nome_completo">Nome Completo</label>
                      <input type="text" class="form-control" name="aluno['nome_completo']" style="text-transform: uppercase;" value="<?php echo $aluno['nome_completo']; ?>">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="data_nascimento">Data Nascimento</label>
                      <input type="date" class="form-control" name="aluno['data_nascimento']" value="<?php echo $aluno['data_nascimento']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                      <label for="hora_nascimento">Hora Nascimento</label>
                      <input type="time" class="form-control" name="aluno['hora_nascimento']" value="<?php echo $aluno['hora_nascimento']; ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-2">
                      <label for="signo">Signo</label>
                        <select class="form-control" name="aluno['signo']" value="<?php echo $aluno['signo']; ?>">
                            <option value="Aquário">Aquário</option>
                            <option value="Peixes">Peixes</option>
                            <option value="Áries">Áries</option>
                            <option value="Trouro">Touro</option>
                            <option value="Gêmeos">Gêmeos</option>
                            <option value="Câncer">Câncer</option>
                            <option value="Leão">Leão</option>
                            <option value="Virgem">Virgem</option>
                            <option value="Libra">Libra</option>
                            <option value="Escorpião">Escorpião</option>
                            <option value="Sagitário">Sagitário</option>
                            <option value="Capricórnio">Capricórnio</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="estado_civil">Estado Civil</label>
                        <select class="form-control" name="aluno['estado_civil']" value="<?php echo $aluno['estado_civil']; ?>">
                            <option value="Solteiro(a)">Solteiro(a)</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Divorciado(a)">Divorciado(a)</option>
                            <option value="Viúvo(a)">Viúvo(a)</option>
                            <option value="Separado(a)">Separado(a)</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="profissao">Profissão</label>
                      <input type="text" class="form-control" name="aluno['profissao']" value="<?php echo $aluno['profissao']; ?>">
                    </div>

                    <div class="form-group col-md-4">
                      <label for="endereco_residencial">Endereço Residencial</label>
                      <input type="text" class="form-control" name="aluno['endereco_residencial']" value="<?php echo $aluno['endereco_residencial']; ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-2">
                      <label for="cep">CEP</label>
                      <input type="text" class="form-control" name="aluno['cep']" value="<?php echo $aluno['cep']; ?>">
                    </div>
                      
                    <div class="form-group col-md-3">
                      <label for="bairro">Bairro</label>
                      <input type="text" class="form-control" name="aluno['bairro']" value="<?php echo $aluno['bairro']; ?>">
                    </div>                    

                    <div class="form-group col-md-2">
                      <label for="cidade">Cidade</label>
                      <input type="text" class="form-control" name="aluno['cidade']" value="<?php echo $aluno['cidade']; ?>">
                    </div>

                    <div class="form-group col-md-1">
                      <label for="estado">Estado</label>
                      <input type="text" class="form-control" name="aluno['estado']" value="<?php echo $aluno['estado']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                      <label for="telefone">Telefone</label>
                      <input type="text" class="form-control" name="aluno['telefone']" value="<?php echo $aluno['telefone']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                      <label for="celular">Celular</label>
                      <input type="text" class="form-control" name="aluno['celular']" value="<?php echo $aluno['celular']; ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="email">E-mail</label>
                      <input type="text" class="form-control" name="aluno['email']" style="text-transform: lowercase;" value="<?php echo $aluno['email']; ?>">
                    </div>
                  </div>

                  <div id="actions" class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Salvar</button>
                      <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>