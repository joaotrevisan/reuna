<?php 
  require_once('functions.php'); 
  require_once('../constants.php'); 

if (isset($_GET['idAluno']))
    $idAluno = $_GET['idAluno'];
if (isset($_GET['nomeAluno']))
    $nomeAluno = $_GET['nomeAluno'];
if (isset($_GET['nomeCurso']))
    $nomeCurso = $_GET['nomeCurso'];

edit($idAluno);
?>

<?php include(HEADER_TEMPLATE); ?>

<div class="container" style="padding-top: 5%;">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <center>
                    <h3 align="left"><i class="fas fa-list fa-1x"></i>&nbsp;&nbsp;&nbsp;Inscrição</h3>       
                </center>
            </div>            
            <div class="card-body">
                <form action="edit.php?id=<?php echo $matricula['id']; ?>&idAluno=<?php echo $idAluno; ?>" method="post">
                  <!-- area de campos do form -->
                  <div class="row">
                    <div class="form-group col-md-5">
                      <label for="nome">Aluno</label>
                      <input type="text" class="form-control" name="matricula['id_aluno']" style="text-transform: uppercase;" value="<?php echo $nomeAluno; ?>" disabled>
                    </div>
                      
                    <div class="form-group col-md-3">
                      <label for="nome">Curso</label>
                      <input type="text" class="form-control" name="matricula['id_curso']" style="text-transform: uppercase;" value="<?php echo $nomeCurso ?>" disabled>
                    </div>
                      
                    <div class="form-group col-md-3">
                        <label for="situacao">Situação</label>
                        <select class="form-control" name="matricula['estado']" value="<?php echo $matricula['estado']; ?>">
                            <option <?php if ($matricula['estado'] == MATRICULA_TIPO_INSCRITO) echo 'selected'; ?> value="<?= MATRICULA_TIPO_INSCRITO ?>"><?= MATRICULA_TIPO_INSCRITO ?></option>
                            <option <?php if ($matricula['estado'] == MATRICULA_TIPO_REPETICAO) echo 'selected'; ?> value="<?= MATRICULA_TIPO_REPETICAO ?>"><?= MATRICULA_TIPO_REPETICAO ?></option>
                            <option <?php if ($matricula['estado'] == MATRICULA_TIPO_CONCLUIDO) echo 'selected'; ?> value="<?= MATRICULA_TIPO_CONCLUIDO ?>"><?= MATRICULA_TIPO_CONCLUIDO ?></option>
                            <option <?php if ($matricula['estado'] == MATRICULA_TIPO_DESISTENCIA) echo 'selected'; ?> value="<?= MATRICULA_TIPO_DESISTENCIA ?>"><?= MATRICULA_TIPO_DESISTENCIA ?></option>
                            <option <?php if ($matricula['estado'] == MATRICULA_TIPO_INCOMPLETO) echo 'selected'; ?> value="<?= MATRICULA_TIPO_INCOMPLETO ?>"><?= MATRICULA_TIPO_INCOMPLETO ?></option>
                            <option <?php if ($matricula['estado'] == MATRICULA_TIPO_REPOSICAO) echo 'selected'; ?> value="<?= MATRICULA_TIPO_REPOSICAO ?>"><?= MATRICULA_TIPO_REPOSICAO ?></option>
                        </select>
                    </div>
                      
                    <div class="form-group col-md-1">
                      <label for="nome">Cadeira</label>
                      <input type="text" class="form-control" name="matricula['cadeira']" style="text-transform: uppercase;" value="<?php echo $matricula['cadeira']; ?>">
                      </div>
                </div>
                    
                <div class="row">
                    <div class="form-group col-md-1">
                      <label for="nome">SEG</label>
                      <input type="text" maxlength="1" class="form-control" name="matricula['falta_seg']" style="text-transform: uppercase;" value="<?php echo $matricula['falta_seg']; ?>">
                    </div>
                      
                    <div class="form-group col-md-1">
                      <label for="nome">TER</label>
                      <input type="text" maxlength="1" class="form-control" name="matricula['falta_ter']" style="text-transform: uppercase;" value="<?php echo $matricula['falta_ter']; ?>">
                    </div>
                      
                    <div class="form-group col-md-1">
                      <label for="nome">QUA</label>
                      <input type="text" maxlength="1" class="form-control" name="matricula['falta_qua']" style="text-transform: uppercase;" value="<?php echo $matricula['falta_qua']; ?>">
                    </div>
                      
                    <div class="form-group col-md-1">
                      <label for="nome">AQUI</label>
                      <input type="text" maxlength="1" class="form-control" name="matricula['falta_qui']" style="text-transform: uppercase;" value="<?php echo $matricula['falta_qui']; ?>">
                    </div>
                    
                    <div class="form-group col-md-1">
                      <label for="nome">SEX</label>
                      <input type="text" maxlength="1" class="form-control" name="matricula['falta_sex']" style="text-transform: uppercase;" value="<?php echo $matricula['falta_sex']; ?>">
                    </div>
                    
                    <div class="form-group col-md-1">
                      <label for="nome">SAB</label>
                      <input type="text" maxlength="1" class="form-control" name="matricula['falta_sab']" style="text-transform: uppercase;" value="<?php echo $matricula['falta_sab']; ?>">
                    </div>
                    
                    <div class="form-group col-md-1">
                      <label for="nome">DOM</label>
                      <input type="text" maxlength="1" class="form-control" name="matricula['falta_dom']" style="text-transform: uppercase;" value="<?php echo $matricula['falta_dom']; ?>">
                    </div>
                </div>
                    

                  <br> <!-- colocar como padrao -->
                  <div id="actions" class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Salvar</button>
                      <a href="../alunos/edit.php?id=<?= $idAluno ?>" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>

<script>
    // Quando alterado a combo -> guarda o nome do monitor no input
    function selectMonitorFunction()
    {
        var x = document.getElementById("selectMonitor").selectedIndex;
        document.getElementById('inputMonitor').value=  document.getElementsByTagName("option")[x].text;
    }
</script>