<?php 
  require_once('functions.php'); 
  add();
  $id_monitor = 0;
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
                    <div class="form-group col-md-4">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" name="curso['nome']" style="text-transform: uppercase;">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="letra">Letra</label>
                      <input type="text" class="form-control" name="curso['letra']" style="text-transform: uppercase;">
                    </div>
                    <div class="col-lg-6">
                        <label for="letra">Monitor</label>
                        <div class="input-group">
                          <input type="text" class="form-control" name="curso['id_monitor']" disabled value="<?php echo $id_monitor; ?>">
                          <span class="input-group-btn">
                              <a href="#" data-toggle="modal" data-target="#modal-monitor" data-curso="<?php echo $curso['id']; ?>">
                                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i> Buscar</button>
                              </a>
                          </span>
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                  </div>

                   <div class="row">
                    <div class="form-group col-md-4">
                      <label for="estado">Estado</label>
                        <select class="form-control" name="curso['estado']">
                            <option value="Andamento">Andamento</option>
                            <option value="Cancelado">Cancelado</option>
                            <option value="Concluido">Concluído</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="tipo">Tipo</label>
                        <select class="form-control" name="curso['tipo']">
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

<?php include('modal_monitor.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>