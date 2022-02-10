<?php
use \vasco\PageAdmin;
use \vasco\Model\User;

$app->get("/admin/users/:iduser/password", function($iduser){
	User::verifyLogin();
	$user = new User;
	$user->get((int)$iduser);

	$page = new PageAdmin();
	$page->setTpl("users-password",[
		'user'=>$user->getValues(),
		'msgError'=>User::getError(),
		'msgSuccess'=>User::getSuccess()
	]);
});

$app->post("/admin/users/:iduser/password", function($iduser){
	User::verifyLogin();
	if(!isset($_POST['despassword']) || $_POST['despassword']===''){
		User::setError("Escreva a nova password");
		header("Location: /ecommerce/index.php/admin/users/".$iduser."/password");
		exit;
	}

	if(!isset($_POST['despassword-confirm']) || $_POST['despassword-confirm']===''){
		User::setError("Confirme a nova password");
		header("Location: /ecommerce/index.php/admin/users/".$iduser."/password");
		exit;
	}
	if($_POST['despassword'] != $_POST['despassword-confirm']){
		User::setError("A confirmação deve ser igual à nova password");
		header("Location: /ecommerce/index.php/admin/users/".$iduser."/password");
		exit;
	}

	$user= new User();
	$user->get((int)$iduser);

	$pass = password_hash($_POST["despassword"], PASSWORD_DEFAULT, [

		"cost"=>12

	]);

	$user->setPassword($pass);

	User::setSuccess("Password alterada com Sucesso");
	header("Location: /ecommerce/index.php/admin/users/".$iduser."/password");
	exit;
});



$app->get("/admin/users", function(){
	User::verifyLogin();

	$search=(isset($_GET['search']))? $_GET['search']: "";
	$page=(isset($_GET['page']))? (int)$_GET['page']: 1;

	if($search !=''){
		$pagination = User::getPageSearch($search, $page);

	}else{
		$pagination= User::getPage($page);
	}


	$pages=[];
	for($i = 0; $i < $pagination['pages']; $i++){
		array_push($pages, [
			'href'=>'/ecommerce/index.php/admin/users?'.http_build_query([
				'page'=>$i+1,
				'search'=>$search
			]),
			'text'=>$i+1
		]);
	}

	$page = new PageAdmin;

	$page->setTpl("users", array(
		"users"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	));
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
?>