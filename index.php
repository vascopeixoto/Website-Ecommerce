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

$app->run();

 ?>