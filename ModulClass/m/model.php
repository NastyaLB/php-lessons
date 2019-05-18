<?php
include('config.php');

function text_get()
{
	return file_get_contents('data/text.txt');
}

function text_set($text)
{
	file_put_contents('data/text.txt', $text);
}


//функция для пользователя
function log_a_get() {
    if(isset($_SESSION[username])) {
        $form='<p>Добро пожаловать, '.$_SESSION[username].'!</p>';
        $form.=userCbnt();
        $form.='<form method="post"><input type="hidden" name="logout" value="logout"><input type="submit" value="Выйти"></form>';
        $link='index.php?u=page&act=cabinet';
        $linktext='Личный кабинет | Выйти';
    } else{
        $link='index.php?u=page&act=login';
        $linktext='Личный кабинетt | Войти';
    }
    return $userlink=['form' => $form,'link' => $link,'linktext' => $linktext,];
}


//функция для пользователя в БД
//SELECT users.id_user,user_name,user_login,user_pass,id_order,good_name,goods.price,charact FROM users left join basket on users.id_user=basket.id_user LEFT join goods on basket.id_good=goods.id_good where user_login='$_POST[username]' and user_pass='$_POST[password]'
function checkPass($connect) {
    $ras=mysqli_query($connect,"SELECT users.id_user,user_name,user_login,user_pass,id_order,good_name,goods.price,charact FROM users left join basket on users.id_user=basket.id_user LEFT join goods on basket.id_good=goods.id_good where user_login='$_POST[username]' and user_pass='$_POST[password]' ORDER BY basket.id_order DESC");
    $rras[0]='';
    foreach($ras as $k => $m) {
        if(!empty($m)) {
            $rras[id]=$m[id_user];
            $rras[user_name]=$m[user_name];
            $rras[user_login]=$m[user_login];
            $rras[user_pass]=$m[user_pass];
            $rras[$m[id_order]][$k]=$m[good_name];            
        } 
        $table='<p>Имя: '.$rras[user_name].'</p><p>Логин: '.$rras[user_login].'</p><p>Пароль: '.$rras[user_pass].'</p><p>Заказы в обратном хронологическом порядке:</p>';
        
        $table.='<table>';
        foreach($rras as $key => $mas) {
            if($key!='id' && $key!='user_name' && $key!='user_login' && $key!='user_pass') {
                foreach($mas as $k => $m) {
                    $table.='<tr>';
                    $table.='<td>Заказ№:';
                    $table.=$key;
                    $table.='</td>';
                    $table.='<td>';
                    $table.=$m;
                    $table.='</td>';
                    $table.='</tr>';                   
                }
            }
        }
        
        $table.='</table>';        
        
        $_SESSION[username]=$_POST[username];
        $_SESSION[password]=$_POST[password];
        $_SESSION[$arres]=$table;
    }
}

//функция для формирования данных пользователя
function userCbnt() {
    if($_SESSION[$arres]!=null) return $_SESSION[$arres];
}


//функция для получения товаров из БД
function good_a_get($connect,$id) //запись $id -> "WHERE id_good < X " или "WHERE id_good = X "
{
    $res=mysqli_query($connect,"SELECT * FROM goods LEFT JOIN categories 
ON goods.id_category = categories.id_category $id ");
    
    foreach($res as $k => $m) {
        $id  = $m[id_good];
        $good[$id][id] = $m[id_good];
        $good[$id][n] = $m[good_name];
        $good[$id][pr] = $m[price];
        $good[$id][ch] = $m[charact];
        $good[$id][cat] = $m[cat_name];
    }
    return $good;
}

//функция для галереи
function build_gallery($goods) {
    if(!isset($_GET['act'])) {
        foreach($goods as $k => $m) {
            $item='<div class="Item"><a href="index.php?good=';
            $item.=$m[id];
            $item.='&act=view"><img src="data/files/Plush-';
            $item.=$m[id];
            $item.='.jpg" alt=""><a href="index.php?good=';
            $item.=$m[id];
            $item.='&act=view" class="itemName">';
            $item.=$m[n];
            $item.='<br/><span class="characta">';
            $item.=$m[ch];
            $item.='</span><small>Цена: ';
            $item.=$m[pr];
            $item.=' р.</small><form action="POST"><input type="submit" value="Купить"></form></a></a></div>';
            echo $item;
        }
    }
    	
}

//функция для страницы товара
function build_view($goods) {
    if($_GET['act']=='view') {
        foreach($goods as $k => $m) {
            $item='<div class="imgright"><img src="data/files/Plush-';
            $item.=$m[id];
            $item.='.jpg" alt=""><div><h1>';
            $item.=$m[n];
            $item.='</h1><p>';
            $item.=$m[ch];
            $item.='</p><p>Цена: ';
            $item.=$m[pr];
            $item.=' р.</p><form action="POST"><input type="submit" value="Купить"></form></div></div>';
            echo $item;
        }	
    }
}