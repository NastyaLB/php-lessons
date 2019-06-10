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
    $form = '<p>'.end($_SESSION[buyItem][0][id]).'!</p>';
    if(isset($_SESSION[userlogin]) && $_SESSION[userlogin] != 'admin') {
        if(!isset($_SESSION[usArr])) checkOrdrs();
        $form .= userCbnt();
        $form .= '<form method="post"><input type="hidden" name="logout" value="logout"><input type="submit" value="Выйти"></form>';
        $link[0]='index.php?u=page&act=cabinet';
        if(basketCount()!=0 || $_POST[buyItem]) {
            $linktext[0]='Личный кабинет<div class="basketCount" id="basketCount"><small>';
            $linktext[0].=basketCount();
            $linktext[0].='</small></div>';
        } else $linktext[0]='Личный кабинет';
    } 
    
    elseif(isset($_SESSION[userlogin]) && $_SESSION[userlogin] == 'admin') {
        if(!isset($_SESSION[usArr])) checkOrdrs();
        $form .= adminCbnt();
        $form .= '<form method="post"><input type="hidden" name="logout" value="logout"><input type="submit" value="Выйти"></form>';
        $link[0]='index.php?u=page&act=store';
        $linktext[0]='Управление товарами';
        $link[1]='index.php?u=page&act=admnstr';
        $linktext[1]='Управление заказами';
    } 
    
    else{
        $form .= basketTable();
        $link[0]='index.php?u=page&act=login';
        if(basketCount()!=0 || $_POST[buyItem]) {
            $linktext[0]='Личный кабинет<div class="basketCount" id="basketCount"><small>';
            $linktext[0].=basketCount();
            $linktext[0].='</small></div> | Войти';
        } else $linktext[0]='Личный кабинет | Войти';
    }
    return $userlink=['form' => $form,'link' => $link,'linktext' => $linktext,];
}


//функция проверки пароля пользователя
function checkPass($connect) {
    $ras=mysqli_query($connect,"SELECT user_pass FROM users where user_login='$_POST[userlogin]'"); 
    if($ras->num_rows!=0) {
        foreach($ras as $key => $mas) {
            if($mas[user_pass] == $_POST[password]) {
                $_SESSION[userlogin] = $_POST[userlogin];
                $_SESSION[password] = $_POST[password];
                $_SESSION[buyItem][0][id][1] = 'Добро пожаловать, '.$_SESSION[userlogin];
            } else {
                $_SESSION[buyItem][0][id][1] = 'Пароль не совпадает';
            }
        }        
    } else {
        mysqli_query($connect,"INSERT INTO users (user_login, user_pass) VALUES ('$_POST[userlogin]','$_POST[password]')");
        $_SESSION[userlogin] = $_POST[userlogin];
        $_SESSION[password] = $_POST[password];
        $_SESSION[buyItem][0][id][1] = 'Добро пожаловать, '.$_SESSION[userlogin];
    }
}


//функция для БД пользователя
function checkOrdrs($connect) {
    if($_SESSION[userlogin] && $_SESSION[userlogin] != 'admin' ) {
        $ras=mysqli_query($connect,"SELECT users.id_user,user_name,user_login,user_pass,address,orders.id_order,amount,id_ordrstatus,good_name,number,goods.price,charact FROM users left join basket on users.id_user=basket.id_user left join orders on basket.id_order=orders.id_order LEFT join goods on basket.id_good=goods.id_good where user_login='$_SESSION[userlogin]' ORDER BY basket.id_order DESC"); 
        $rras[0]='';
        foreach($ras as $k => $m) {
            if(!isset($rras[id])) {
                $rras[id]=$m[id_user];
                $rras[user_name]=$m[user_name];
                $rras[user_login]=$m[user_login];
                $rras[user_pass]=$m[user_pass];
                $rras[address]=$m[address];
            }
            $rras[$m[id_order]][amount]=$m[amount];
            $rras[$m[id_order]][ordrstatus]=$m[id_ordrstatus];
            $rras[$m[id_order]][$k+1][name]=$m[good_name];
            $rras[$m[id_order]][$k+1][number]=$m[number];
            $rras[$m[id_order]][$k+1][price]=$m[price];
            $rras[$m[id_order]][$k+1][charact]=$m[charact]; 
            $_SESSION[usArr]=$rras;
        }         
    } elseif($_SESSION[userlogin] && $_SESSION[userlogin] == 'admin' ) {
        $ras=mysqli_query($connect,"SELECT * FROM users left join basket on users.id_user=basket.id_user left join orders on basket.id_order=orders.id_order LEFT join goods on basket.id_good=goods.id_good ORDER BY basket.id_order DESC"); 
        $rras[0]='';
        foreach($ras as $k => $m) {
            $rras[$m[id_order]][id]=$m[id_user];
            $rras[$m[id_order]][user_name]=$m[user_name];
            $rras[$m[id_order]][amount]=$m[amount];
            $rras[$m[id_order]][ordrstatus]=$m[id_ordrstatus];
            $rras[$m[id_order]][$k+1][name]=$m[good_name];
            $rras[$m[id_order]][$k+1][number]=$m[number];
            $rras[$m[id_order]][$k+1][price]=$m[price];
            $rras[$m[id_order]][$k+1][charact]=$m[charact]; 
            $_SESSION[usArr]=$rras;
        } 
        
        $rasgoods=mysqli_query($connect,"SELECT * FROM goods"); 
        foreach($rasgoods as $ky => $ms) {
            $goods[$ms[id_good]][good_name]=$ms[good_name];
            $goods[$ms[id_good]][price]=$ms[price];
            $goods[$ms[id_good]][id_category]=$ms[id_category];
            $goods[$ms[id_good]][charact]=$ms[charact];
            $goods[$ms[id_good]][id_status]=$ms[id_status];
            $_SESSION[goods]=$goods;
        } 
    } 
}

