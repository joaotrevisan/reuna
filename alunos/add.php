<?php 
  require_once('functions.php'); 
  require_once('../constants.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>
<div class="container" style="padding-top: 5%;">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <center>
                    <h3 align="left"><i class="fas fa-graduation-cap fa-1x"></i>&nbsp;&nbsp;&nbsp;Aluno</h3>
                </center>
            </div>
            <div class="card-body">
                <form action="add.php" id="form" method="post">
                    <div class="row">
                        <div class="col-md-2" style="border-right: 2px solid rgb(235,235,235);">
                            <center>
                                <img class="form-control" src="" alt="Nenhuma foto selecionada" style="width:150px; height:200px;">
                                <hr>
                                <input type="file" name="aluno['foto']" id="inpFileFoto" style="width:133px;" onchange="receberFoto()">
                                <br>
                                <br>
                                <input type="text" name="foto" id="inpTxtFoto" class="form-control" disabled>
                            </center>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="nome_completo">Nome Completo</label>
                                  <input type="text" class="form-control" name="aluno['nome_completo']" id="nome" style="text-transform: uppercase;">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="data_nascimento">Data Nascimento</label>
                                  <input type="date" class="form-control" name="aluno['data_nascimento']">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="hora_nascimento">Hora Nascimento</label>
                                  <input type="time" class="form-control" name="aluno['hora_nascimento']">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-2">
                                  <label for="signo">Signo</label>
                                    <select class="form-control" name="aluno['signo']">
                                        <option value="<?= SIGNO_AQUARIO ?>"><?= SIGNO_AQUARIO ?></option>
                                        <option value="<?= SIGNO_PEIXES ?>"><?= SIGNO_PEIXES ?></option>
                                        <option value="<?= SIGNO_ARIES ?>"><?= SIGNO_ARIES ?></option>
                                        <option value="<?= SIGNO_TOURO ?>"><?= SIGNO_TOURO ?></option>
                                        <option value="<?= SIGNO_GEMEOS ?>"><?= SIGNO_GEMEOS ?></option>
                                        <option value="<?= SIGNO_CANCER ?>"><?= SIGNO_CANCER ?></option>
                                        <option value="<?= SIGNO_LEAO ?>"><?= SIGNO_LEAO ?></option>
                                        <option value="<?= SIGNO_VIRGEM ?>"><?= SIGNO_VIRGEM ?></option>
                                        <option value="<?= SIGNO_LIBRA ?>"><?= SIGNO_LIBRA ?></option>
                                        <option value="<?= SIGNO_ESCORPIAO ?>"><?= SIGNO_ESCORPIAO ?></option>
                                        <option value="<?= SIGNO_SAGITARIO ?>"><?= SIGNO_SAGITARIO ?></option>
                                        <option value="<?= SIGNO_CAPRICORNIO ?>"><?= SIGNO_CAPRICORNIO ?></option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="estado_civil">Estado Civil</label>
                                    <select class="form-control" name="aluno['estado_civil']">
                                        <option value="<?= ESTADO_CIVIL_SOLTEIRO ?>"><?= ESTADO_CIVIL_SOLTEIRO ?></option>
                                        <option value="<?= ESTADO_CIVIL_CASADO ?>"><?= ESTADO_CIVIL_CASADO ?></option>
                                        <option value="<?= ESTADO_CIVIL_DIVORCIADO ?>"><?= ESTADO_CIVIL_DIVORCIADO ?></option>
                                        <option value="<?= ESTADO_CIVIL_VIUVO ?>"><?= ESTADO_CIVIL_VIUVO ?></option>
                                        <option value="<?= ESTADO_CIVIL_SEPARADO ?>"><?= ESTADO_CIVIL_SEPARADO ?></option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="profissao">Profissão</label>
                                  <input type="text" class="form-control" name="aluno['profissao']">
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="endereco_residencial">Endereço Residencial</label>
                                  <input type="text" class="form-control" name="aluno['endereco_residencial']">
                                </div>
                              </div>

                              <div class="row">

                                <div class="form-group col-md-2">
                                  <label for="cep">CEP</label>
                                  <input type="text" class="form-control" name="aluno['cep']">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="bairro">Bairro</label>
                                  <input type="text" class="form-control" name="aluno['bairro']">
                                </div>

                                <div class="form-group col-md-2">
                                  <label for="cidade">Cidade</label>
                                  <input type="text" class="form-control" name="aluno['cidade']" value="Piracicaba">
                                </div>

                                <div class="form-group col-md-1">
                                  <label for="estado">Estado</label>
                                  <input type="text" class="form-control" name="aluno['estado']" value="SP">
                                </div>

                                <div class="form-group col-md-2">
                                  <label for="telefone">Telefone</label>
                                  <input type="text" class="form-control" name="aluno['telefone']">
                                </div>

                                <div class="form-group col-md-2">
                                  <label for="celular">Celular</label>
                                  <input type="text" class="form-control" name="aluno['celular']" >
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-4">
                                  <label for="email">E-mail</label>
                                  <input type="text" class="form-control" name="aluno['email']" style="text-transform: lowercase;">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="indicacao">Indicação</label>
                                  <input type="text" class="form-control" name="aluno['indicacao']">
                                </div>

                                <div class="form-group col-md-2">
                                  <label for="tipo">Tipo</label>
                                    <select class="form-control" name="aluno['tipo']">
                                        <option value="<?= ALUNO_TIPO_ALUNO ?>"><?= ALUNO_TIPO_ALUNO ?></option>
                                        <option value="<?= ALUNO_TIPO_MONITOR ?>"><?= ALUNO_TIPO_MONITOR ?></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="data_entrevista">Data de entrevista</label>
                                    <input type="date" class="form-control" name="aluno['data_entrevista']">
                                </div>
                              </div>

                               <!-- CURSO = ALUNO_NOVO ============================================= -->
                               <input type="hidden" class="form-control" name="aluno['curso_atual']" value="ALUNO_NOVO">
                        </div>
                        </div>
                  <!-- area de campos do form -->
                  
                    
                   <br> <!-- colocar como padrao -->
                  <div id="actions" class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-outline-success"><i class="fas fa-plus"></i> Adicionar</button>
                      <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                  </div>
                    
                </form>
            </div>
        </div>
        
      
        
        
    </div>
</div>

<script type="text/javascript">
    function receberFoto(){
        $foto = document.getElementById('inpFileFoto').value;
        document.getElementById("inpTxtFoto").value = $foto.slice(12);;
        document.getElementById("form").action = "add.php?f="+$foto.slice(12)+"&n="+document.getElementById("nome").value;
        alert("add.php?f="+$foto.slice(12)+"&n="+document.getElementById("nome").value);
    }
</script>

<?php include(FOOTER_TEMPLATE); ?>