<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Pedido N°<?php echo htmlspecialchars( $order["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/ecommerce/index.php/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/ecommerce/index.php/admin/orders">Pedidos</a></li>
        <li class="active"><a href="/ecommerce/index.php/admin/orders/<?php echo htmlspecialchars( $order["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Pedido N°<?php echo htmlspecialchars( $order["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
    </ol>
    </section>

    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
            <h2 class="page-header">
                <img style="height: 64px; width: auto; "src="/ecommerce/res/site/img/logo.png" alt="Logo">
                <small class="pull-right">Date: <?php echo date('d/m/Y'); ?></small>
            </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
            De
            <address>
                <strong>Truck and Wheel</strong><br>
                Rua da Misericórdia, Lote 7, Fração C, nº 295<br>
                4410-528 Canelas<br>
                Telefone: (+351) 229 940 619<br>
                E-mail: suporte@w-group.com
            </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
            Para
            <address>
                <strong><?php echo htmlspecialchars( $order["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong><br>
                <?php if( $order["nrphone"] && $order["nrphone"]!='0' ){ ?>Telefone: <?php echo htmlspecialchars( $order["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br><?php } ?>
                E-mail: <?php echo htmlspecialchars( $order["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
            <b>Pedido #<?php echo htmlspecialchars( $order["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b><br>
            <br>
            <b>Emitido em:</b> <?php echo format_date($order["dtregister"]); ?><br>
            <b>Pago em:</b> <?php echo format_date($order["dtregister"]); ?>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Qtd</th>
                    <th>Serviço</th>
                    <th>Código #</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                <tr>
                    <td><?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo formatPrice($order["vltotal"]); ?>€</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    
        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">

            </div>
            <!-- /.col -->
            <div class="col-xs-6">
            <p class="lead">Resumo do Pedido</p>
    
            <div class="table-responsive">
                <table class="table">
                <tbody><tr>
                    <th style="width:50%">
                    <th>Total:</th>
                    <td><?php echo formatPrice($order["vltotal"]); ?>€</td>
                </tr>
                </tbody></table>
            </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <button type="button" onclick="window.location.href ='/ecommerce/index.php/admin/orders/<?php echo htmlspecialchars( $order["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/status'" class="btn btn-default pull-left" style="margin-left: 5px;">
                    <i class="fa fa-pencil"></i> Editar Status
                </button>
                
                <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-print"></i> Imprimir
                </button>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

</div>
<!-- /.content-wrapper -->