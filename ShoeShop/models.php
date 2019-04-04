<script src="jquery.js"></script>
<script>
    
$(document).ready(function() { 
	$('a#go').click( function(event){ /* лoвим клик пo ссылке с id="go" */
		event.preventDefault(); /* выключaем стaндaртную рoль элементa */
		$('#overlay').fadeIn(400, /* снaчaлa плaвнo пoкaзывaем темную пoдлoжку */
		 	function(){ /* пoсле выпoлнения предыдущей aнимaции */
				$('#modal_form') 
					.css('display', 'block') /* убирaем у мoдaльнoгo oкнa display: none; */
					.animate({opacity: 1, top: '50%'}, 200); /* плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз */
		});
	});
	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('#modal_close, #overlay').click( function(){ /* лoвим клик пo крестику или пoдлoжке */
		$('#modal_form')
			.animate({opacity: 0, top: '45%'}, 200,  /* плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх */
				function(){ /* пoсле aнимaции */
					$(this).css('display', 'none'); /* делaем ему display: none; */
					$('#overlay').fadeOut(400); /* скрывaем пoдлoжку */
				}
			);
	});
});   
    
$(document).ready(function() { 
	$('a#adIt').click( function(event){ /* лoвим клик пo ссылке с id="edIt" */
		event.preventDefault(); /* выключaем стaндaртную рoль элементa */
		$('#overlay').fadeIn(400, /* снaчaлa плaвнo пoкaзывaем темную пoдлoжку */
		 	function(){ /* пoсле выпoлнения предыдущей aнимaции */
				$('#modal_form_ad') 
					.css('display', 'block') /* убирaем у мoдaльнoгo oкнa display: none; */
					.animate({opacity: 1, top: '13%'}, 200); /* плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз */
		});
	});
	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('#modal_close, #overlay').click( function(){ /* лoвим клик пo крестику или пoдлoжке */
		$('#modal_form_ad')
			.animate({opacity: 0, top: '7%'}, 200,  /* плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх */
				function(){ /* пoсле aнимaции */
					$(this).css('display', 'none'); /* делaем ему display: none; */
					$('#overlay').fadeOut(400); /* скрывaем пoдлoжку */
				}
			);
	});
});   
    
$(document).ready(function() { 
	$('a#edIt').click( function(event){ /* лoвим клик пo ссылке с id="edIt" */
		event.preventDefault(); /* выключaем стaндaртную рoль элементa */
		$('#overlay').fadeIn(400, /* снaчaлa плaвнo пoкaзывaем темную пoдлoжку */
		 	function(){ /* пoсле выпoлнения предыдущей aнимaции */
				$('#modal_form_ed') 
					.css('display', 'block') /* убирaем у мoдaльнoгo oкнa display: none; */
					.animate({opacity: 1, top: '13%'}, 200); /* плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз */
		});
	});
	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('#modal_close, #overlay').click( function(){ /* лoвим клик пo крестику или пoдлoжке */
		$('#modal_form_ed')
			.animate({opacity: 0, top: '7%'}, 200,  /* плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх */
				function(){ /* пoсле aнимaции */
					$(this).css('display', 'none'); /* делaем ему display: none; */
					$('#overlay').fadeOut(400); /* скрывaем пoдлoжку */
				}
			);
	});
});

</script>

<?

// функция для формирования среды админа
function adminRed($admin) {
    if($admin=='admin') {
        include('views/redact.php');
    }
}


