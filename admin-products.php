<?php
use \vasco\PageAdmin;
use \vasco\Model\User;
use vasco\Model\Product;

$app->get('/admin/products', function(){
	User::verifyLogin();
	$search=(isset($_GET['search']))? $_GET['search']: "";
	$page=(isset($_GET['page']))? (int)$_GET['page']: 1;

	if($search !=''){
		$pagination = Product::getPageSearch($search, $page);

	}else{
		$pagination= Product::getPage($page);
	}


	$pages=[];
	for($i = 0; $i < $pagination['pages']; $i++){
		array_push($pages, [
			'href'=>'/ecommerce/index.php/admin/products?'.http_build_query([
				'page'=>$i+1,
				'search'=>$search
			]),
			'text'=>$i+1
		]);
	}

	$page = new PageAdmin;

	$page->setTpl("products", array(
		"products"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	));
});

$app->get('/admin/products/create', function(){
	User::verifyLogin();
	$page= new PageAdmin();

	$page->setTpl("products-create");
});

$app->post('/admin/products/create', function(){
	User::verifyLogin();

	$product = new Product();
 	$product->setData($_POST);

	$product->save();

	header("Location: /ecommerce/index.php/admin/products");
 	exit;
});

$app->get('/admin/products/:idproduct', function($idproduct){
	User::verifyLogin();
	$page= new PageAdmin();
	$product = new Product();
	$product->get((int)$idproduct);
	$page->setTpl("products-update",[
		'product'=>$product->getValues()
	]);
});

$app->post('/admin/products/:idproduct', function($idproduct){
	User::verifyLogin();
	$product = new Product();
	$product->get((int)$idproduct);
	$product->setData($_POST);
	$product->save();
	if($_FILES["file"]["name"]!== "") $product->setPhoto($_FILES["file"]);

	header("Location: /ecommerce/index.php/admin/products");
 	exit;


});

$app->get('/admin/products/:idproduct/delete', function($idproduct){
	User::verifyLogin();
	$products = new Product();
	$products->get((int)$idproduct);
	$products->delete();

	header("Location: /ecommerce/index.php/admin/products");
	exit;
});


?>