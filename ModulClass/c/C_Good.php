<?php
//
// Конттроллер страницы товара.
//
include_once('m/model.php');

class C_Good extends C_Base
{
	//
	// Конструктор.
	//
	
	public function action_view(){	
		$this->title .= '::Просмотр товара';  
        $this->goodlist = good_a_get(mysqli_connect("localhost","root","","les2-6"),"where id_good='$_GET[good]'");
		$this->content = $this->Template('v/v_index.php', array('text' => $text));
	}
	
} 