//Функция для добавления и редактирования товаров админом
function adminItems($page,$connect) {
    if(isset($_POST[clicktime]) && isset($_POST[addItem])) {
        $res1=mysqli_query($connect,"SELECT * FROM goods WHERE clicktime=$_POST[clicktime]");
        $res2=mysqli_query($connect,"SELECT * FROM goods WHERE item='$_POST[item]'");
        if(mysqli_num_rows($res1)==0 && mysqli_num_rows($res2)==0) {
            $iName=str_replace(' из ',' из&nbsp;',$_POST[item]);
            $iName=str_replace(' c ',' c&nbsp;',$_POST[item]);
            
            //получение номера товара
            $nume=mysqli_fetch_assoc(mysqli_query($connect,'select max(id) from goods'))['max(id)']+1;
            $nume=str_pad($nume, 4, "0", STR_PAD_LEFT);
            
            //сохранение описания и характеристик товара
            $tx1=$_POST[charact];
            $tx2=$_POST[descript];
            $tx=[$tx1,$tx2];
            $txt=implode('&&',$tx);
            $txname=$nume.'.txt';
            $txnameP='files/texts/'.$txname;
            file_put_contents($txnameP,$txt);
            
            //сохранение картинки
            $numeIm=$nume.'.jpg';
            $path0='files/images/full/'.$_FILES[image][name];
            file_put_contents('files/images/thumb/'.$numeIm,'0');
            move_uploaded_file($_FILES[image][tmp_name],$path0);            
            $path='files/images/full/'.$numeIm;
            rename($path0,$path);
            makeImSize($path,600,$numeIm);
            
            //отправка данных в БД
            mysqli_query($connect,"INSERT INTO goods (item, price, image, descript, status, clicktime) VALUES ('$iName','$_POST[price]','$numeIm','$txname','$_POST[status]','$_POST[clicktime]')");        
        }
    } elseif(isset($_POST[clicktime]) && isset($_POST[formedit])) {
        if(mysqli_num_rows( mysqli_query($connect,"SELECT * FROM goods WHERE clicktime='$_POST[clicktime]' and id='$page'") )==0) {
            $nume=str_pad($page, 4, "0", STR_PAD_LEFT);
            if($_POST[item]!='') {
                mysqli_query($connect,"UPDATE goods SET item='$_POST[item]' WHERE id='$page'");
            }
            if($_FILES[image][name]!='') {
                //сохранение картинки
                $numeIm=$nume.'.jpg';
                $path0='files/images/full/'.$_FILES[image][name];
                file_put_contents('files/images/thumb/'.$numeIm,'0');
                move_uploaded_file($_FILES[image][tmp_name],$path0);
                $path='files/images/full/'.$numeIm;
                rename($path0,$path);
                makeImSize($path,600,$numeIm);
            }
            if($_POST[price]!='') {
                mysqli_query($connect,"UPDATE goods SET price='$_POST[price]' WHERE id='$page'");
            }
            if($_POST[status]!='') {
                mysqli_query($connect,"UPDATE goods SET status='$_POST[status]' WHERE id='$page'");
            }
            if(isset($_POST[charact]) || isset($_POST[descript])) {
                //сохранение описания и характеристик товара
                $tx1=$_POST[charact];
                $tx2=$_POST[descript];
                $tx=[$tx1,$tx2];
                $txt=implode('&&',$tx);
                $txname=$nume.'.txt';
                $txnameP='files/texts/'.$txname;
                file_put_contents($txnameP,$txt);
            }
            mysqli_query($connect,"UPDATE goods SET clicktime='$_POST[clicktime]' WHERE id='$page'");
        }
    } 
}


//Функция для изъятия или добавления товаров в каталог
function adminEnableItem($page,$connect) {
    if(isset($_POST[clicktime]) && isset($_POST[Itenable])) {        
        if(mysqli_num_rows( mysqli_query($connect,"SELECT * FROM goods WHERE clicktime='$_POST[clicktime]' and id='$page'") )==0) {
            mysqli_query($connect,"UPDATE goods SET status='1',clicktime='$_POST[clicktime]' WHERE id='$page'");
        }
    } elseif(isset($_POST[clicktime]) && isset($_POST[Itdel])) {        
        if(mysqli_num_rows( mysqli_query($connect,"SELECT * FROM goods WHERE clicktime='$_POST[clicktime]' and id='$page'") )==0) {
            mysqli_query($connect,"UPDATE goods SET status='0',clicktime='$_POST[clicktime]' WHERE id='$page'");
        }
    } elseif(isset($_POST[clicktime]) && isset($_POST[ItenableS])) {        
        if(mysqli_num_rows( mysqli_query($connect,"SELECT * FROM goods WHERE clicktime='$_POST[clicktime]' and id='$_POST[ItenableS]'") )==0) {
            mysqli_query($connect,"UPDATE goods SET status='1',clicktime='$_POST[clicktime]' WHERE id='$_POST[ItenableS]'");
        }
    } elseif(isset($_POST[clicktime]) && isset($_POST[ItdelS])) {        
        if(mysqli_num_rows( mysqli_query($connect,"SELECT * FROM goods WHERE clicktime='$_POST[clicktime]' and id='$_POST[ItdelS]'") )==0) {
            mysqli_query($connect,"UPDATE goods SET status='0',clicktime='$_POST[clicktime]' WHERE id='$_POST[ItdelS]'");
        }
    } 
}


