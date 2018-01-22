<?php
    require_once 'functions.php';
    $colunas = listarColunas();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php if(isset($_GET['pesquisa']) and isset($_GET['coluna'])) : ?>
    <form action="index.php">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="pesquisa" value="<?=$_GET['pesquisa']?>">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <select class="form-control" name="coluna" value="<?=$_GET['coluna']?>">
                        <?php
                            if(isset($colunas)){
                                $c = 0;
                                while($c < count($colunas)){
                                    echo "<option value='".$colunas[$c]."'>".$colunas[$c]."</option>";
                                    $c += 1;
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-outline-primary"> Filtrar <i class="fa fa-search"></i></button>
                        <a href="index.php" class="btn btn-outline-danger"><i class="fa fa-times"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php table('clientes',$_GET['coluna'],$_GET['pesquisa']); ?>
<?php else : ?>
    <form action="index.php">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="pesquisa">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <select class="form-control" name="coluna" value="<?=$_GET['coluna']?>">
                        <?php
                            if(isset($colunas)){
                                $c = 0;
                                while($c < count($colunas)){
                                    echo "<option value='".$colunas[$c]."'>".$colunas[$c]."</option>";
                                    $c += 1;
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary"> Filtrar <i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
    <?php table('clientes'); ?>
<?php endif ?>
<div class="container">
    <br>
    <hr>
    <br>
    <p><b>Como usar:</b></p>
    <p>Digite algo para buscar na tabela e em seguida selecione em qual coluna deve procurar o que foi inserido. Quando a busca for realizada, a tabela irá atualizar com os valores que correspondem ao que foi inserido e exibira um <b>ícone de busca</b> ( <i class="fa fa-search"></i> ) ao lado da coluna que foi utilizada como busca.</p>
    <p>Depois que for realizada uma busca, outra busca pode ser realizada da mesma forma que a anterior. Caso queira remover o filtro de busca e ver a tabela como um todo, basta cliclar no botão vermelho ao lado do botão filtrar.</p>
    <p>Ao clicar em uma das colunas, aquela se torna a coluna pela qual serão ordenados os items, a coluna que for selecionada para ordernar terá um <b>ícone de asterísco</b> ( <i class="fa fa-asterisk"></i> ) ao seu lado.</p>
</div>

<?php include(FOOTER_TEMPLATE); ?>