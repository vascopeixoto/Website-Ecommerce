<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Produtos
  </h1>
  <ol class="breadcrumb">
    <li><a href="/ecommerce/index.php/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/ecommerce/index.php/admin/categories">Categorias</a></li>
    <li class="active"><a href="/ecommerce/index.php/admin/categories/create">Registrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Produto</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/ecommerce/index.php/admin/products/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="desproduct">Nome da produto</label>
              <input type="text" class="form-control" id="desproduct" name="desproduct" placeholder="Escreva o nome do produto">
            </div>
            <div class="form-group">
              <label for="vlprice">Preço</label>
              <input type="number" class="form-control" id="vlprice" name="vlprice" step="0.01" placeholder="0.00">
            </div>
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <textarea cols="num" rows="num" maxlength="1000" class="form-control" style="resize: none; width:100%; height: 200px;" id="descricao" name="descricao" placeholder="Escreva a descrição do produto"></textarea>
              <div id="the-count">
                <span id="current">0</span>
                <span id="maximum">/ 1000</span>
              </div>
            </div>
            <div class="form-group">
              <label for="desurl">URL</label>
              <input type="text" class="form-control" id="vlprice" name="desurl">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->