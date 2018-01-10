<?php 
    require_once 'config.php';
    require_once('functions.php');
    require_once DBAPI;
    $db = open_database(); 
    listarUsuarios();
?>

<!DOCTYPE html>

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
    <div class="container" style="padding-top: 10%; width: 400px;">
        <center>
            <h1>RE UNA</h1>
            <p>Insira seu usuário e senha para acessar o sistema.</p>
            <?php
            if(isset($_SESSION['usuario'])){
                unset($_SESSION);
                session_destroy();
            }

            if(isset($_GET['t'])){
                switch($_GET['t']){
                    case 1:
                        echo "<p style='color:red'>Email e/ou senha incorretos!</p>";
                        break;
                    case 2:
                        echo "<p style='color:green'>Registro realizado com sucesso</p>";
                        break;
                }
            }
            ?>
            <br>
            <form action="main\login.php" method="post">
                <div class="form-group">
                    <select class="form-control" name="usuario" id="selectMonitor">
                        <?php if ($usuarios) : ?>
                            <?php foreach ($usuarios as $usuario) : ?>
                                <option value="<?php echo $usuario['usuario']; ?>"><?php echo $usuario['usuario']; ?></option>
                            <?php endforeach; ?>
                            <?php else : ?>
                                <option value="">Nenhum registro encontrado</option>
                            <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input required class="form-control" type="password" name="senha" placeholder="Senha">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" style="width: 150px;"><i class="fa fa-arrow-right"></i> Entrar</button>
                </div>
            </form>
                <div class="form-group">
                    <a href="usuarios/add.php">
                        <button class="btn btn-primary" style="width: 150px;"><i class="fa fa-plus"></i> Criar conta</button>
                    </a>
                </div>
        </center>
    </div>

<?php include(FOOTER_TEMPLATE); ?>