<?php 
session_start();
require_once("vendor/autoload.php");
use \Slim\Slim;
use \vasco\Page;
use \vasco\PageAdmin;
use \vasco\Model\User;

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
});

$app->get("/admin/users/:iduser", function($iduser){
	User::verifyLogin();

	$user= new User();

	$user->get((int)$iduser);

	$page = new PageAdmin;

	$page->setTpl("users-update", array(
		"user"=>$user->getValues()
	));
});

$app->post('/admin/users/create', function(){
	User::verifyLogin();
});

$app->post('/admin/users/:iduser', function($iduser){
	User::verifyLogin();
});

$app->run();

 ?>