//Функция для добавления аватарки
function addAvatar($connect) {
    if($_FILES[avaIm][name]!='' && isset($_POST[clicktime])) {
        $res1=mysqli_query($connect,"SELECT * FROM users WHERE clicktime='$_POST[clicktime]' and login='$_SESSION[login]'");
        $res2=mysqli_query($connect,"SELECT * FROM users WHERE login='$_SESSION[login]'");
        if(mysqli_num_rows($res1)==0) {
            //получение номера аватарки
            $nume=mysqli_fetch_assoc($res2)[id];
            $nume=str_pad($nume, 4, "0", STR_PAD_LEFT);
            
            //сохранение картинки
            $numeIm=$nume.'.jpg';
            $path0='files/avatar/'.$_FILES[avaIm][name];
            move_uploaded_file($_FILES[avaIm][tmp_name],$path0);            
            $path='files/avatar/'.$numeIm;
            rename($path0,$path);
            makeImSize($path,50,$numeIm);
            
            //отправка данных в БД
            mysqli_query($connect,"UPDATE users SET avatar='$numeIm',clicktime='$_POST[clicktime]' where login='$_SESSION[login]'");echo $numeIm.'=$numeIm<br>';
        }
    }
}


//Функция для добавления комментария
function addComment($connect) {
    if(isset($_POST[comment]) && isset($_POST[clicktime])) {
        $res1=mysqli_query($connect,"SELECT * FROM comment WHERE timepost='$_POST[clicktime]' and login='$_SESSION[login]'");
        //$res2=mysqli_query($connect,"SELECT * FROM users WHERE login='$_SESSION[login]'");
        if(mysqli_num_rows($res1)==0) {
            $comment=strip_tags($_POST[comment]);
            mysqli_query($connect,"INSERT INTO comment (login, text, timepost) VALUES ('$_SESSION[login]','$comment','$_POST[clicktime]')");
        }
    }
}


//Функция уменьшения и обрезки загруженной картинки, где ($path-> папка, куда загружена картинка), ($size - размер переданный функцией defineImg), ($nume - имя файла переданное функцией getFreeName посредством функции )
    function makeImSize($path, $size, $nume) { 
        list($iWidth, $iHeight, $iExtenOld) = getimagesize($path);
        $imJPG = @imagecreatefromjpeg($path);   
        
        if($iWidth<=$iHeight){
            $ycenter=($iHeight-$iWidth)/2;
            $imCrop = imagecrop($imJPG, ['x' => 0, 'y' => $ycenter, 'width' => $iWidth, 'height' => $iWidth]);           
        }
        else {
            $xcenter=($iWidth-$iHeight)/2;
            $imCrop = imagecrop($imJPG, ['x' => $xcenter, 'y' => 0, 'width' => $iHeight, 'height' => $iHeight]);
        }
                
        if($size==600) {
            $im600=imagecreatetruecolor(600,600);
            imagecopyresampled($im600,$imCrop,0,0,0,0,600,600,imagesx($imCrop),imagesy($imCrop));
            imagejpeg($im600,$path);
            $path = 'files/images/full/'.$nume;
            
            $im150=imagecreatetruecolor(150,150);
            imagecopyresampled($im150,$imCrop,0,0,0,0,150,150,imagesx($imCrop),imagesy($imCrop)); 
            $path2 = 'files/images/thumb/'.$nume;
            imagejpeg($im150,$path2);            
        } else {
            $im50=imagecreatetruecolor(50,50);
            imagecopyresampled($im50,$imCrop,0,0,0,0,50,50,imagesx($imCrop),imagesy($imCrop));
            
            $path = 'files/avatar/'.$nume;
            imagejpeg($im50,$path);
        }
    }

//Функция для формирования ссылки на кабинет пользователя в меню
function linCabinet($connect) {
    if(isset($_SESSION[login])) {
        echo "<a href='?user=$_SESSION[login]'>Кабинет</a>";
    } else echo "<a href='?user=anon'>Кабинет</a>";
}


