<?php 
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>
<div class="container" style="padding-top: 5%;">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <center>
                    <i class="fas fa-user-plus fa-2x"></i>
                    <h3>Adicionar Curso</h3>
                </center>
            </div>
            <div class="card-body">
                <form action="add.php" method="post">
                  <!-- area de campos do form -->
                  <div class="row">
                    <div class="form-group col-md-7">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" name="aluno['nome']" style="text-transform: uppercase;">
                    </div>

                    <div class="form-group col-md-1">
                      <label for="letra">Letra</label>
                      <input type="text" class="form-control" name="aluno['letra']" style="text-transform: uppercase;">
                    </div>

                    <div class="form-group col-md-4">
                      <label for="id_monitor">Monitor</label>
                      <input type="text" class="form-control" name="aluno['id_monitor']">
                    </div>
                  </div>

                   <div class="row">
                    <div class="form-group col-md-4">
                      <label for="estado">Estado</label>
                        <select class="form-control" name="aluno['estado']">
                            <option value="Andamento">Andamento</option>
                            <option value="Cancelado">Cancelado</option>
                            <option value="Concluido">Concluído</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="tipó">Tipo</label>
                        <select class="form-control" name="aluno['tipo']">
                            <option value="Curso">Curso</option>
                            <option value="Preceptoria">Preceptoria</option>                            
                        </select>
                    </div>                   
                  </div>

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