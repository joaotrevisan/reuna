<?php 
  require_once('functions.php');    
  include('../constants.php');
  add();
?>
<html>
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
                            <h3 align="left"><i class="fas fa-user fa-1x"></i>&nbsp;&nbsp;&nbsp;Usuário</h3>
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
                                        <option value="0"><?= USUARIO_TIPO_PROGRAMADOR ?></option>
                                        <option value="1"><?= USUARIO_TIPO_SECRETARIA_GERAL ?></option>
                                        <option value="2"><?= USUARIO_TIPO_SECRETARIA ?></option>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="senha_cadastro">Senha Cadastro</label>
                                    <input required type="password" class="form-control" name="senhaControle">
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
        
<script>
    function validarSenhaControle(){
        var senha = document.forms["form"]["senhaControle"].value;
        
        // Obtém a data/hora atual
        var data = new Date();
        // Guarda cada pedaço em uma variável
        var dia     = data.getDate();           // 1-31
        var mes     = data.getMonth();          // 0-11 (zero=janeiro)
        // Hash 
        var hashSenha = (dia + 7) +""+ (mes + 1 + 12);        
        
        if(senha != hashSenha){
            window.alert("A senha de cadastro não é válida. Consulte o desenvolvedor.");
            event.preventDefault();
        }
    }
    
    function validar(){
        var senha = document.forms["form"]["usuario['senha']"].value;
        var senhaC = document.forms["form"]["senhaC"].value;
        if(senha != senhaC){
            window.alert("A confirmação de senha deve ser igual a senha informada");
            event.preventDefault();
        }
        
        validarSenhaControle();
    }
</script>