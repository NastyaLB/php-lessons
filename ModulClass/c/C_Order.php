<?php
//
// Конттроллер страницы чтения.
//
include_once('m/model.php');

class C_Order extends C_Base
{
	//
	// Конструктор.
	//
	
	public function action_order($connect){	
		$this->title .= '::Оформление заказа';          
		$text = orderList();
		
		if($this->isPost())
		{
            orderSend($connect);
            $_SESSION[buyItem]=null;
            $_SESSION[buyItem][0][id]=['начало'];
			header('location: index.php');
            exit();
		}
		$this->content = $this->Template('v/v_index.php', array('text' => $text));
	}
	
} 