//функция для формирования данных пользователя
function userCbnt() {
    $table='<p>Имя: '.$_SESSION[usArr][user_name].'<br/>Логин: '.$_SESSION[usArr][user_login].'<br/>Пароль: '.$_SESSION[usArr][user_pass].'<br/>Адрес: '.$_SESSION[usArr][address].'</p>';
    
    $table.=basketTable();
    $table.='<p>Выполненные заказы в обратном хронологическом порядке:</p>';
    
    foreach($_SESSION[usArr] as $key => $mas) {
        if($key!='id' && $key!='user_name' && $key!='user_login' && $key!='user_pass' && $key!='address' && $key!=null) {
            $table.='<table class="orders">';
            $table.='<tr>';
            $table.='<td colspan="4">Заказ№:<b>';
            $table.=$key;
            $table.='</b> || Общая стоимость: ';
            $table.=$mas[amount];
            $table.=' руб. || Cтатус заказа: ';
            if($mas[ordrstatus] == 0) $table.='Комплектуется';
            if($mas[ordrstatus] == 1) $table.='Отправлен';
            if($mas[ordrstatus] == 2) $table.='Выполнен';
            $table.='</td></tr>';
            foreach($mas as $ky => $msv) {
                if($ky!='amount' && $ky!='ordrstatus'){
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
                $table.='</tr>';}
            }
            $table.='</table>'; 
        }
    }
    return $table;
}

//функция для формирования списка заказов в админке
function adminCbnt() {
    
    $table=basketTable();
    $table.='<p>Управление заказами:</p>';
    
    foreach($_SESSION[usArr] as $key => $mas) {
        if($key!='id' && $key!='user_name' && $key!='user_login' && $key!='user_pass' && $key!='address' && $key!=null) {
            $table.='<table class="orders">';
            $table.='<tr>';
            $table.='<td colspan="4">Заказ№:<b>';
            $table.=$key;
            $table.='</b> || Заказчик: ';
            $table.=$mas[id];
            $table.='-';
            $table.=$mas[user_name];
            $table.='</b> || Сумма: ';
            $table.=$mas[amount];
            $table.=' руб. || Cтатус заказа: ';
            
            $table.='<form class="statusForm" id="';
            $table.=$key;
            $table.='stat" method="post"><select>';
            if($mas[ordrstatus] == 0) 
                $table.='<option selected value="0">Оплачен</option><option value="1">Комплектуется</option><option value="2">Отправлен</option><option value="3">Выполнен</option>';
            elseif($mas[ordrstatus] == 1) 
                $table.='<option value="0">Оплачен</option><option selected value="1">Комплектуется</option><option value="2">Отправлен</option><option value="3">Выполнен</option>';
            elseif($mas[ordrstatus] == 2) 
                $table.='<option value="0">Оплачен</option><option value="1">Комплектуется</option><option selected value="2">Отправлен</option><option value="3">Выполнен</option>';
            elseif($mas[ordrstatus] == 3) 
                $table.='<option value="0">Оплачен</option><option value="1">Комплектуется</option><option value="2">Отправлен</option><option selected value="3">Выполнен</option>';
            $table.='</select><a href="#" id="';
            $table.=$key;
            $table.='sbmt" onClick="chngStatus(this.id,this.previousElementSibling.value);return false;">send</a></form>';
            $table.='</td></tr>';
            
            foreach($mas as $ky => $msv) {
                if($ky!='amount' && $ky!='ordrstatus' && $ky!='id' && $ky!='user_name'){
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
                $table.='</tr>';}
            }
            
            $table.='</table>'; 
        }
    }
    
    return $table;
}

