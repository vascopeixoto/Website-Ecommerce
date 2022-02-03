<?php
use \vasco\Page;
use \vasco\Model\Category;



$app->get('/', function() {
    
	$page = new Page();
	$page->setTpl("index");

});

$app->get('/categories/:idcategory', function($idcategory){
	$categories = new Category();
	$categories->get((int)$idcategory);
	$page= new Page();

	$page->setTpl("category", [
		'category'=>$categories->getValues(),
		'products'=>[]
	]);
});

?>

