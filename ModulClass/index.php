<?php
session_start(); //session_destroy();
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
	default:
		$controller = new C_Page();
}

$controller->Request($action);
