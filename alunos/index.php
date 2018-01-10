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
                <i class="fas fa-users fa-2x"></i>
                <h3>Alunos</h3>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="form-group col-md-10">
                        <input type="text" class="form-control" name="pesquisarNome" id="pesquisarNome" value="" placeholder="pesquisar por nome..." oninput="pesquisarNomeOnInput()">
                    </div>
                    <div class="form-group col-md-2">                      
                        <a href="" id="pesquisarLink" class="btn btn-sm btn-secondary"><i class="fas fa-search"></i> Pesquisar</a>
                    </div>                     
                </div>
                <hr>
                
                <div class="row">
                    <div class="col-sm">
                        <b>#</b>
                    </div>        
                    <div class="col-4" align="left">
                        <b>Nome</b>
                    </div>            
                    <div class="col">
                        <b>Curso Atual</b>
                    </div>            
                    <div class="col">
                        <b>Telefone</b>
                    </div>            
                    <div class="col">
                        <b>Celular</b>
                    </div>            
                    <div class="col">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="add.php" class="btn btn-sm btn-outline-success">
                                <i class="fas fa-plus"></i> Adicionar
                            </a>
                            <a href="index.php" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-sync"></i>
                            </a>
                        </div>
                    </div>                    
                </div>
                <?php if ($alunos) : ?>
                    <?php foreach ($alunos as $aluno) : ?>
                        <hr>
                        <div class="row">
                            <div class="col-sm">
                                <?php echo $aluno['id']; ?>
                            </div>
                            <div class="col-4" align="left">
                                <?php echo $aluno['nome_completo']; ?>
                            </div>
                            <div class="col">
                                <?php echo $aluno['signo']; ?>
                            </div>
                            <div class="col">
                                <?php echo $aluno['telefone']; ?>
                            </div>
                            <div class="col">
                                <?php echo $aluno['celular']; ?>
                            </div>
                            <div class="col">
                                <div class="btn-group" role="group">
                                    <!--<a href="view.php?id=<?php echo $aluno['id']; ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>-->
                                    <a href="edit.php?id=<?php echo $aluno['id']; ?>" class="btn btn-sm btn-outline-primary" style="width:95px;">
                                        <i class="fa fa-edit"></i> Alterar
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete-modal" data-aluno="<?php echo $aluno['id']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
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

<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>

<script>
   function pesquisarNomeOnInput()
    {
        var x = document.getElementById("pesquisarNome").value;
        
        document.getElementById("pesquisarLink").href="index.php?nome="+x;
   }    
</script>