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
		$this->title .= '::Личный кабинет';          
		$text = $this->userlink[form];
		
		if($this->isPost())
		{
            $_SESSION[username]=null;
            $_SESSION[password]=null;
            $_SESSION[usArr]=null;
            $_SESSION[buyItem]=null;
            session_destroy();
			header('location: index.php');
			exit();
		}
		$this->content = $this->Template('v/v_index.php', array('text' => $text));
	}
	
	
	public function action_login($connect){
		$this->title .= '::Вход в личный кабинет';
        
        if($this->isPost())
		{
            if(!isset($_SESSION[username])&&isset($_POST[username])) {
                checkPass($connect);
            }
			header('location: index.php');
			exit();
		}
        
		$this->content = $this->Template('v/v_login.php');
	}
} 