//Функция для формирования приветствия
function buildGreet($page,$pUser) {
    if(isset($pUser) && isset($_SESSION[login])) {
        echo '<h1><i>Добро пожаловать, '.$_SESSION[login].'!</i></h1><p>Здесь вы можете отслеживать детальный список выбранных товаров и их текущую стоимость.<br/><br/></p>';
    } elseif(!isset($pUser)) {
        echo '<h1><i>Добро пожаловать!</i></h1><p>В магазине ShoeShop представлен богатый выбор женских туфель.<br/><br/></p>';
    } elseif(isset($pUser) && !isset($_SESSION[login])) {
        echo '<h1><i>Добро пожаловать!</i></h1><p>Здесь вы можете отслеживать детальный список выбранных товаров и их текущую стоимость.<br/><br/></p>';
    }
}

//Функция для формирования галерии
function buildGallery($page,$connect) {
    if($_SESSION[login]=='admin' && $page=='S') {
        echo '<div class="itemBox"><div class="item"><a href="#" id="adIt" style="height:160px;width:140px;display:block;"> </a><div class="itemN"><a href="" id="adIt" name="adItem">добавить товар</a></div></div></div>';
    }
    $res=mysqli_query($connect,'SELECT * FROM goods');     
    foreach($res as $i => $r) {
        if($r[status]==0 && $_SESSION[login]!='admin') continue;         
        $div='<div class="itemBox"><div class="item"><a href="?item=';
        $div.=$r[id];
        $div.='"><img src="files/images/thumb/';
        $div.=$r[image];
        $div.='" alt="';
        $div.=$r[item];
        $div.='"></a><div class="itemN"><a href="?item=';
        $div.=$r[id];
        $div.='" id="adItem" name="adItem">';
        $div.=$r[item];
        if($_SESSION[login]=='admin' && $page=='S') {
            if($r[status]=='0') {
                $div.='</a></div></div><div class="redact pageRed"><div class="enIt"><form action="" method="post"><a href="#" id="edIt" onclick="parentNode.submit();">&#61543;</a><input type="hidden" name="clicktime" value="';
                $div.=time();
                $div.='"><input type="hidden" name="ItenableS" value="';
                $div.=$r[id];
                $div.='"/></form></div><div class="redIt"><a href="?item=';
                $div.=$r[id];
                $div.='" id="edIt1">&#61504;</a></div></div></div>';
            }
            elseif ($r[status]=='1') {
                $div.='</a></div></div><div class="redact pageRed"><div class="redIt"><a href="?item=';
                $div.=$r[id];
                $div.='" id="edIt1">&#61504;</a></div><div class="delIt"><form action="" method="post"><a href="" id="edIt" onclick="parentNode.submit();">&#61453;</a><input type="hidden" name="clicktime" value="';
                $div.=time();
                $div.='"><input type="hidden" name="ItdelS" value="';
                $div.=$r[id];
                $div.='"/></form></div></div></div>';
            }
        } else $div.='</a></div></div></div>';
        echo $div;
        if(isset($page) && $page!='S' && $i==3) break;
        elseif(!isset($page) && $i==9) break;
    }    
}

//Функция для формирования страницы товара
function buildItemPage ($page,$connect) {
    $res=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM goods where id=$page"));
    
    //формирование текстовой части страницы
        $path="files/texts/$res[descript]";
        $ul=file_get_contents($path,true);
        $ar=explode('&&',$ul);
        $char=$ar[0];
        foreach($ar as $k => $m) {
            $ar2=explode("\n",$m);
            if($k==0){ 
                foreach($ar2 as $kk => $ms) $li.='<li>'.$ms.'</li>';
            } else $h3p=$m;
        } 
    
    if($_SESSION[login]=='admin') {
        if($res[status]=='0') {
            $redact='<div class="redact pageRed"><div class="enIt"><form action="" method="post"><a href="#" id="edIt" onclick="parentNode.submit();">&#61543;</a><input type="hidden" name="clicktime" value="';
            $redact.=time();
            $redact.='"><input type="hidden" name="Itenable" value="';
            $redact.=$res[id];
            $redact.='"></form></div><div class="redIt"><a href="" id="edIt">&#61504;</a></div></div>';
        }
        elseif ($res[status]=='1') {
            $redact='<div class="redact pageRed"><div class="redIt"><a href="" id="edIt">&#61504;</a></div><div class="delIt"><form action="" method="post"><a href="" id="edIt" onclick="parentNode.submit();">&#61453;</a><input type="hidden" name="clicktime" value="';
            $redact.=time();
            $redact.='"><input type="hidden" name="Itdel" value="';
            $redact.=$res[id];
            $redact.='"></form></div></div>';
        }
        
        $div='<div class="img1"><a href="" id="go"><img src="files/images/full/';
        $div.=$res[image];  $div.='" alt="';    $div.=$res[item];
        $div.='"></a>'.$redact.'<div id="modal_form"><span id="modal_close">&#61453;</span><img src="files/images/full/';
    } 
    else {
        $div='<div class="img1"><a href="" id="go"><img src="files/images/full/';
        $div.=$res[image];  $div.='" alt="';    $div.=$res[item];
        $div.='"></a><div id="modal_form"><span id="modal_close">&#61453;</span><img src="files/images/full/';
    }
    $div.=$res[image];  $div.='" alt="';    $div.=$res[item];
    $div.='"></div><div id="overlay"></div></div><div><h1>';
    $div.=$res[item];   $div.='</h1><h2>';
    $div.=$res[price]; 
    $div.=' <small> руб.</small></h2><form action="#" method="post"><input type="hidden" name="buyIt" value="';
    $div.=$res[id];
    $div.='"><input type="hidden" name="clicktime" value="';
    $div.=time();
    $div.='"><input type="submit" value="В корзину"></form></div><div><h3>Характеристики товара</h3><ul>';
    $div.=$li;
    $div.='</ul></div><div><h3>Описание товара</h3><p>';
    $div.=$h3p;
    $div.='</p></div><form action="" name="enableIt" method="post" style="display:none"><input name="Itenable" type="hidden" value="1"></form>';
    echo $div;    
    if($_SESSION[login]=='admin') echo buildBDItemForm($res[item],$res[price],$res[image],$char,$h3p,$res[status]);
}

