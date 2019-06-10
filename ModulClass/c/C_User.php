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
	
	public function action_cabinet($connect){	
		$this->title .= '::Личный кабинет';          
		$text = $this->userlink[form];
		
		if($this->isPost())
		{
            $_SESSION[userlogin]=null;
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
		$text = $this->userlink[form];
        
        if($this->isPost())
		{
            if(!isset($_SESSION[userlogin])&&isset($_POST[userlogin])) {
                checkPass($connect);
                checkOrdrs($connect);
            } 
			header('location: index.php?u=page&act=cabinet'); //?u=page&act=cabinet
			exit();
		}
        
		$this->content = $this->Template('v/v_login.php', array('text' => $text));
	}
} 