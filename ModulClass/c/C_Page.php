<?php
//
// Конттроллер страницы чтения.
//
include_once('m/model.php');

class C_Page extends C_Base
{
	//
	// Конструктор
	//
	
	public function action_index($connect){
		$this->title .= '::Просмотр';
		$text = text_get();
        $this->goodlist = good_a_get($connect,'');
		$this->content = $this->Template('v/v_index.php', array('text' => $text));
	}
    	
	public function action_edit(){
		$this->title .= '::Редактирование';
		
		if($this->isPost())
		{
			text_set($_POST['text']);
			header('location: index.php');
			exit();
		}
		
		$text = text_get();
		$this->content = $this->Template('v/v_edit.php', array('text' => $text));		
	}
} 