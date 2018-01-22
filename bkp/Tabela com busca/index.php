<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<center>
    <div class="container" style="padding-top:15%; max-width:500px;">
        <form>
            <h4>
                <i class="<?php echo ICON_LOGO; ?>"></i>
                <br>
                Crud básico
                <br>
                <small style="font-size:14px;">Menu Inicial</small>
            </h4>
            <hr>
            <div class="row">
                <div class="col">
                    <a href="clientes/" class="btn btn-sm btn-outline-primary"><i class="fa fa-user"></i> Clientes</a>
                </div>
                <div class="col">
                    <a href="clientes/add.php" class="btn btn-sm btn-outline-primary"><i class="fa fa-user-plus"></i> Novo Cliente</a>
                </div>
            </div>
        </form>
    </div>
</center>
