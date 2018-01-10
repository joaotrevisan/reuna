<?php
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<div class="container" style="padding-top: 5%;">
    <center>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-link fa-2x"></i>
                <h3>Matrícula</h3>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="form-group col-md-3" align="left">
                      <label for="estado_civil">Curso</label>
                        <select class="form-control" name="aluno['estado_civil']">
                            <option value="">Básico 1</option>
                            <option value="">Básico 2</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3" align="left">
                        <label for="estado_civil">Aluno</label>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="pesquisar por nome...">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fas fa-search"></i></button>
                          </span>
                        </div><!-- /input-group -->  
                    </div>
                    <div class="form-group col-md-1">
                        <br>
                        <i class="fas fa-arrow-right fa-2x"></i>
                    </div>
                    <div class="form-group col-md-3" align="left">
                      <label for="estado_civil">Curso Destino</label>
                        <select class="form-control" name="aluno['estado_civil']">
                            <option value="">Básico 1</option>
                            <option value="">Básico 2</option>
                        </select>
                    </div>                                      
                    <div class="form-group col-md-2">
                        <br>
                        <button type="button" class="btn btn-lg btn-success">Aplicar</button>
                    </div>
                </div>
                <hr>
                
                <div class="row">
                    <div class="col-3">
                        <b>Seleção</b>
                    </div>        
                    <div class="col-5" align="left">
                        <b>Aluno</b>
                    </div>            
                    <div class="col-4"  align="left">
                        <b>Curso Atual</b>
                    </div>                                                   
                </div>
                <?php if ($alunos) : ?>
                    <?php foreach ($alunos as $aluno) : ?>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-success active">
                                        <input type="checkbox" checked autocomplete="off"> <i class="fas fa-check"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-5" align="left">
                                <?php echo $aluno['nome_completo']; ?>
                            </div>
                            <div class="col-4" align="left">
                                <?php echo $aluno['signo']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                        <?php else : ?>
                        <hr>
                        <div class="row">
                            <div class="col">
                                Nenhum registro encontrado.
                            </div>
                        </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </center>
</div>

<?php include(FOOTER_TEMPLATE); ?>

<script>
   function pesquisarNomeOnInput()
    {
        var x = document.getElementById("pesquisarNome").value;
        
        document.getElementById("pesquisarLink").href="index.php?nome="+x;
   }
    
   
</script>