//Функция для формирования формы правки товара
function buildBDItemForm($name,$price,$image,$char,$des,$status) {
    $form='<div id="modal_form_ed"><span id="modal_close">&#61453;</span><form class="admItem admred" action="" method="post" enctype="multipart/form-data"><img class="formIm" src="files/images/thumb/';
    $form.=$image;
    $form.='"><input type="file" name="image" accept="image/jpeg"><p>';
    $form.=$name;
    $form.='</p><input type="text" name="item"><p>';
    $form.=$price;
    $form.=' руб.</p><input type="text" name="price"><p>Характеристики товара:</p><textarea name="charact" id="charact" cols="30" rows="5">';
    $form.=$char;
    $form.='</textarea><p>Описание товара</p><textarea name="descript" id="descript" cols="30" rows="16">';
    $form.=$des;
    $form.='</textarea><input type="hidden" name="formedit" value="1"><input type="hidden" name="clicktime" value="';
    $form.=time();
    if($status==0) $form.='"><p><input type="radio" name="status" value="1">:опубликовать | <input type="radio" name="status" value="0" checked>:не публиковать</p><input type="submit" value="Загрузить"></form></div>';
    else $form.='"><p><input type="radio" name="status" value="1" checked>:опубликовать | <input type="radio" name="status" value="0">:не публиковать</p><input type="submit" value="Загрузить"></form></div>';
    return $form;
}

//Функция для формирования корзины
function putInBasket($basket,$connect) {
    $bas='<form action="?order" method="post"><table class="basket"><tr class="titleBas"><td>фото</td><td>название</td><td>кол-во</td><td>скидка</td><td>цена</td><td>без скидки</td><td>за штуку</td></tr>';
    foreach($basket as $k => $m) {
        $bas.='<tr class="itemRow"><td><img src="files/images/thumb/';
        $nume=str_pad($k, 4, "0", STR_PAD_LEFT);
        $bas.=$nume.'.jpg';
        $bas.='" alt=""></td><td><a href="?item=';
        $bas.=$k;
        $bas.='">';
        $bas.=mysqli_fetch_assoc(mysqli_query($connect,"SELECT item FROM goods where id='$k'"))[item];
        $bas.='</a></td><td>';
        $bas.=$m[buycount];
        $bas.='<small> шт</small><br></td><td>';
        if(date('G',time())==13) {
            $bas.='15%';
            $discont=0.75;
            $bas.='<input type="text" name="discont" value="15"><small>%</small></td><td>';
        }
        else  {
            $bas.='нет</td><td>';
            $discont=1;
        }
        $price=mysqli_fetch_assoc(mysqli_query($connect,"SELECT price FROM goods where id='$k'"))[price];
        $tot=$price*$m[buycount]*$discont;
        $bas.=$price*$m[buycount]*$discont;
        $bas.='<small> р</small></td><td>';
        $bas.=$price*$m[buycount];
        $bas.='<small> р</small></td><td>';
        $bas.=$price;
        $bas.='<small> р</small></td></tr>';
        $total=$total+$tot;
    }
    $bas.='<tr class="totalBas"><td colspan="3"></td><td>Итого:</td><td>';
    $bas.=$total;
    $bas.='<small> р</small></td><td colspan="2">заказ №:S-';
    $bas.=$m[clicktime];
    $bas.='</td></tr></table><input type="hidden" name="user" value="';
    $bas.=$_SESSION[login];
    $bas.='"><input type="hidden" name="order" value="';
    $bas.="S-$m[clicktime]";
    $bas.='"><input type="hidden" name="total" value="';
    $bas.=$total;
    $bas.='"><input type="submit" value="Оформить заказ"></form>';
    echo $bas;
}

