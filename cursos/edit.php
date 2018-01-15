<?php 
  require_once('functions.php'); 
  require_once('../constants.php'); 
  edit();
  listarMonitores();
  listarAlunosMatriculados();
?>

<?php include(HEADER_TEMPLATE); ?>

<div class="container" style="padding-top: 5%;">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <center>
                    <h3 align="left"><i class="fas fa-calendar-alt fa-1x"></i>&nbsp;&nbsp;&nbsp;Curso ou Preceptoria</h3>
                </center>
            </div>            
            <div class="card-body">
                <form action="edit.php?id=<?php echo $curso['id']; ?>" method="post">
                  <!-- area de campos do form -->
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" name="curso['nome']" style="text-transform: uppercase;" value="<?php echo $curso['nome']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                      <label for="letra">Letra/Número</label>                      
                      <input type="text" class="form-control" name="curso['letra']" style="text-transform: uppercase;" value="<?php echo $curso['letra']; ?>">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="id_monitor">Monitor</label>
                        <select class="form-control" name="curso['id_monitor']" id="selectMonitor" onchange="selectMonitorFunction()">
                            <!-- DEVE RECUPERAR OS ALUNOS "monitores" E PREENCHER O ARRAY -->
                            <?php if ($monitores) : ?>
                                <?php foreach ($monitores as $monitor) : ?>
                                    <option value="<?php echo $monitor['id']; ?>" <?php if ($monitor['nome_completo'] == $curso['nome_monitor']) echo 'selected'; ?>><?php echo $monitor['nome_completo']; ?></option>
                                <?php endforeach; ?>
                                <?php else : ?>
                                    <option value="">Nenhum registro encontrado</option>
                                <?php endif; ?>
                        </select>
                        <input type="hidden" value="<?php echo $curso['nome_monitor']; ?>" name="curso['nome_monitor']" id="inputMonitor"/>                        
                    </div>
                  </div>

                   <div class="row">
                    <div class="form-group col-md-3">
                      <label for="estado">Estado</label>
                        <select class="form-control" name="curso['estado']" value="<?php echo $curso['estado']; ?>">                        
                            <option <?php if ($curso['estado'] == CURSO_ESTADO_ANDAMENTO) echo 'selected'; ?> value="<?= CURSO_ESTADO_ANDAMENTO ?>"><?= CURSO_ESTADO_ANDAMENTO ?></option>
                            <option <?php if ($curso['estado'] == CURSO_ESTADO_CANCELADO) echo 'selected'; ?> value="<?= CURSO_ESTADO_CANCELADO ?>">"><?= CURSO_ESTADO_CANCELADO ?>"></option>
                            <option <?php if ($curso['estado'] == CURSO_ESTADO_CONCLUIDO) echo 'selected'; ?> value="<?= CURSO_ESTADO_CONCLUIDO ?>"><?= CURSO_ESTADO_CONCLUIDO ?></option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="tipó">Tipo</label>                        
                        <select class="form-control" name="curso['tipo']" value="<?php echo $curso['tipo']; ?>">  
                            <option <?php if ($curso['tipo'] == CURSO_TIPO_CURSO) echo 'selected'; ?> value="<?= CURSO_TIPO_CURSO ?>"><?= CURSO_TIPO_CURSO ?></option>
                            <option <?php if ($curso['tipo'] == CURSO_TIPO_PRECEPTORIA) echo 'selected'; ?> value="<?= CURSO_TIPO_PRECEPTORIA ?>"><?= CURSO_TIPO_PRECEPTORIA ?></option>                            
                        </select>
                    </div> 
                       
                    <div class="form-group col-md-3">
                      <label for="data_inicio">Início</label>
                      <input type="date" class="form-control" name="$curso['data_inicio']" value="<?php echo $curso['data_inicio']; ?>">
                    </div>
                       
                    <div class="form-group col-md-3">
                      <label for="data_termino">Término</label>
                      <input type="date" class="form-control" name="$curso['data_termino']" value="<?php echo $curso['data_termino']; ?>">
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
            <!-- ALUNOS MATRICULADAS NUM CURSO -->
            <div class="card">
                <div class="card-header">
                    <center>
                        <table style="width:100%"><tr>
                            <td><h5 align="left"><i class="fas fa-graduation-cap fa-1x"></i>&nbsp;&nbsp;&nbsp;Alunos</h5> </td>
                            <td align="right"><a href="#" class="btn btn-sm btn-outline-success" onclick="concluirTodoOnClick(this)" > <i class="fas fa-check fa-1x"></i> Concluir Todos</a> </td>
                            </tr></table>
                    </center>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                      <!-- area de campos do form -->
                        
                        <div class="row">
                            <div class="form-group col-md-2">
                              <label for="x">Aluno</label>                              
                            </div>
                            <div class="form-group col-md-2">
                              <label for="x">Situação</label>                              
                            </div>
                            <div class="form-group col-md-1" align="center">
                              <label for="x">Cadeira</label>                              
                            </div>
                            
                            <div class="form-group col-md-1" align="center">
                              <label for="x">SEG</label>                              
                            </div>
                            <div class="form-group col-md-1" align="center">
                              <label for="x">TER</label>                              
                            </div>
                            <div class="form-group col-md-1" align="center">
                              <label for="x">QUA</label>                              
                            </div>
                            <div class="form-group col-md-1" align="center">
                              <label for="x">QUI</label>                              
                            </div>
                            <div class="form-group col-md-1" align="center">
                              <label for="x">SEX</label>                              
                            </div>
                            <div class="form-group col-md-1" align="center">
                              <label for="x">SAB</label>                              
                            </div>
                            <div class="form-group col-md-1" align="center">
                              <label for="x">DOM</label>                              
                            </div>   
                        </div>
                        
                      <?php if ($matriculas) : ?>
                        <?php foreach ($matriculas as $m) : ?>
                        <hr>
                          <div class="row">                                                            
                            <div class="form-group col-md-2">
                              <label for="x" style="text-transform: uppercase;"><?php echo $m['nome_aluno']; ?></label>                              
                            </div>
                            <div class="form-group col-md-2">                                
                                <select class="form-control" id="<?= 'estado&'.$m['id_matricula']; ?>" value="<?= $m['estado']; ?>" onchange="atualizaCampoOnchange(this);">
                                    <option <?php if ($m['estado'] == MATRICULA_TIPO_INSCRITO) echo 'selected'; ?> value="<?= MATRICULA_TIPO_INSCRITO ?>"><?= MATRICULA_TIPO_INSCRITO ?></option>
                                    <option <?php if ($m['estado'] == MATRICULA_TIPO_REPETICAO) echo 'selected'; ?> value="<?= MATRICULA_TIPO_REPETICAO ?>"><?= MATRICULA_TIPO_REPETICAO ?></option>
                                    <option <?php if ($m['estado'] == MATRICULA_TIPO_CONCLUIDO) echo 'selected'; ?> value="<?= MATRICULA_TIPO_CONCLUIDO ?>"><?= MATRICULA_TIPO_CONCLUIDO ?></option>
                                    <option <?php if ($m['estado'] == MATRICULA_TIPO_DESISTENCIA) echo 'selected'; ?> value="<?= MATRICULA_TIPO_DESISTENCIA ?>"><?= MATRICULA_TIPO_DESISTENCIA ?></option>
                                    <option <?php if ($m['estado'] == MATRICULA_TIPO_INCOMPLETO) echo 'selected'; ?> value="<?= MATRICULA_TIPO_INCOMPLETO ?>"><?= MATRICULA_TIPO_INCOMPLETO ?></option>
                                    <option <?php if ($m['estado'] == MATRICULA_TIPO_REPOSICAO) echo 'selected'; ?> value="<?= MATRICULA_TIPO_REPOSICAO ?>"><?= MATRICULA_TIPO_REPOSICAO ?></option>
                                </select>
                            </div> 
                            <div class="form-group col-md-1" align="center">
                                <input type="text" class="form-control" id="<?= 'cadeira&'.$m['id_matricula']; ?>" style="text-transform: uppercase;" value="<?= $m['cadeira']; ?>" onchange="atualizaCampoOnchange(this);">
                            </div>   
                            
                              
                            <div class="form-group col-md-1">
                              <input type="text" maxlength="1" class="form-control" id="<?= 'falta_seg&'.$m['id_matricula']; ?>" style="text-transform: uppercase;" value="<?= $m['falta_seg']; ?>" onchange="atualizaCampoOnchange(this);">
                            </div>
                            <div class="form-group col-md-1">
                              <input type="text" maxlength="1" class="form-control" id="<?= 'falta_ter&'.$m['id_matricula']; ?>" style="text-transform: uppercase;" value="<?= $m['falta_ter']; ?>" onchange="atualizaCampoOnchange(this);"> 
                            </div>
                            <div class="form-group col-md-1">
                              <input type="text" maxlength="1" class="form-control" id="<?= 'falta_qua&'.$m['id_matricula']; ?>" style="text-transform: uppercase;" value="<?= $m['falta_qua']; ?>" onchange="atualizaCampoOnchange(this);"> 
                            </div>
                            <div class="form-group col-md-1">
                              <input type="text" maxlength="1" class="form-control" id="<?= 'falta_qui&'.$m['id_matricula']; ?>" style="text-transform: uppercase;" value="<?= $m['falta_qui']; ?>" onchange="atualizaCampoOnchange(this);"> 
                            </div>
                            <div class="form-group col-md-1">
                              <input type="text" maxlength="1" class="form-control" id="<?= 'falta_sex&'.$m['id_matricula']; ?>" style="text-transform: uppercase;" value="<?= $m['falta_sex']; ?>" onchange="atualizaCampoOnchange(this);"> 
                            </div>
                            <div class="form-group col-md-1">
                              <input type="text" maxlength="1" class="form-control" id="<?= 'falta_sab&'.$m['id_matricula']; ?>" style="text-transform: uppercase;" value="<?= $m['falta_sab']; ?>" onchange="atualizaCampoOnchange(this);"> 
                            </div>
                            <div class="form-group col-md-1">
                              <input type="text" maxlength="1" class="form-control" id="<?= 'falta_dom&'.$m['id_matricula']; ?>" style="text-transform: uppercase;" value="<?= $m['falta_dom']; ?>" onchange="atualizaCampoOnchange(this);"> 
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
                                <a href="<?= "listaPresenca.php?id=".$curso['id']."&orderby=CADEIRA" ?>" class="btn btn-outline-info" > <i class="fas fa-print fa-1x"></i> Lista de Presença Secretaria</a> 
                                <a href="<?= "listaPresenca.php?id=".$curso['id']."&orderby=NOME_ALUNO" ?>" class="btn btn-outline-info" > <i class="fas fa-print fa-1x"></i> Lista de Presença Portaria</a> 
                                <a href="<?= "listaCracha.php?id=".$curso['id']."&orderby=NOME_ALUNO" ?>" class="btn btn-outline-info" > <i class="fas fa-print fa-1x"></i> Lista de Crachas</a> 
                            <?php endif; ?>
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
    
    // Altera todas as situacoes como Concluido
    function concluirTodoOnClick(btn)
    {
        //Recupera todos os dropdows "ESTADO"
        var list = document.querySelectorAll('[id^=estado]');
        
        for (var i=0; i<list.length; i++) 
        {
            //Para cada drop, alterar para o status "CONCLUIDO"
            list[i].value = "<?= MATRICULA_TIPO_CONCLUIDO ?>";
            
            //Precisa chamar o metodo para autilizar na base
            atualizaCampoOnchange(list[i]);
        }
        
        alert("Alunos atualizados com sucesso")
    }
    
    // Prepara a lista de matriculas para atualizacao na base
    function atualizaCampoOnchange(field)
    {        
        var tmp = field.id.split("&");
        
        var strField = tmp[0];
        var idMatricula = tmp[1];        
        var valueField = field.value;    
        
        callPHP(idMatricula, strField, valueField);        
    }
    
    function callPHP(idMatricula, strField, valueField){
        
        //Chamada AJAX para comunicar com o PHP
        $.post('updateMatricula.php', {p_idMatricula:idMatricula, p_strField:strField, p_valueField:valueField}, 
              function(data){
                if(data!="1") alert("Erro ao atualizar registro [matricula: '"+idMatricula+"', campo: '"+strField+"', valor: '"+valueField+"']");            
            });
    }  
    
    
    function getStatusDropdowns(chkboxName) {
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