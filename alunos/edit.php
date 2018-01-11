<?php 
  require_once('functions.php'); 
  require_once('../constants.php');
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<div class="container" style="padding-top: 5%;">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <center>
                    <h3 align="left"><i class="fas fa-graduation-cap fa-1x"></i>&nbsp;&nbsp;&nbsp;Alunos</h3>
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
                            <option <?php if ($aluno['signo'] == SIGNO_AQUARIO) echo 'selected'; ?> value="<?= SIGNO_AQUARIO ?>"><?= SIGNO_AQUARIO ?></option>
                            <option <?php if ($aluno['signo'] == SIGNO_PEIXES) echo 'selected'; ?> value="<?= SIGNO_PEIXES ?>"><?= SIGNO_PEIXES ?></option>
                            <option <?php if ($aluno['signo'] == SIGNO_ARIES) echo 'selected'; ?> value="<?= SIGNO_ARIES ?>"><?= SIGNO_ARIES ?></option>
                            <option <?php if ($aluno['signo'] == SIGNO_TOURO) echo 'selected'; ?> value="<?= SIGNO_TOURO ?>"><?= SIGNO_TOURO ?></option>
                            <option <?php if ($aluno['signo'] == SIGNO_GEMEOS) echo 'selected'; ?> value="<?= SIGNO_GEMEOS ?>"><?= SIGNO_GEMEOS ?></option>
                            <option <?php if ($aluno['signo'] == SIGNO_CANCER) echo 'selected'; ?> value="<?= SIGNO_CANCER ?>"><?= SIGNO_CANCER ?></option>
                            <option <?php if ($aluno['signo'] == SIGNO_LEAO) echo 'selected'; ?> value="<?= SIGNO_LEAO ?>"><?= SIGNO_LEAO ?></option>
                            <option <?php if ($aluno['signo'] == SIGNO_VIRGEM) echo 'selected'; ?> value="<?= SIGNO_VIRGEM ?>"><?= SIGNO_VIRGEM ?></option>
                            <option <?php if ($aluno['signo'] == SIGNO_LIBRA) echo 'selected'; ?> value="<?= SIGNO_LIBRA ?>"><?= SIGNO_LIBRA ?></option>
                            <option <?php if ($aluno['signo'] == SIGNO_ESCORPIAO) echo 'selected'; ?> value="<?= SIGNO_ESCORPIAO ?>"><?= SIGNO_ESCORPIAO ?></option>
                            <option <?php if ($aluno['signo'] == SIGNO_SAGITARIO) echo 'selected'; ?> value="<?= SIGNO_SAGITARIO ?>"><?= SIGNO_SAGITARIO ?></option>
                            <option <?php if ($aluno['signo'] == SIGNO_CAPRICORNIO) echo 'selected'; ?> value="<?= SIGNO_CAPRICORNIO ?>"><?= SIGNO_CAPRICORNIO ?></option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="estado_civil">Estado Civil</label>
                        <select class="form-control" name="aluno['estado_civil']" value="<?php echo $aluno['estado_civil']; ?>">
                            <option <?php if ($aluno['estado_civil'] == ESTADO_CIVIL_SOLTEIRO) echo 'selected'; ?> value="<?= ESTADO_CIVIL_SOLTEIRO ?>"><?= ESTADO_CIVIL_SOLTEIRO ?></option>
                            <option <?php if ($aluno['estado_civil'] == ESTADO_CIVIL_CASADO) echo 'selected'; ?> value="<?= ESTADO_CIVIL_CASADO ?>"><?= ESTADO_CIVIL_CASADO ?></option>
                            <option <?php if ($aluno['estado_civil'] == ESTADO_CIVIL_DIVORCIADO) echo 'selected'; ?> value="<?= ESTADO_CIVIL_DIVORCIADO ?>"><?= ESTADO_CIVIL_DIVORCIADO ?></option>
                            <option <?php if ($aluno['estado_civil'] == ESTADO_CIVIL_VIUVO) echo 'selected'; ?> value="<?= ESTADO_CIVIL_VIUVO ?>"><?= ESTADO_CIVIL_VIUVO ?></option>
                            <option <?php if ($aluno['estado_civil'] == ESTADO_CIVIL_SEPARADO) echo 'selected'; ?> value="<?= ESTADO_CIVIL_SEPARADO ?>"><?= ESTADO_CIVIL_SEPARADO ?></option>
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
                    <div class="form-group col-md-6">
                      <label for="email">E-mail</label>
                      <input type="text" class="form-control" name="aluno['email']" style="text-transform: lowercase;" value="<?php echo $aluno['email']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="indicacao">Indicação</label>
                      <input type="text" class="form-control" name="aluno['indicacao']" value="<?php echo $aluno['indicacao']; ?>">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="tipo">Tipo</label>
                        <select class="form-control" name="aluno['tipo']" value="<?php echo $aluno['tipo']; ?>">
                            <option <?php if ($aluno['tipo'] == ALUNO_TIPO_ALUNO) echo 'selected'; ?> value="<?= ALUNO_TIPO_ALUNO ?>"><?= ALUNO_TIPO_ALUNO ?></option>
                            <option <?php if ($aluno['tipo'] == ALUNO_TIPO_MONITOR) echo 'selected'; ?> value="<?= ALUNO_TIPO_MONITOR ?>"><?= ALUNO_TIPO_MONITOR ?></option>
                        </select>
                    </div>
                  </div>
                    <br> <!-- colocar como padrao -->
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