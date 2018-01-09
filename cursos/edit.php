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
                    <h3>Alterar Curso</h3>
                </center>
            </div>            
            <div class="card-body">
                <form action="edit.php?id=<?php echo $curso['id']; ?>" method="post">
                  <!-- area de campos do form -->
                  <div class="row">
                    <div class="form-group col-md-7">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" name="curso['nome']" style="text-transform: uppercase;" value="<?php echo $curso['nome']; ?>">
                    </div>

                    <div class="form-group col-md-1">
                      <label for="letra">Letra</label>                      
                      <input type="text" class="form-control" name="curso['letra']" style="text-transform: uppercase;" value="<?php echo $curso['letra']; ?>">
                    </div>

                    <div class="form-group col-md-4">
                      <label for="id_monitor">Monitor</label>
                      <input type="text" class="form-control" name="curso['id_monitor']" value="<?php echo $curso['id_monitor']; ?>">
                    </div>
                  </div>

                   <div class="row">
                    <div class="form-group col-md-4">
                      <label for="estado">Estado</label>
                        <select class="form-control" name="curso['estado']" value="<?php echo $curso['estado']; ?>">                        
                            <option <?php if ($curso['estado'] == 'Andamento') echo 'selected'; ?> value="Andamento">Andamento</option>
                            <option <?php if ($curso['estado'] == 'Cancelado') echo 'selected'; ?> value="Cancelado">Cancelado</option>
                            <option <?php if ($curso['estado'] == 'Concluido') echo 'selected'; ?> value="Concluido">Concluído</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="tipó">Tipo</label>                        
                        <select class="form-control" name="curso['tipo']" value="<?php echo $curso['tipo']; ?>">  
                            <option value="Curso">Curso</option>
                            <option value="Preceptoria">Preceptoria</option>                            
                        </select>
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