//Функция для контроля заказа
function watchOrder($basket,$connect) {    
    if($_SESSION[login]!='admin' && isset($_POST[ordered]) && isset($basket)) {
        if( mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM orders where clicktime='$_POST[clicktime]' and user='$_SESSION[login]' and id='$_POST[order]'"))==null ) {
            $ord='<table class="orders"><tr class="titleOr"><td>к оплате</td><td>заказ №:';
            $ord.=$_POST[order];
            $ord.='</td><td>телефон</td><td>адрес доставки</td><td>стадия оплаты</td><td>стадия заказа</td></tr><tr class="itemRow"><td>';
            $ord.=$_POST[total];
            $ord.='<small> руб.</small></td><td>';
            foreach($_POST[item] as $k => $m) {
                if(($k+1)%2!=0) {
                    $ord.='<b>';
                    $ord.=$m;
                    $ord.='</b>/';
                } elseif(($k+1)%2==0) {
                    $ord.=$m;
                    $ord.='<br>';
                }
            }
            $item=json_encode($_POST[item], JSON_UNESCAPED_UNICODE);
            $ord.='</td><td>';
            $ord.=$_POST[phone];
            $ord.='</td><td>';
            $ord.=$_POST[dest];
            $ord.='</td><td>';
            if($_POST[buyway]=='1') $ord.='оплачено полностью';
            elseif($_POST[buyway]=='0') $ord.='оплата после доставки';
            $ord.='</td><td>собирается</td></tr></table>';
            echo $ord;
            mysqli_query($connect,"INSERT INTO orders (id, user, phone, dest, worth, basket, client, clicktime) VALUES ('$_POST[order]', '$_SESSION[login]', '$_POST[phone]', '$_POST[dest]', '$_POST[total]', '$item', '$_POST[buyway]', '$_POST[clicktime]')"); 
            $basket=null;
            $_SESSION[buycount]=null;
            }
    } elseif($_SESSION[login]!='admin') {
        $res=mysqli_query($connect,"SELECT * FROM orders where user='$_SESSION[login]'");  
        if( mysqli_num_rows($res)!=0 ) {
            foreach($res as $k => $m) {
                $ord='<table class="orders"><tr class="titleOr"><td>к оплате</td><td>заказ №:';
                $ord.=$m[id];
                $ord.='</td><td>телефон</td><td>адрес доставки</td><td>стадия оплаты</td><td>стадия заказа</td></tr><tr class="itemRow"><td>';
                $ord.=$m[worth];
                $ord.='<small> руб.</small></td><td>';
                $basket=json_decode($m[basket]);
                foreach($basket as $key => $mas) {
                    if(($key+1)%2!=0) {
                        $ord.='<b>';
                        $ord.=$mas;
                        $ord.='</b>/';
                    } elseif(($key+1)%2==0) {
                        $ord.=$mas;
                        $ord.='<br>';
                    }
                }
                $ord.='</td><td>';
                $ord.=$m[phone];
                $ord.='</td><td>';
                $ord.=$m[dest];
                $ord.='</td><td>';
                if($m[client]=='1') $ord.='оплачено полностью';
                elseif($m[client]=='0') $ord.='оплата после доставки';  
                $ord.='</td><td>';
                if($m[making]=='0') $ord.='передано в&nbsp;работу';
                elseif($m[making]=='1') $ord.='собирается';
                elseif($m[making]=='2') $ord.='отправлен';
                elseif($m[making]=='3') $ord.='выполнен';
                $ord.='</td></tr></table>';
                echo $ord;
            }
        }
    } elseif($_SESSION[login]=='admin') {
        $res=mysqli_query($connect,"SELECT * FROM orders");  
        if( mysqli_num_rows($res)!=0 ) {
            echo '<form action="?order=Admin" method="post">';
            foreach($res as $k => $m) {
                $ord="<table class='orders'><tr class='titleOr'><td>к оплате</td><td>заказ №:".$m[id];
                $ord.="</td><input type='hidden' name='orderID[$k][id]' value='".$m[id];
                $ord.="'><td>телефон</td><td>адрес доставки</td><td>стадия оплаты</td><td>стадия заказа</td></tr><tr class='itemRow'><td>".$m[worth]."<small> руб.</small></td><td>";
                $basket=json_decode($m[basket]);
                foreach($basket as $key => $mas) {
                    if(($key+1)%2!=0) {
                        $ord.="<b>".$mas."</b>";
                    } elseif(($key+1)%2==0) {
                        $ord.=$mas."<br>";
                    }
                }
                $ord.="</td><td>".$m[phone]."</td><td>".$m[dest]."</td><td>";
                if($m[client]=='1') $ord.="оплачено полностью";
                elseif($m[client]=='0') $ord.="оплата после доставки";  
                $ord.="</td><td>";
                if($m[making]=='0') {
                    $ord.="<select name='orderID[$k][making]'><option value='0' selected>новый заказ</option><option value='1'>собирается</option><option value='2'>отправлен</option><option value='3'>выполнен</option></select>";
                } elseif($m[making]=='1') {
                    $ord.="<select name='orderID[$k][making]'><option value='0'>новый заказ</option><option value='1' selected>собирается</option><option value='2'>отправлен</option><option value='3'>выполнен</option></select>";
                } elseif($m[making]=='2') {
                    $ord.="<select name='orderID[$k][making]'><option value='0'>новый заказ</option><option value='1'>собирается</option><option value='2' selected>отправлен</option><option value='3'>выполнен</option></select>";
                } elseif($m[making]=='3') {
                    $ord.="<select name='orderID[$k][making]'><option value='0'>новый заказ</option><option value='1'>собирается</option><option value='2'>отправлен</option><option value='3' selected>выполнен</option></select>";
                }
                $ord.="</td></tr></table>";
                echo $ord;
            }
            echo "<input type='hidden' name='clicktime' value='".time()."'><input type='submit' value='сохранить изменения'></form>";
        }
    }
}


