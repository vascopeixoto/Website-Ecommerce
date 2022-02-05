<?php
use \vasco\Page;
use \vasco\Model\Category;
use \vasco\Model\Product;
use \vasco\Model\Cart;



$app->get('/', function() {
    $products=Product::listAll();
	$page = new Page();
	$page->setTpl("index",[
		'products'=>Product::checklist($products)
	]);

});

$app->get('/categories/:idcategory', function($idcategory){
	$categories = new Category();
	$categories->get((int)$idcategory);
	$page= new Page();

	$page->setTpl("category", [
		'category'=>$categories->getValues(),
		'products'=>Product::checklist($categories->getProducts())
	]);
});

$app->get('/products/:desurl', function($desurl){
	$product = new Product();
	$product->getFromURL($desurl);
	$page= new Page();

	$page->setTpl("product-detail", [
		'product'=>$product->getValues(),
		'categories'=>$product->getCategories()
	]);
});

$app->get('/cart',function(){
	$cart=Cart::getFromSession();
	$page= new Page();
	$page->setTpl("cart",[
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts()
	]);
});

$app->get('/cart/:idproduct/add',function($idproduct){
	$product=new Product();
	$product->get((int)$idproduct);
	$cart=Cart::getFromSession();
	$qtd=(isset($_GET['qtd'])) ? (int)$_GET['qtd'] :1;
	for ($i=0; $i<$qtd; $i++){
	$cart->addProduct($product);

	}
	header("Location: /ecommerce/index.php/cart");
	exit;
});

$app->get('/cart/:idproduct/minus',function($idproduct){
	$product=new Product();
	$product->get((int)$idproduct);
	$cart=Cart::getFromSession();
	$cart->removeProduct($product);
	header("Location: /ecommerce/index.php/cart");
	exit;
});

$app->get('/cart/:idproduct/remove',function($idproduct){
	$product=new Product();
	$product->get((int)$idproduct);
	$cart=Cart::getFromSession();
	$cart->removeProduct($product,true);
	header("Location: /ecommerce/index.php/cart");
	exit;
});

?>

