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
        $form = '<p>Добро пожаловать, '.$_SESSION[username].'!</p>';
        $form .= userCbnt();
        $form .= '<form method="post"><input type="hidden" name="logout" value="logout"><input type="submit" value="Выйти"></form>';
        $link='index.php?u=page&act=cabinet';
        if(basketCount()!=0 || $_POST[buyItem]) {
            $linktext='Личный кабинет<div class="basketCount"><small>';
            $linktext.=basketCount();
            $linktext.='</small></div>';
        } else $linktext='Личный кабинет';
    } else{
        $link='index.php?u=page&act=login';
        $linktext='Личный кабинет | Войти';
    }
    return $userlink=['form' => $form,'link' => $link,'linktext' => $linktext,];
}


//функция для пользователя в БД
function checkPass($connect) {
    $ras=mysqli_query($connect,"SELECT users.id_user,user_name,user_login,user_pass,id_order,good_name,number,goods.price,charact FROM users left join basket on users.id_user=basket.id_user LEFT join goods on basket.id_good=goods.id_good where user_login='$_POST[username]' and user_pass='$_POST[password]' ORDER BY basket.id_order DESC"); 
    $rras[0]='';
    foreach($ras as $k => $m) {
        if(!empty($m)) {
            $rras[id]=$m[id_user];
            $rras[user_name]=$m[user_name];
            $rras[user_login]=$m[user_login];
            $rras[user_pass]=$m[user_pass];
            $rras[$m[id_order]][$k][name]=$m[good_name];
            $rras[$m[id_order]][$k][number]=$m[number];
            $rras[$m[id_order]][$k][price]=$m[price];
            $rras[$m[id_order]][$k][charact]=$m[charact];            
        }         
        $_SESSION[username]=$_POST[username];
        $_SESSION[password]=$_POST[password];
        $_SESSION[usArr]=$rras;
    }
}

//функция для формирования данных пользователя
function userData() {
    if($_SESSION[usArr]!=null) {
        
    }
}
//функция для формирования данных пользователя
function userCbnt() {
    $table='<p>Имя: '.$_SESSION[usArr][user_name].'<br/>Логин: '.$_SESSION[usArr][user_login].'<br/>Пароль: '.$_SESSION[usArr][user_pass].'</p>';
    
    $table.=basketTable();
    $table.='<p>Выполненные заказы в обратном хронологическом порядке:</p>';
    
    foreach($_SESSION[usArr] as $key => $mas) {
        if($key!='id' && $key!='user_name' && $key!='user_login' && $key!='user_pass') {
            $table.='<table class="orders">';
            $table.='<tr>';
            $table.='<td colspan="4">Заказ№:';
            $table.=$key;
            $table.='</td></tr>';
            foreach($mas as $ky => $msv) {
                $table.='<tr><td>';
                $table.=$msv[name];
                $table.='</td>';
                $table.='<td>';
                $table.=$msv[price];
                $table.=' руб.</td>';
                $table.='<td>';
                $table.=$msv[number];
                $table.=' шт.</td>';
                $table.='<td>';
                $table.=$msv[charact];
                $table.='</td>';
                $table.='</tr>';
            }
            $table.='</table>'; 
        }
    }
    return $table;
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
            if(!isset($_SESSION[username])) {
                $item.='</span><small class="notClient" ><p>Зарегистрируйтесь</p></small></a></a></div>';
            } else {
                $item.='</span><small>Цена: ';
                $item.=$m[pr];
                $item.=' р.</small><form action="" method="post"><input type="hidden" name="buyItem" value="';
                $itemTime = time();
                $itemData = "$m[id]|||click|$itemTime||id|$m[id]||name|$m[n]||price|$m[pr]||num|1";
                $item.=$itemData;
                $item.='"><input type="submit" value="Купить"></form></a></a></div>';
            }
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
            $item.=' р.</p><form action="" method="post"><input type="hidden" name="buyItem" value="';
            $itemTime = time();
            $itemData = "$m[id]|||click|$itemTime||id|$m[id]||name|$m[n]||price|$m[pr]||num|1";
            $item.=$itemData;
            $item.='"><input type="submit" value="Купить"></form></div></div>';
            echo $item;
        }	
    }
}

//функция для счетчика корзины
function basketCount() {
    if($_POST[buyItem] && gettype($_POST[buyItem])==string) {
        $t = explode('|||',$_POST[buyItem])[0];
        $$t;
        $m = explode('|||',$_POST[buyItem])[1];
        $$t = [
            'click' => explode('|',explode('||',$m)[0])[1],
            'id' => explode('|',explode('||',$m)[1])[1],
            'name' => explode('|',explode('||',$m)[2])[1],
            'price' => explode('|',explode('||',$m)[3])[1],
            'num' => (int)explode('|',explode('||',$m)[4])[1]     ];
        $_POST[buyItem] = $$t; 
    }    
    
    if(!isset($_SESSION[buyItem])) {
        if($_POST[buyItem] && $t!=null) $_SESSION[buyItem][$t]=$_POST[buyItem];
    } elseif($_SESSION[buyItem] && $_POST[buyItem] && $t!=null) {
        $isBuy = array_search( $t, array_column($_SESSION[buyItem],'id') );
        if($isBuy==null) $_SESSION[buyItem][$t]=$_POST[buyItem];
        else {
            $isClick = array_search( $_POST[buyItem][click], array_column($_SESSION[buyItem],'click') );
            if($isClick==null) {
                $_SESSION[buyItem][$t][num]++;
                $_SESSION[buyItem][$t][click]=$_POST[buyItem][click];
            }
        }
    } 
    if($_SESSION[buyItem])return array_sum(array_column($_SESSION[buyItem],'num'));
}

//функция для таблицы корзины
function basketTable() {
    if(isset($_SESSION[buyItem])) {
        $tableBas='<table class="orders basket"><tr><td>Корзина</td><td>Цена за штуку</td><td>Количество</td><td>Общая стоимость</td></tr>';
        foreach($_SESSION[buyItem] as $kses => $mses) {
            $tableBas.='<tr><td>';
            $tableBas.=$mses[name];
            $tableBas.='</td>';
            $tableBas.='<td>';
            $tableBas.=$mses[price];
            $tableBas.=' руб.</td>';
            $tableBas.='<td>';
            $tableBas.=$mses[num];
            $tableBas.=' шт</td>';
            $tableBas.='<td>';
            $tableBas.=$mses[price]*$mses[num];
            $tableBas.=' руб.</td></tr>';
            $sum+=$mses[price]*$mses[num];
        }
        $tableBas.='<tr><td class="totalSum" colspan="4">Итого: ';
        $tableBas.=$sum;
        $tableBas.=' руб.</td></tr></table>';
    }
    return $tableBas;
}