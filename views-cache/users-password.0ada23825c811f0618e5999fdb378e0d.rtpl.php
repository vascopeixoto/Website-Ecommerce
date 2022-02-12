<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Password do Utilizador
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Password do Utilizador</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <?php if( $msgError != '' ){ ?>
        <div class="alert alert-danger alert-dismissible" style="margin:10px">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <p><?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        </div>
        <?php } ?>
        <?php if( $msgSuccess != '' ){ ?>
        <div class="alert alert-success alert-dismissible" style="margin:10px">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <p><?php echo htmlspecialchars( $msgSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        </div>
        <?php } ?>

        <form role="form" action="/ecommerce/index.php/admin/users/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/password" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="despassword">Nova Password</label>
              <input type="password" class="form-control" id="despassword" name="despassword" placeholder="Nova Password">
            </div>
            <div class="form-group">
              <label for="despassword-confirm">Confirme a Password</label>
              <input type="password" class="form-control" id="despassword-confirm" name="despassword-confirm" placeholder="Confirme a nova Password">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->