//Функция для внесения изменений в заказы
function correctOrder($connect) {
    if(isset($_POST[orderID])) {
        foreach($_POST[orderID] as $k => $m) {
            if(mysqli_num_rows(mysqli_query($connect,"SELECT * FROM orders where id='$m[id]' and clicktime='$_POST[clicktime]'"))==0) {
                switch ($m[making]) {
                    case 0:
                        echo "Заказ $m[id] только пуступил, ещё не начат обрабатываться<br/>";break;
                    case 1:
                        echo "Заказ $m[id] комплектуется для отправки<br/>";break;
                    case 2:
                        echo "Заказ $m[id] отправлен покупателю<br/>";break;
                    case 3:
                        echo "Заказ $m[id] выполнен<br/>";break;
                }
            mysqli_query($connect,"UPDATE orders SET making='$m[making]',clicktime='$_POST[clicktime]' where id='$m[id]'");
            }
        }
    }
    echo '<a href="?user" class="Go-to">Вернуться в кабинет</a>';
}


//Функция для правой колонки
function buildRightCol($page,$pUser,$connect) {
    usEnter($connect);
    
    if(isset($_SESSION[login]) && isset($pUser)) {
        $imName=mysqli_fetch_assoc(mysqli_query($connect,"SELECT avatar FROM users where login='$_SESSION[login]'"))[avatar];
        $tel=mysqli_fetch_assoc(mysqli_query($connect,"SELECT phone FROM users where login='$_SESSION[login]'"))[phone];
        echo "<img src='files/avatar/$imName'><p>Ваша аватарка</p>";
        echo"<p>Ваш логин: $_SESSION[login]</p><p>Ваш пароль: $_SESSION[pass]</p><p>Ваш телефон: $tel</p>";
        
        echo '<br/><form action="index.php" method="post"><input type="hidden" name="exit" value="exit"><input type="submit" value="Выйти"></form>';
        
        $avForm='<hr><p>Загрузите аватарку.</p><form action="#" method="POST" enctype="multipart/form-data" class="uploaF"><input type="hidden" name="clicktime" value="';
        $avForm.=time();
        $avForm.='"><input type="file" name="avaIm" accept="image/jpeg"><input type="hidden" name="sizeIm" value="50" required><input type="submit" value="Сохранить"></form>';
        echo $avForm;        
    } 
    if(isset($_SESSION[login])) {
        $adCom='<form action="index.php" method="POST" class="comForm"><input type="hidden" name="login" value="';
        $adCom.=$_SESSION[login];
        $adCom.='" required><input type="hidden" name="pass" value="';
        $adCom.=$_SESSION[pass];
        $adCom.='" required><p>Оставьте отзыв:</p><textarea name="comment" id="comtext" rows="10"></textarea><input type="hidden" name="clicktime" value="';
        $adCom.=time();
        $adCom.='"><input type="submit" value="Сохранить"></form>';        
        echo $adCom;
    } 
    if(!isset($_SESSION[login])) {       
        echo '<form action="index.php" method="POST" class="comForm"><p>Ваш логин</p><input type="text" name="login" required><p>Ваш пароль</p><input type="password" name="pass" required><p>Введите номер телефона</p><input type="text" name="phone" placeholder="8(XXX)XXXXXXX" required><input type="submit" value="Войти"></form>';
    }    
    echo'<p>Отзывы покупателей:</p>';
    buildComment($connect);
}

