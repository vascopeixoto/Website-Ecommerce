<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Categorias
  </h1>
  <ol class="breadcrumb">
    <li><a href="/ecommerce/index.php/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/ecommerce/index.php/admin/categories">Categorias</a></li>
    <li class="active"><a href="/ecommerce/index.php/admin/categories/create">Registro</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Categoria</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/ecommerce/index.php/admin/categories/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="descategory">Nome da categoria</label>
              <input type="text" class="form-control" id="descategory" name="descategory" placeholder="Escreva o nome da categoria">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Registro</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->