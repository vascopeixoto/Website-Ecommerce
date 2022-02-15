<?php
use \vasco\Page;
use \vasco\Model\Category;
use \vasco\Model\Product;
use \vasco\Model\Cart;
use \vasco\Model\Order;
use \vasco\Model\OrderStatus;
use \vasco\Model\User;



$app->get('/', function() {
    $products=Product::listAll();
	$page = new Page();
	$page->setTpl("index",[
		'products'=>Product::checklist($products)
	]);

});
$app->get('/historia', function() {
	$page = new Page();
	$page->setTpl("historia");

});
$app->get('/contactos', function() {
	$page = new Page();
	$page->setTpl("contactos");

});
$app->get('/estrategia', function() {
	$page = new Page();
	$page->setTpl("estrategia");

});
$app->get('/missao', function() {
	$page = new Page();
	$page->setTpl("missao");

});

$app->get('/setor', function() {
	$page = new Page();
	$page->setTpl("servicos");

});

$app->get('/carga', function() {
	$page = new Page();
	$page->setTpl("carga");

});
$app->get('/expnot', function() {
	$page = new Page();
	$page->setTpl("expnot");

});

$app->get('/palete', function() {
	$page = new Page();
	$page->setTpl("palete");

});

$app->get('/cisternas', function() {
	$page = new Page();
	$page->setTpl("cisterna");

});
$app->get('/basc', function() {
	$page = new Page();
	$page->setTpl("basc");

});

$app->get('/4pl', function() {
	$page = new Page();
	$page->setTpl("4pl");

});

$app->get('/warehousing', function() {
	$page = new Page();
	$page->setTpl("warehousing");

});

$app->get('/twms', function() {
	$page = new Page();
	$page->setTpl("twms");

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
		'product'=>$cart->getProducts(),
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
	$page= new Page();
	$page->setTpl("checkout",[
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts()
	]);
});

$app->post('/checkout', function(){

	User::verifyLogin(false);
	$user=User::getFromSession();

	$cart=Cart::getFromSession();
	$cart->getCalculateTotal();

	$order= new Order();

	$order->setData([
		'idcart'=>$cart->getidcart(),
		'iduser'=>$user->getiduser(),
		'idstatus'=>OrderStatus::EM_ABERTO,
		'vltotal'=>$cart->getvltotal()
	]);
	$order->save();
	header("Location: /ecommerce/index.php/order/".$order->getidorder());
	exit;
});

$app->get('/order/:idorder',function($idorder){
	User::verifyLogin(false);
	$order= new Order;
	$order->get((int)$idorder);
	$page= new Page();
	$page->setTpl("payment",[
		'order'=>$order->getValues()
	]);
	Cart::removeToSession();
	session_regenerate_id();
});

$app->get("/profile/orders", function (){
	User::verifyLogin(false);
	$page= new Page();
	$user=User::getFromSession();
	$page->setTpl("profile-orders",[
		'orders'=>$user->getOrders()
	]);
});

$app->get("/profile/orders/:idorder", function ($idorder){
	User::verifyLogin(false);
	$order=new Order();
	$order->get((int)$idorder);

	$cart= new Cart();
	$cart->get((int)$order->getidcart());
	$cart->getCalculateTotal();

	$page= new Page();
	$page->setTpl("profile-orders-detail",[
		'order'=>$order->getValues(),
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts()
	]);
});

$app->get('/login',function(){
	User::testlogin();
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
		header("Location: /ecommerce/index.php/login");
		exit;
	}
	header("Location: /ecommerce/index.php/cart");
	exit;
});

$app->get('/logout',function(){
	User::logout();
	Cart::removeToSession();
	session_regenerate_id();
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

	$pass = password_hash($_POST["password"], PASSWORD_DEFAULT, [

		"cost"=>12

	]);

	$user->setData([
		'inadmin'=>0,
		'deslogin'=>$_POST['email'],
		'desperson'=>$_POST['name'],
		'desemail'=>$_POST['email'],
		'despassword'=>$pass,
		'nrphone'=>(int)$_POST['phone']
	]);
	$user->save();

	User::login($_POST['email'], $_POST['password']);
	header("Location: /ecommerce/index.php");
	exit;
});



$app->get('/forgot', function(){
	$page= new Page();
	$page->setTpl("forgot");

});

