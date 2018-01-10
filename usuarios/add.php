<?php 
  require_once('functions.php');
  add();
?>
<html>
    <script type="text/javascript">
        function validar(){
            var senha = document.forms["form"]["usuario['senha']"].value;
            var senhaC = document.forms["form"]["senhaC"].value;
            if(senha != senhaC){
                window.alert("As senhas tem de conferir!");
                event.preventDefault();
            }
        }
    </script>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>RE UNA</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script defer src="https://use.fontawesome.com/releases/v5.0.3/js/all.js"></script>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
    </head>
    <body>
    <main class="container">
        <a class="btn btn-sm btn-outline-primary" href="../index.php"><i class="fa fa-arrow-left 2x"></i> Voltar</a>
        <div class="container" style="padding-top: 5%;">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <i class="fas fa-user-plus fa-2x"></i>
                            <h3>Cadastrar Usuário</h3>
                        </center>
                    </div>
                    <div class="card-body">
                        <form name="form" action="add.php" method="post" onsubmit="validar();">
                          <!-- area de campos do form -->
                          <div class="row">
                            <div class="form-group col">
                              <label for="nome_completo">Usuário</label>
                              <input required type="text" class="form-control" name="usuario['usuario']">
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-6">
                              <label for="data_nascimento">Senha</label>
                              <input required type="password" class="form-control" name="usuario['senha']">
                            </div>
                            <div class="form-group col-6">
                              <label for="data_nascimento">Confirmar Senha</label>
                              <input required type="password" class="form-control" name="senhaC">
                            </div>
                          </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="estado">Permissão</label>
                                    <select class="form-control" name="usuario['permissao']">
                                        <option value="0">Programador</option>
                                        <option value="1">Secretário(a) Geral</option>
                                        <option value="2">Secratário(a)</option>
                                    </select>
                                </div>
                            </div>
                          <div id="actions" class="row">
                            <div class="col-md-12">
                              <button onclinck="validar()" type="submit" class="btn btn-outline-success"><i class="fas fa-plus"></i> Cadastrar</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


<?php include(FOOTER_TEMPLATE); ?>