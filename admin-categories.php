<?php
use \vasco\PageAdmin;
use \vasco\Model\User;
use \vasco\Model\Category;



$app->get('/admin/categories', function(){
	User::verifyLogin();
	$categories=Category::listAll();

	$page= new PageAdmin();

	$page->setTpl("categories",[
		'categories'=> $categories
	]);
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

?>