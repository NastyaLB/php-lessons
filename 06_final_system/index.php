<?php
session_start(); //session_destroy();


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
	default:
		$controller = new C_Page();
}

$controller->Request($action);
