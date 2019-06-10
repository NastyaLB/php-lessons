<?php
//
// Конттроллер страницы чтения.
//
include_once('m/model.php');

class C_Admin extends C_Base
{
	//
	// Конструктор.
	//
	
	public function action_admnstr($connect){	
		$this->title .= '::Управление заказами';          
		$text = $this->userlink[form];
		
		if($this->isPost())
		{
            $_SESSION[userlogin]=null;
            $_SESSION[password]=null;
            $_SESSION[usArr]=null;
            $_SESSION[goods]=null;
            $_SESSION[buyItem]=null;
            session_destroy();
			header('location: index.php');
			exit();
		}
		$this->content = $this->Template('v/v_index.php', array('text' => $text));
	}
    
	public function action_store($connect){	
		$this->title .= '::Управление товарами';          
		$text = adminStore();
		
		if($this->isPost())
		{
            $_SESSION[userlogin]=null;
            $_SESSION[password]=null;
            $_SESSION[usArr]=null;
            $_SESSION[goods]=null;
            $_SESSION[buyItem]=null;
            session_destroy();
			header('location: index.php');
			exit();
		}
		$this->content = $this->Template('v/v_index.php', array('text' => $text));
	}	
} 