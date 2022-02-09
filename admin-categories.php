<?php
use \vasco\PageAdmin;
use \vasco\Model\User;
use \vasco\Model\Category;
use vasco\Model\Product;

$app->get('/admin/categories', function(){
	User::verifyLogin();

	$search=(isset($_GET['search']))? $_GET['search']: "";
	$page=(isset($_GET['page']))? (int)$_GET['page']: 1;

	if($search !=''){
		$pagination = Category::getPageSearch($search, $page);

	}else{
		$pagination= Category::getPage($page);
	}


	$pages=[];
	for($i = 0; $i < $pagination['pages']; $i++){
		array_push($pages, [
			'href'=>'/ecommerce/index.php/admin/categories?'.http_build_query([
				'page'=>$i+1,
				'search'=>$search
			]),
			'text'=>$i+1
		]);
	}

	$page = new PageAdmin;

	$page->setTpl("categories", array(
		"categories"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	));
});

$app->get('/admin/categories/create', function(){
	User::verifyLogin();
	$page= new PageAdmin();

	$page->setTpl("categories-create");
});

$app->post('/admin/categories/create', function(){
	User::verifyLogin();
	$categories = new Category();
	$categories-> setData($_POST);
	$categories->save();

	header("Location: /ecommerce/index.php/admin/categories");
	exit;
});

$app->get('/admin/categories/:idcategory/delete', function($idcategory){
	User::verifyLogin();
	$categories = new Category();
	$categories->get((int)$idcategory);
	$categories->delete();

	header("Location: /ecommerce/index.php/admin/categories");
	exit;
});

$app->get('/admin/categories/:idcategory', function($idcategory){
	User::verifyLogin();
	$categories = new Category();
	$categories->get((int)$idcategory);

	$page= new PageAdmin();

	$page->setTpl("categories-update",[
		'category'=>$categories->getValues()
	]);
	
});

$app->post('/admin/categories/:idcategory', function($idcategory){
	User::verifyLogin();
	$categories = new Category();
	$categories->get((int)$idcategory);
	$categories->setData($_POST);
	$categories->save();

	header("Location: /ecommerce/index.php/admin/categories");
	exit;
});

$app->get('/admin/categories/:idcategory/products', function($idcategory){
	User::verifyLogin();
	$categories = new Category();
	$categories->get((int)$idcategory);

	$page= new PageAdmin();

	$page->setTpl("categories-products",[
		'category'=>$categories->getValues(),
		'productsRelated'=>$categories->getProducts(),
		'productsNotRelated'=>$categories->getProducts(false)

	]);
	
});

$app->get('/admin/categories/:idcategory/products/:idproduct/add', function($idcategory, $idproduct){
	User::verifyLogin();
	$categories = new Category();
	$categories->get((int)$idcategory);
	$product= new Product();
	$product->get((int)$idproduct);
	$categories->addProduct($product);
	header("Location: /ecommerce/index.php/admin/categories/".$idcategory."/products");
	exit;
});

$app->get('/admin/categories/:idcategory/products/:idproduct/remove', function($idcategory, $idproduct){
	User::verifyLogin();
	$categories = new Category();
	$categories->get((int)$idcategory);
	$product= new Product();
	$product->get((int)$idproduct);
	$categories->removeProduct($product);
	header("Location: /ecommerce/index.php/admin/categories/".$idcategory."/products");
	exit;
});

?>