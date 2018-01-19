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
                <h3 align="left"><i class="fas fa-calendar-alt fa-1x"></i>&nbsp;&nbsp;&nbsp;Cursos e Preceptorias</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                        <b>#</b>
                    </div>        
                    <div class="col-2" align="left">
                        <b>Nome</b>
                    </div>            
                    <div class="col-4">
                        <b>Monitor</b>
                    </div>            
                    <div class="col-2">
                        <b>Situação</b>
                    </div>            
                    <div class="col-1">
                        <b>Tipo</b>
                    </div>            
                    <div class="col-1">
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
                <?php if ($cursos) : ?>
                    <?php foreach ($cursos as $curso) : ?>                    
                        <hr>
                        <div class="row">
                            <div class="col-1">
                                <?php echo $curso['id']; ?>
                            </div>
                            <div class="col-2" align="left">
                                <?php echo $curso['nome'] . " - " . $curso['letra']; ?>
                            </div>
                            <div class="col-4">
                                <?php echo abreviarNome($curso['nome_completo']); ?>
                            </div>
                            <div class="col-2">
                                <?php echo $curso['estado']; ?>
                            </div>
                            <div class="col-1">
                                <?php echo $curso['tipo']; ?>
                            </div>
                            <div class="col-1">
                                <div class="btn-group" role="group">
                                    <!--<a href="view.php?id=<?php echo $curso['id']; ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>-->
                                    <a href="edit.php?id=<?php echo $curso['id']; ?>" class="btn btn-sm btn-outline-primary" style="width:95px;">
                                        <i class="fa fa-edit"></i> Alterar
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete-modal" data-curso="<?php echo $curso['id']; ?>">
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