<?php
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<h4>Menu Principal</h4>
<ul class="list-group">
    <a href="../alunos/index.php" class="list-group-item list-group-item list-group-item-action">Alunos</a>
    <a href="../cursos/index.php"  class="list-group-item list-group-item-action">Cursos</a>
    <a href="../main/logoff.php"  class="list-group-item list-group-item-action  list-group-item-danger">Sair</a>
</ul>