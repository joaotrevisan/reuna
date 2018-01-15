<?php 
  require_once('functions.php'); 
  require_once('../constants.php');
  edit();
  listaMatriculasAluno();
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
                <form action="edit.php?id=<?php echo $aluno['id']; ?>" id="form" method="post">
                  <!-- area de campos do form -->
                <div class="row">
                    <div class="col-md-2" style="border-right: 2px solid rgb(235,235,235);">
                        <center>
                            <img class="form-control" src="fotos/copy/<?php echo $aluno['foto']; ?>" id="imgFoto" alt="Nenhuma foto selecionada" style="width:150px; height:200px;">
                            <hr>
                            <input type="file" id="inpFileFoto" style="width:133px;" onchange="receberFoto()">
                            <br>
                            <br>
                            <input  hidden type="text" name="foto" id="inpTxtFoto" id="inpTxtFoto" value="<?php echo $aluno['foto']; ?>" class="form-control" disabled>
                        </center>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="form-group col-md-6">
                              <label for="nome_completo">Nome Completo</label>
                              <input type="text" class="form-control" name="aluno['nome_completo']" id="nome" style="text-transform: uppercase;" value="<?php echo $aluno['nome_completo']; ?>">
                            </div>

                            <div class="form-group col-md-3">
                              <label for="data_nascimento">Data Nascimento</label>
                              <input type="date" class="form-control" name="aluno['data_nascimento']" value="<?php echo $aluno['data_nascimento']; ?>">
                            </div>

                            <div class="form-group col-md-3">
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
        
        <br><br>
            <!-- CURSOS QUE O ALUNO JA SE MATRICULOU -->
            <div class="card">
                <div class="card-header">
                    <center>
                        <h5 align="left"><i class="fas fa-list fa-1x"></i>&nbsp;&nbsp;&nbsp;Inscrições</h5> 
                    </center>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                      <!-- area de campos do form -->
                        
                        <div class="row">
                            <div class="form-group col-md-2">
                              <label for="x">Data</label>                              
                            </div>
                            <div class="form-group col-md-2">
                              <label for="x">Curso</label>                              
                            </div>
                            <div class="form-group col-md-1">
                              <label for="x">Situação</label>                              
                            </div>
                            <div class="form-group col-md-1" align="center">
                              <label for="x">Cadeira</label>                              
                            </div>
                            
                            <div class="col-md-5">
                                <div class="row" align="center">
                                    <div class="form-group col-md-1">
                                      <label for="x">SEG</label>                              
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label for="x">TER</label>                              
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label for="x">QUA</label>                              
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label for="x">QUI</label>                              
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label for="x">SEX</label>                              
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label for="x">SAB</label>                              
                                    </div>
                                    <div class="form-group col-md-1">
                                      <label for="x">DOM</label>                              
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                              <label for="x"></label>                              
                            </div>
                            
                        </div>
                        
                      <?php if ($matriculas) : ?>
                        <?php foreach ($matriculas as $m) : ?>
                        <hr>
                          <div class="row">                                                            
                            <div class="form-group col-md-2">
                              <label for="x"><?php echo $m['data_inscricao']; ?></label>                              
                            </div>                              
                            <div class="form-group col-md-2">
                              <label for="x"><?php echo $m['nome_curso']; ?></label>                              
                            </div>
                            <div class="form-group col-md-1">
                              <label for="x"><?php echo $m['estado']; ?></label>                              
                            </div>
                            <div class="form-group col-md-1" align="center">
                              <label for="x"><?php echo $m['cadeira']; ?></label>                              
                            </div>   
                            
                              <div class="col-md-5">
                                <div class="row" align="center">
                                    <div class="form-group col-md-1">
                                      <label for="x"><?= $m['falta_seg'] ?></label>                              
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label for="x"><?= $m['falta_ter'] ?></label>                              
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label for="x"><?= $m['falta_qua'] ?></label>                              
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label for="x"><?= $m['falta_qui'] ?></label>                              
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label for="x"><?= $m['falta_sex'] ?></label>                              
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label for="x"><?= $m['falta_sab'] ?></label>                              
                                    </div>
                                    <div class="form-group col-md-1">
                                      <label for="x"><?= $m['falta_dom'] ?></label>                              
                                    </div> 
                                  </div>
                              </div>
                              
                              <div class="col">
                                <div class="btn-group" role="group">
                                    <a href="../matriculas/edit.php?id=<?php echo $m['id_matricula']; ?>&idAluno=<?php echo $m['id_aluno']; ?>&nomeAluno=<?php echo $m['nome_aluno']; ?>&nomeCurso=<?php echo $m['nome_curso']; ?>" class="btn btn-sm btn-outline-primary" >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </div>
                              </div>                                                       
                              
                          </div>
                        <?php endforeach; ?>
                        <?php else : ?>                            
                            <div class="col">
                                Nenhum registro encontrado.
                            </div>                            
                        <?php endif; ?>

                      <br> <!-- colocar como padrao -->
                      <div id="actions" class="row">
                        <div class="col-md-12">
                            <?php if ($matriculas) : ?>
                                <a href="../matriculas/index.php?idCursoAtual=<?php echo $matriculas[0]['id_curso']; ?>&idAlunoAtual=<?php echo $matriculas[0]['id_aluno']; ?>" class="btn btn-outline-info" >
                                    <i class="fas fa-exchange-alt fa-1x"></i> Transferir de Curso
                                </a> 
                            <?php endif; ?>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        
        
    </div>
</div>

<script type="text/javascript">
    function receberFoto(){
        
        document.getElementById("imgFoto").src = "fotos/"+document.getElementById('inpFileFoto').value.slice(12);
        
        var foto = document.getElementById('inpFileFoto').value;
        var imgArq = foto.slice(12);
        var imgFormato = imgArq.split(".")[1];
        
        var salvarNoBanco = document.getElementById("nome").value+"."+imgFormato;
        salvarNoBanco = salvarNoBanco.toLowerCase();
        salvarNoBanco = salvarNoBanco.replace(/ /g,"_");
        
        document.getElementById("form").action += "&f="+imgArq+"&n="+salvarNoBanco;
    }
</script>

<?php include(FOOTER_TEMPLATE); ?>