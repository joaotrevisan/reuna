<?php
    require_once('functions.php');

    if(isset($_GET['idCursoAtual']))
        index($_GET['idCursoAtual']);
    else
        index();
?>

<?php include(HEADER_TEMPLATE); ?>

<div class="container" style="padding-top: 5%;">
    <center>
    <div class="container">
        <div class="card">
            <div class="card-header">
               <h3 align="left"><i class="fas fa-list fa-1x"></i>&nbsp;&nbsp;&nbsp;Inscrição</h3>                
            </div>
            <div class="card-body">
                <form action="register.php" method="post" onsubmit="gerarListaAlunosOnSubmit();" id="formMatricula">
                    <div class="row">
                        <div class="form-group col-md-5" align="left">
                          <label for="estado_civil">Curso Atual</label>
                            <select class="form-control selectpicker" name="$curso['id']" id="cursoAtual" onchange="cursoAtualOnChange()" >                            
                                <?php if ($cursos) : ?>
                                    <?php foreach ($cursos as $curso) : ?>                                    
                                        <!-- monta o option de curso -->
                                        <option <?php
                                        if (isset($_GET['idCursoAtual'])) {
                                            if ($_GET['idCursoAtual'] == $curso['id']) {
                                                echo 'selected';
                                            }
                                        }
                                        ?>
                                        value="<?php
                                        echo ($curso['id']);
                                        ?>"> <?php
                                        echo ($curso['nome'] . " - " . $curso['letra']);
                                        ?></option>
                                        <!-- .... -->
                                    <?php endforeach; ?>                                
                                <?php else : ?>
                                    <option value="">Nenhum registro encontrado</option>
                                <?php endif; ?>
                            </select>
                        </div>                    
                        <div class="form-group col-md-1">
                            <br>
                            <i class="fas fa-arrow-right fa-2x"></i>
                        </div>
                        <div class="form-group col-md-4" align="left">
                          <label for="estado_civil">Curso Destino</label>
                            <select class="form-control" name="$curso['id']" id="cursoDestino">                            
                                <?php if ($cursos) : ?>
                                    <?php foreach ($cursos as $curso) : ?>
                                        <option value="<?php echo ($curso['id']) ?>"> <?php echo ($curso['nome'] ." - " . $curso['letra']) ?></option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <option value="">Nenhum registro encontrado</option>
                                <?php endif; ?>
                            </select>
                        </div>                                      
                        <div class="form-group col-md-1">
                            <br><button type="submit" class="btn btn-md btn-outline-success"><i class="fas fa-edit"></i> Inscrever</button>
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
                                            <input type="checkbox" checked autocomplete="off" name="CHECK_ALUNO" id="<?php echo $aluno['id']; ?>"> <i class="fas fa-check"></i>
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
                </form>
              </div>
            </div>
        </div>
    </center>
</div>

<?php include(FOOTER_TEMPLATE); ?>

<script>

    function cursoAtualOnChange(){
        
        var idCursoAtual = document.getElementById("cursoAtual").value;
        
        window.location.href = "index.php?idCursoAtual="+idCursoAtual;
    }
    
    //Para cada check de aluno -> recupera o id e monta a variavel para o url de registro
    
    function gerarListaAlunosOnSubmit(){
        
        var checkedBoxes = getCheckedBoxes("CHECK_ALUNO");
        var listIds = new Array;
        
        for (var i=0; i<checkedBoxes.length; i++) {            
            listIds.push(checkedBoxes[i].id);  
        }
        
        //Modifica o submit do form passando os ids selecionados
        
        document.getElementById("formMatricula").action="register.php?".listIds;
        
        event.preventDefault();
    }
    
    // Pass the checkbox name to the function
    function getCheckedBoxes(chkboxName) {
      var checkboxes = document.getElementsByName(chkboxName);
      var checkboxesChecked = [];
      // loop over them all
      for (var i=0; i<checkboxes.length; i++) {
         // And stick the checked ones onto an array...
         if (checkboxes[i].checked) {
            checkboxesChecked.push(checkboxes[i]);
         }
      }
      // Return the array if it is non-empty, or null
      return checkboxesChecked.length > 0 ? checkboxesChecked : null;
    }

    
   
</script>