<?php 
  require_once('functions.php'); 
  require_once('../constants.php'); 
  add(); 
  listarMonitores();
?>

<?php include(HEADER_TEMPLATE); ?>

<div class="container" style="padding-top: 5%;">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <center>
                    <h3 align="left"><i class="fas fa-calendar-alt fa-1x"></i>&nbsp;&nbsp;&nbsp;Cursos e Preceptorias</h3>
                </center>
            </div>
            <div class="card-body">
                <form action="add.php" method="post">
                  <!-- area de campos do form -->
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" name="curso['nome']" style="text-transform: uppercase;">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="letra">Letra/Número</label>
                      <input type="text" class="form-control" name="curso['letra']" style="text-transform: uppercase;">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="id_monitor">Monitor</label>
                        <select class="form-control" name="curso['id_monitor']" id="selectMonitor" onchange="selectMonitorFunction()">
                            <!-- DEVE RECUPERAR OS ALUNOS "monitores" E PREENCHER O ARRAY -->
                            <?php if ($monitores) : ?>
                                <?php foreach ($monitores as $monitor) : ?>
                                    <option value="<?php echo $monitor['id']; ?>"><?php echo $monitor['nome_completo']; ?></option>
                                <?php endforeach; ?>
                                <?php else : ?>
                                    <option value="">Nenhum registro encontrado</option>
                                <?php endif; ?>
                        </select>
                        <?php if ($monitores) : ?>                           
                            <input type="hidden" value="<?php echo $monitores[0]['nome_completo']; ?>" name="curso['nome_monitor']" id="inputMonitor"/>
                         <?php endif; ?>
                    </div>
                  </div>

                   <div class="row">
                    <div class="form-group col-md-3">
                      <label for="estado">Estado</label>
                        <select class="form-control" name="curso['estado']">
                            <option value="<?= CURSO_ESTADO_ANDAMENTO ?>"><?= CURSO_ESTADO_ANDAMENTO ?></option>
                            <option value="<?= CURSO_ESTADO_CANCELADO ?>"><?= CURSO_ESTADO_CANCELADO ?></option>
                            <option value="<?= CURSO_ESTADO_CONCLUIDO ?>"><?= CURSO_ESTADO_CONCLUIDO ?></option>
                        </select>
                    </div>
                       
                    <div class="form-group col-md-3">
                      <label for="data_inicio">Início</label>
                      <input type="date" class="form-control" name="curso['data_inicio']">
                    </div>
                       
                    <div class="form-group col-md-3">
                      <label for="data_termino">Término</label>
                      <input type="date" class="form-control" name="curso['data_termino']">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="tipo">Tipo</label>
                        <select class="form-control" name="curso['tipo']">
                            <option value="<?= CURSO_TIPO_CURSO ?>"><?= CURSO_TIPO_CURSO ?></option>
                            <option value="<?= CURSO_TIPO_PRECEPTORIA ?>"><?= CURSO_TIPO_PRECEPTORIA ?></option>                            
                        </select>
                    </div>                   
                  </div>
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

<?php include(FOOTER_TEMPLATE); ?>

<script>
    // Quando alterado a combo -> guarda o nome do monitor no input
    function selectMonitorFunction()
    {
        var x = document.getElementById("selectMonitor").selectedIndex;
        document.getElementById('inputMonitor').value=  document.getElementsByTagName("option")[x].text;
    }
</script>