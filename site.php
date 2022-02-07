<?php
use \vasco\Page;
use \vasco\Model\Category;
use \vasco\Model\Product;
use \vasco\Model\Cart;
use \vasco\Model\Address;
use \vasco\Model\User;


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
		'products'=>$cart->getProducts(),
		'error'=>Cart::getMsgError()
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

$app->get('/ecommerce/index.php/checkout',function(){
	User::verifyLogin(false);
	$cart=Cart::getFromSession();
	$address = new Address();
	$page= new Page();
	$page->setTpl("checkout",[
		'cart'=>$cart->getValues(),
		'address'=>$address->getValues()
	]);
});
$app->get('/login',function(){

	$page= new Page();
	$page->setTpl("login",[
		'error'=>User::getError(),
		'errorRegister'=>User::getRegisterError(),
		'registerValues'=>(isset($_SESSION['registerValues']))? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>'']
	]);
});

$app->post('/login',function(){
	try{
		User::login($_POST['login'], $_POST['password']);
	}catch(Exception $e){
		User::setError($e->getMessage());
	}
	header("Location: /ecommerce/index.php");
	exit;
});

$app->get('/logout',function(){
	User::logout();
	header("Location: /ecommerce/index.php/login");
	exit;
});

$app->post('/register',function(){
	$_SESSION['registerValues']= $_POST;
	if (!isset($_POST['name']) || $_POST['name'] == ''){
		User::setRegisterError("Preencha o seu nome.");
		header("Location: /ecommerce/index.php/login");
		exit;
	}

	if (!isset($_POST['email']) || $_POST['email'] == ''){
		User::setRegisterError("Preencha o seu email.");
		header("Location: /ecommerce/index.php/login");
		exit;
	}

	if (!isset($_POST['password']) || $_POST['password'] == ''){
		User::setRegisterError("Preencha a sua password.");
		header("Location: /ecommerce/index.php/login");
		exit;
	}

	if(User::checkLoginExist($_POST['email'])===true){
		User::setRegisterError("Email já está a ser utilizado");
		header("Location: /ecommerce/index.php/login");
		exit;
	}

	$user= new User();
	$user->setData([
		'inadmin'=>0,
		'deslogin'=>$_POST['email'],
		'desperson'=>$_POST['name'],
		'desemail'=>$_POST['email'],
		'despassword'=>$_POST['password'],
		'nrphone'=>(int)$_POST['phone']
	]);
	$user->save();

	User::login($_POST['email'], $_POST['password']);
	header("Location: /ecommerce/index.php");
	exit;
});

?>

