<?php
session_start(); //session_destroy();
$_SESSION[buyItem][0][id][0] = 'Мы будем рады, если вы зарегистрируетесь';
include('config.php');

function __autoload($classname){
	include_once("c/$classname.php");
}

$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

switch ($action)
{
	case 'action_login':
		$controller = new C_User();
		break;
	case 'action_cabinet':
		$controller = new C_User();
		break;
	case 'action_view':
		$controller = new C_Good();
		break;
	case 'action_order':
		$controller = new C_Order();
		break;
	case 'action_admnstr':
		$controller = new C_Admin();
	case 'action_store':
		$controller = new C_Admin();
		break;
	default:
        $controller = new C_Page();
}

$controller->Request($action);
