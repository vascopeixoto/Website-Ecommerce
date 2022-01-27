<?php 
$pagina = 'home';

if(isset($_GET['i'])){
	$pagina = addslashes($_GET['i']);
}

require_once 'views/header.php';

switch ($pagina) {
	case 'home':
		require_once 'views/home.php';
		break;

	case 'sobre':
		require_once 'views/sobre.php';
		break;

	case 'quemsomos':
		require_once 'views/quemsomos.php';
		break;

	case 'contacto':
		require_once 'views/contacto.php';
		break;

	case 'ola':
		require_once 'views/ola.php';
		break;
	
	default:
		require_once 'views/home.php';
		break;
}

include'views/footer.php';