//функция для формирования списка товаров в админке
function adminStore() {    
    
    $table='<p>Управление товарами:</p><table class="gooDist"><tr><td><form class="goodEdit" enctype="multipart/form-data">Новый товар | название: <input type="text" name="good_name" placeholder="впишите название товара"> | Цена: <input type="text" name="price"> руб. <a href="#" id="newsbmt" onClick="chngGood(this.id, this.previousElementSibling.previousElementSibling.value, this.previousElementSibling.value, this.nextElementSibling.value, this.nextElementSibling.nextElementSibling.files);return false;">send</a><input type="text" name="charact" placeholder="впишите описание товара"><input type="file" name="imgUp" accept="image/jpeg"></form></td></tr><tr class="stringTR"><td></td></tr><tr class="stringTR"><td></td></tr>';
    
    foreach($_SESSION[goods] as $key => $mas) {
        $tab_key = '<tr><td><form class="goodEdit"><img src="data/files/Plush-';
        $tab_key .= $key;
        $tab_key .= '.jpg" alt="">ID товара: ';
        $tab_key .= $key;
        $tab_key .= ' | название: <input type="text" name="good_name" value="';
        $tab_key .= $mas[good_name];
        $tab_key .= '"> | Цена: <input type="text" name="price" value="';
        $tab_key .= $mas[price];
        $tab_key .= '"> руб. <a href="#" id="';
        $tab_key .= $key;
        $tab_key .= 'sbmt" onClick="chngGood(this.id, this.previousElementSibling.previousElementSibling.value, this.previousElementSibling.value, this.nextElementSibling.value);return false;">send</a><input type="text" name="charact" value="';
        $tab_key .= $mas[charact];
        $tab_key .= '"><input type="file" name="imgUp" accept="image/jpeg"></form></td></tr>';
        $tab_all = $tab_key.$tab_all;
    }
    $table .= $tab_all;
    return $table .= '</table><br/><form method="post"><input type="hidden" name="logout" value="logout"><input type="submit" value="Выйти"></form>';
}






//функция для бланка заказа
function orderList() {
    $ordrForm = '<form method="post"><p>Имя: ';
    if($_SESSION[usArr][user_name]) $ordrForm .= $_SESSION[usArr][user_name];
    else  $ordrForm .= '<input type="text" name="username" required>';
    $ordrForm .= '</p><p>Список товаров:</p><ul>';
    foreach($_SESSION[buyItem] as $kses => $mses) {
        if($kses==0) continue;
        $ordrForm.='<li>';
        $ordrForm.=$mses[name];
        $ordrForm.=' | цена за штуку: ';
        $ordrForm.=$mses[price];
        $ordrForm.=' руб. | количество: <input type="hidden" name="num';
        $ordrForm.= $kses;
        $ordrForm.= '" value="';
        $ordrForm.= $mses[num];
        $ordrForm.= '">';
        $ordrForm.= $mses[num];
        $ordrForm.=' шт</li>';
        $sum+=$mses[price]*$mses[num];
    }
    $ordrForm .= '<li>Итого: ';
    $ordrForm .= $sum;
    $ordrForm .= ' руб.<input type="hidden" name="amount" value="';
    $ordrForm .= $sum;
    $ordrForm .= '"></li></ul><p>Адрес доставки: ';
    if($_SESSION[usArr][address]) $ordrForm .= $_SESSION[usArr][address];
    else  $ordrForm .= '<input type="text" name="address" required>';
    $ordrForm .= '</p><p>Способ оплаты: <input type="radio" name="buymeth" value="1" required> картой   | <input type="radio" name="buymeth" value="0" required> наличными</p><input type="submit" value="Отправить"></form>';
    return $ordrForm;
}


