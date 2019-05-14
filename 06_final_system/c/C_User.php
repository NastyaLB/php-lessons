<?php
//
// Конттроллер страницы чтения.
//
include_once('m/model.php');

class C_User extends C_Base
{
	//
	// Конструктор.
	//
	
	public function action_cabinet(){	
		$this->title .= '::User\'s cabinet';          
		$text = $this->userlink[form];
		
		if($this->isPost())
		{
            $_SESSION[username]=null;
            $_SESSION[password]=null;
            session_destroy();
			header('location: index.php');
			exit();
		}
		$this->content = $this->Template('v/v_index.php', array('text' => $text));
	}
	
	
	public function action_login(){
		$this->title .= '::Logging in';
        
        if($this->isPost())
		{
            if(!isset($_SESSION[username])&&isset($_POST[username])) {
                $_SESSION[username]=$_POST[username];
                $_SESSION[password]=$_POST[password];
            }
			header('location: index.php');
			exit();
		}
        
		$this->content = $this->Template('v/v_login.php');
	}
} 