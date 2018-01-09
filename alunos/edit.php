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
                  <!-- area de campos do form -->
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
                            <option <?php if ($aluno['signo'] == 'Aquario') echo 'selected'; ?> value="Aquario">Aquário</option>
                            <option <?php if ($aluno['signo'] == 'Peixes') echo 'selected'; ?> value="Peixes">Peixes</option>
                            <option <?php if ($aluno['signo'] == 'Aries') echo 'selected'; ?> value="Aries">Áries</option>
                            <option <?php if ($aluno['signo'] == 'Trouro') echo 'selected'; ?> value="Trouro">Touro</option>
                            <option <?php if ($aluno['signo'] == 'Gemeos') echo 'selected'; ?> value="Gemeos">Gêmeos</option>
                            <option <?php if ($aluno['signo'] == 'Cancer') echo 'selected'; ?> value="Cancer">Câncer</option>
                            <option <?php if ($aluno['signo'] == 'Leao') echo 'selected'; ?> value="Leao">Leão</option>
                            <option <?php if ($aluno['signo'] == 'Virgem') echo 'selected'; ?> value="Virgem">Virgem</option>
                            <option <?php if ($aluno['signo'] == 'Libra') echo 'selected'; ?> value="Libra">Libra</option>
                            <option <?php if ($aluno['signo'] == 'Escorpiao') echo 'selected'; ?> value="Escorpiao">Escorpião</option>
                            <option <?php if ($aluno['signo'] == 'Sagitario') echo 'selected'; ?> value="Sagitario">Sagitário</option>
                            <option <?php if ($aluno['signo'] == 'Capricornio') echo 'selected'; ?> value="Capricornio">Capricórnio</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="estado_civil">Estado Civil</label>
                        <select class="form-control" name="aluno['estado_civil']" value="<?php echo $aluno['estado_civil']; ?>">
                            <option <?php if ($aluno['estado_civil'] == 'Solteiro') echo 'selected'; ?> value="Solteiro">Solteiro(a)</option>
                            <option <?php if ($aluno['estado_civil'] == 'Casado') echo 'selected'; ?> value="Casado">Casado(a)</option>
                            <option <?php if ($aluno['estado_civil'] == 'Divorciado') echo 'selected'; ?> value="Divorciado">Divorciado(a)</option>
                            <option <?php if ($aluno['estado_civil'] == 'Viuvo') echo 'selected'; ?> value="Viuvo">Viúvo(a)</option>
                            <option <?php if ($aluno['estado_civil'] == 'Separado') echo 'selected'; ?> value="Separado">Separado(a)</option>
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