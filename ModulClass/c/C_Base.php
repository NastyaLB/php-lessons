<?php
//
// Базовый контроллер сайта.
//
abstract class C_Base extends C_Controller
{
	protected $title;		// заголовок страницы
	protected $content;		// содержание страницы 
    protected $userlink;	// пользователь
    protected $goodlist;	// пользователь
	
	
	protected function before()
	{        
        $this->title = 'Название сайта';
		$this->content = '';
		$this->goodlist = '';
		$this->userlink = log_a_get();
	}
	
	//
	// Генерация базового шаблонаы
	//	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content, 'userlink' => $this->userlink, 'goods' => $this->goodlist);
        $page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}	
} 