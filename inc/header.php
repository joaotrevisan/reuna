<?php  
    include('permission.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
</head>
<body>
    <main class="container">
    <div class="row">
        <div class="col" align="left">
            <a class="btn btn-sm btn-outline-primary" href="../main/index.php"><i class="fa fa-home 2x"></i> Menu</a>
            &nbsp;
            <a class="btn btn-sm btn-outline-success" href="javascript:history.back()"><i class="fa fa-arrow-left 2x"></i> Voltar</a>
            &nbsp;
            <!-- <a class="btn btn-sm btn-outline-warning" href="./"><i class="fa fa-arrow-left 2x"></i> Voltar 2.0</a> -->
        </div>        
        <div class="col" align="right">
            <a class="btn btn-sm btn-outline-danger" href="../main/logoff.php"><i class="fa fa-sign-out-alt 2x"></i> Sair</a>
        </div>
    </div>