//Функция для блока комментариев
function buildComment($connect) {
    $res=mysqli_query($connect,'SELECT * FROM comment order by id DESC');
     foreach($res as $k => $m) {
         if($k<5) {
             $imName=mysqli_fetch_assoc(mysqli_query($connect,"SELECT avatar FROM users where login='$m[login]'"))[avatar];
             $path='files/avatar/'.$imName;
             $size=filesize($path);
             $div='<div class="comment"><p class="loginN"><img src="files/avatar/';
             if($size==1) $div.='anon.jpg';
             else  $div.=$imName;
             $div.='">';
             $div.=$m[login];
             $div.=' <small>';
             $div.=dateRu($m[timepost]);
             $div.='</small></p><p>';
             $div.=$m[text];
             $div.='</p></div>';
             echo $div;
         } else break;
     }
}

//Функция для Войти/Зарегистрироваться
function usEnter ($connect) {
    $pass=strip_tags($_POST[pass]);
    $pass=md5($pass);
    
    if(isset($_POST[login])) {
        $res=mysqli_fetch_assoc(mysqli_query($connect,"SELECT login,pass FROM users where login='$_POST[login]'"));
        
        if($res[login]!=$_POST[login]) {
            $imName=mysqli_fetch_assoc(mysqli_query($connect,'SELECT max(id) FROM users'))['max(id)']+1;
            $imName=str_pad($imName, 4, "0", STR_PAD_LEFT);
            $imName.='.jpg';
            file_put_contents('files/avatar/'.$imName,'0');
            $logUser=strip_tags($_POST[login]);
            $_SESSION[login]=$_POST[login];
            $_SESSION[pass]=$_POST[pass];            
            mysqli_query($connect,"INSERT INTO users (login, pass, phone, avatar) VALUES ('$logUser','$pass','$_POST[phone]','$imName')");
            echo 'Вы зарегистрированы!<br><br>';
        } 
        elseif ($res[login]==$_POST[login] && $res[pass]==$pass) {
            $_SESSION[login]=$_POST[login];
            $_SESSION[pass]=$_POST[pass];
            echo 'Вы авторизованы!<br><br>';
        } 
        elseif ($res[login]==$_POST[login] && $res[pass]!=$pass) echo 'Для этого пользователя пароль другой!<br>';        
    }
}

//Функция для переименования месяца
function nameMonth($datime) {
    $allmonth=['1'=>' января ','2'=>' февраля ','3'=>' марта ','4'=>' апреля ','5'=>' мая ','6'=>' июня ','7'=>' июля ','8'=>' августа ','9'=>' сетября ','10'=>' октября ','11'=>' ноября ','12'=>' декабря '];
    return $month=$allmonth[$datime];
}

//Функция для вывода даты
function dateRu($datime) {
    $t1=date('j',$datime);    
    $t2=nameMonth(date('n',$datime));
    $t3=date('Y года G:i',$datime);
    $timepost=$t1.$t2.$t3;
    return $timepost;
}

?>