//функция для отправки заказа
//почему-то не получается отправлять запросы вместе, только по одному
function orderSend($connect) {
    
    $id_user = $_SESSION[usArr][id];
    $sql = '';
    
    if($_POST[username] && $_POST[address]) {
        $_SESSION[usArr][user_name] = $_POST[username];
        $_SESSION[usArr][address] = $_POST[address];
        $sql .= "UPDATE users SET user_name = '$_POST[username]', address = '$_POST[address]' WHERE id_user=$id_user; ";        
    } elseif($_POST[username] && !isset($_POST[address])) {
        $_SESSION[usArr][user_name] = $_POST[username];
        $sql .= "UPDATE users SET user_name = '$_POST[username]' WHERE id_user=$id_user; ";
    } elseif(!isset($_POST[username]) && $_POST[address]) {
        $_SESSION[usArr][address] = $_POST[address];
        $sql .= "UPDATE users SET address = '$_POST[address]' WHERE id_user=$id_user; ";
    }
        
    
    $_SESSION[usArr][0][trd] = mysqli_query($connect,$sql);  //почистить
    $_SESSION[usArr][0][trd1] = $sql;  //почистить
    
    
    $maxId= mysqli_fetch_assoc(mysqli_query($connect, 'SELECT MAX(id_order) from orders'))['MAX(id_order)']+1; 
    $sql = "INSERT INTO orders (id_order,id_user, amount, id_ordrstatus) VALUES ('$maxId','$id_user','$_POST[amount]','0'); " ;
    
    $_SESSION[usArr][0][ord] = mysqli_query($connect,$sql);  //почистить
    $_SESSION[usArr][0][ord1] = $sql;  //почистить
    
    
    
    $sql = "INSERT INTO basket (id_user, id_good, number, price, is_in_order, id_order) VALUES ";
    foreach($_SESSION[buyItem] as $k => $m){    
        $nUm = 'num'.$k;
        if($k==0) continue; 
        if($m[id] == end($_SESSION[buyItem])[id]) $sql .= "('$id_user', '$m[id]', '$_POST[$nUm]', '$m[price]', '1','$maxId')"; //
        else $sql .= "('$id_user', '$m[id]', '$_POST[$nUm]', '$m[price]', '1','$maxId'), ";         
    }
    
    $_SESSION[usArr][0][sql] = mysqli_query($connect,$sql); //почистить
    $_SESSION[usArr][0][sql1] = $sql;   //почистить
    checkOrdrs($connect);
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
            $item.=' р.</small><form action="" method="post"><input type="hidden" name="buyItem" value="';
            $itemTime = time();
            $itemData = "$m[id]|||click|$itemTime||id|$m[id]||name|$m[n]||price|$m[pr]||num|1";
            $item.=$itemData;
            $item.='"><input type="submit" value="Купить"></form></a></a></div>';
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
    
    if($_POST[buyItem] && $t!=null) {
        $isBuy = array_search( $t, array_column($_SESSION[buyItem],'id') );
        if($isBuy==null){ echo $isBuy; $_SESSION[buyItem][$t]=$_POST[buyItem];}
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
    if(count($_SESSION[buyItem]) > 1) {
        $tableBas='<table class="orders basket"><tr><td>Корзина</td><td>Цена за штуку</td><td>Количество</td><td>Общая стоимость</td></tr>';
        foreach($_SESSION[buyItem] as $kses => $mses) {
            if($kses==0) continue;
            $tableBas.='<tr id="';
            $tableBas.=$mses[id];
            $tableBas.='tr"><td>';
            $tableBas.=$mses[name];
            $tableBas.='</td><td>';
            $tableBas.=$mses[price];
            $tableBas.=' руб.</td><td><a href="#" class="operaNd" id="mnus" onClick="showAdd(this.id,this.nextElementSibling.id);return false;">-</a> <span id="';
            $tableBas.=$mses[id];
            $tableBas.='num">';
            $tableBas.=$mses[num];
            $tableBas.='</span> <a href="#" class="operaNd" id="plus" onClick="showAdd(this.id,this.previousElementSibling.id);return false;">+</a> шт</td><td id="';
            $tableBas.=$mses[id];
            $tableBas.='sum">';
            $tableBas.=$mses[price]*$mses[num];
            $tableBas.=' руб.</td></tr>';
            $sum+=$mses[price]*$mses[num];
        }
        $tableBas.='<tr><td class="totalSum" id="totalSum" colspan="4">Итого: ';
        $tableBas.=$sum;
        $tableBas.=' руб.</td></tr></table>';
        if(isset($_SESSION[userlogin])) $tableBas.='<a href="?u=page&act=order" class="aOrder">Оформить заказ</a>';
    }
    return $tableBas;
}