$app->post("/forgot", function(){
	$user = User::getForgot($_POST["email"], false);

	header("Location: /ecommerce/index.php/forgot/sent");
	exit;
});

$app->get('/forgot/sent', function(){
	$page= new Page();

	$page->setTpl("forgot-sent");
});

$app->get('/forgot/reset', function(){
	$user=User::validForgotDecrypt($_GET["code"]);

	$page= new Page();

	$page->setTpl("forgot-reset", array(
		"name"=>$user["desperson"],
		"code"=>$_GET["code"]
	));
});

$app->post("/forgot/reset", function(){
	$forgot=User::validForgotDecrypt($_POST["code"]);

	User::setForgotUsed($forgot["idrecovery"]);

	$user= new User();

	$user->get((int)$forgot["iduser"]);
	
	$options = [
		'cost' => 12,
	];
	$password= password_hash($_POST["password"], PASSWORD_DEFAULT, $options);

	$user->setPassword($password);

	$page= new Page();

	$page->setTpl("forgot-reset-success");

});

$app->get("/profile", function(){
	User::verifyLogin(false);
	$user=User::getFromSession();
	$page = new Page();
	$page->setTpl("profile",[
		'user'=>$user->getValues(),
		'profileMsg'=>User::getSuccess(),
		'profileError'=>User::getError()

	]);
});

$app->post("/profile", function(){
	User::verifyLogin(false);
	if(!isset($_POST['desperson']) || $_POST['desperson'] ===''){
		User::setError("Preencha o sue nome.");
		header("Location: /ecommerce/index.php/profile");
		exit;
	}
	if(!isset($_POST['desemail']) || $_POST['desemail'] ===''){
		User::setError("Preencha o sue email.");
		header("Location: /ecommerce/index.php/profile");
		exit;
	}
	$user=User::getFromSession();

	if($_POST['desemail'] !==$user->getdesemail()){
		if(User::checkLoginExist($_POST['desemail'])){
			User::setError("Email já está a ser utilizado.");
			header("Location: /ecommerce/index.php/profile");
			exit;
		}
	}

	$_POST['iduser']=$user->getiduser();
	$_POST['inadmin']=$user->getinadmin();
	$_POST['despassword']=$user->getdespassword();
	$_POST['deslogin']=$_POST['desemail'];
	$user->setData($_POST);
	$user->update();
	$_SESSION[User::SESSION]=$user->getValues();
	User::setSuccess("Dados Alterados com Sucesso");
	header("Location: /ecommerce/index.php/profile");
	exit;
});

$app->get("/profile/change-password", function(){
	User::verifyLogin(false);
	$page = new Page();
	$page->setTpl("profile-change-password",[
		'changePassError'=>User::getError(),
		'changePassSuccess'=>User::getSuccess()
	]);
});

$app->post("/profile/change-password", function(){
	User::verifyLogin(false);
	if(!isset($_POST['current_pass']) || $_POST['current_pass']===''){
		User::setError("Escreva a password atual");
		header("Location: /ecommerce/index.php/profile/change-password");
		exit;
	}

	if(!isset($_POST['new_pass']) || $_POST['new_pass']===''){
		User::setError("Escreva a nova password");
		header("Location: /ecommerce/index.php/profile/change-password");
		exit;
	}

	if(!isset($_POST['new_pass_confirm']) || $_POST['new_pass_confirm']===''){
		User::setError("Confirme a nova password");
		header("Location: /ecommerce/index.php/profile/change-password");
		exit;
	}

	if($_POST['current_pass']=== $_POST['new_pass']){
		User::setError("A nova password deve ser diferente da atual");
		header("Location: /ecommerce/index.php/profile/change-password");
		exit;
	}

	if($_POST['new_pass'] != $_POST['new_pass_confirm']){
		User::setError("A confirmação deve ser igual à nova password");
		header("Location: /ecommerce/index.php/profile/change-password");
		exit;
	}

	$user=User::getFromSession();

	if(!password_verify($_POST['current_pass'], $user->getdespassword())){
		User::setError("Password inválida");
		header("Location: /ecommerce/index.php/profile/change-password");
		exit;
	}

	$pass = password_hash($_POST["new_pass"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);

	$user->setdespassword($pass);
	$user->update();

	User::setSuccess("Password alterada com Sucesso");
	header("Location: /ecommerce/index.php/profile/change-password");
		exit;
});
?>

