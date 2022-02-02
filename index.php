<?php 
session_start();
require_once("vendor/autoload.php");
use \Slim\Slim;
use \vasco\Page;
use \vasco\PageAdmin;
use \vasco\Model\User;
use \vasco\Model\Category;

$app = new Slim();

$app->config('debug', true);


$app->get('/', function() {
    
	$page = new Page();
	$page->setTpl("index");

});

$app->get('/admin', function() {
    User::verifyLogin();

	$page = new PageAdmin();
	$page->setTpl("index");

});

$app->get('/admin/login', function(){
	$page= new PageAdmin([
		"header"=> false,
		"footer"=> false
	]);

	session_destroy();

	$page->setTpl("login");

});

$app->post('/admin/login', function(){
	User::login($_POST["login"],$_POST["password"]);
	header("Location: /ecommerce/index.php/admin");
	exit;
});

$app->get('/admin/logout', function(){
	header("Location: /ecommerce/index.php/admin/login");
	exit;
});

$app->get("/admin/users", function(){
	User::verifyLogin();
	$user = User::listAll();

	$page = new PageAdmin;

	$page->setTpl("users", array("users"=>$user));
});

$app->get("/admin/users/create", function(){
	User::verifyLogin();

	$page = new PageAdmin;

	$page->setTpl("users-create");
});

$app->get('/admin/users/:iduser/delete', function($iduser){
	User::verifyLogin();  	
	$users = new User(); 	
	$users->get((int)$iduser); 	
	$users->delete();

	header("Location: /ecommerce/index.php/admin/users");
 	exit;

});

$app->get("/admin/users/:iduser", function($iduser){
	User::verifyLogin();
 
   $user = new User();
 
   $user->get((int)$iduser);
 
   $page = new PageAdmin();
 
   $page ->setTpl("users-update", array(
        "user"=>$user->getValues()
    ));

});

$app->post('/admin/users/create', function(){
	User::verifyLogin();

	$user = new User();

 	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

 	$_POST['despassword'] = password_hash($_POST["despassword"], PASSWORD_DEFAULT, [

 		"cost"=>12

 	]);

 	$user->setData($_POST);

	$user->save();

	header("Location: /ecommerce/index.php/admin/users");
 	exit;
});

$app->post('/admin/users/:iduser', function($iduser){
	User::verifyLogin();

	$user= new User();

	$user->get((int)$iduser);

	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

	$user->setData($_POST);

	$user->update();

	header("Location: /ecommerce/index.php/admin/users");
 	exit;

});

$app->get('/admin/forgot', function(){
	$page= new PageAdmin([
		"header"=> false,
		"footer"=> false
	]);

	

	$page->setTpl("forgot");

});

$app->post("/admin/forgot", function(){
	$user = User::getForgot($_POST["email"]);

	header("Location: /ecommerce/index.php/admin/forgot/sent");
	exit;
});

$app->get('/admin/forgot/sent', function(){
	$page= new PageAdmin([
		"header"=> false,
		"footer"=> false
	]);

	$page->setTpl("forgot-sent");
});

$app->get('/admin/forgot/reset', function(){
	$user=User::validForgotDecrypt($_GET["code"]);

	$page= new PageAdmin([
		"header"=> false,
		"footer"=> false
	]);

	$page->setTpl("forgot-reset", array(
		"name"=>$user["desperson"],
		"code"=>$_GET["code"]
	));
});

$app->post("/admin/forgot/reset", function(){
	$forgot=User::validForgotDecrypt($_POST["code"]);

	User::setForgotUsed($forgot["idrecovery"]);

	$user= new User();

	$user->get((int)$forgot["iduser"]);
	
	$options = [
		'cost' => 12,
	];
	$password= password_hash($_POST["password"], PASSWORD_DEFAULT, $options);

	$user->setPassword($password);

	$page= new PageAdmin([
		"header"=> false,
		"footer"=> false
	]);

	$page->setTpl("forgot-reset-success");

});

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

$app->get('/categories/:idcategory', function($idcategory){
	$categories = new Category();
	$categories->get((int)$idcategory);
	$page= new Page();

	$page->setTpl("category", [
		'category'=>$categories->getValues(),
		'products'=>[]
	]);
});


$app->run();

 ?>