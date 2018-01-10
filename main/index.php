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
                    <h3>Menu Principal</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="../alunos/index.php" class="btn btn-lg btn-outline-primary" style="width: 100%; height:100%;">
                                <br>
                                <h4><i class="fa fa-users fa-3x"></i>
                                <br>
                                <hr>
                                Alunos</h4>
                            </a>
                        </div>
                        <div class="col">
                            <a href="../cursos/index.php"  class="btn btn-lg btn-outline-primary" style="width: 100%; height:100%;">
                                <br>
                                <h4><i class="fa fa-book fa-3x"></i>
                                <br>
                                <hr>
                                Cursos & Preceptorias</h4>
                            </a>
                        </div>
                        <div class="col">
                            <a href="../matriculas/index.php"  class="btn btn-lg btn-outline-primary" style="width: 100%; height:100%;">
                                <br>
                                <h4>
                                    <i i class="fas fa-user fa-3x" data-fa-transform="shrink-10" data-fa-mask="fas fa-file"></i>
                                <br>
                                <hr>
                                Inscrições</h4>
                            </a>
                        </div>
                    </div>
                    <ul class="list-group">
                    </ul>
                </div>
            </div>
        </div>
    </center>
</div>

<?php include(FOOTER_TEMPLATE); ?>