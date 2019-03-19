<?
    $x=rand(0,10);
    $y=rand(0,10);
    $y1=rand(1,10);
    $masmath=['+','-','*','/'];
    $op=$masmath[rand(0,count($masmath))];
    $res=$x*$y;
?>
<div class="rightcol">
    <form action="#" method="POST" enctype="multipart/form-data">
	<h3>Введите&nbsp;логин</h3>
	<input type="text" name="fio" required><br/>
	<h3>Оставьте&nbsp;комментарий</h3>
	<textarea name="comment" id="comment" cols="38" rows="6" required></textarea><br/>
	<p>Для отправки, решите пример</p>
	
	<!-- Задание №1: создание калькулятора для контроля отправки формы  -->
	<!-- Задание №2: не совсем поняла про кнопку. Сделал вывод сообщения по кнопке о верности/неверности решения примера  -->
	
	<ul class="choice">
	    <li><a href="#" id="plus">+</a>
	    <ul><li><div><p>Вычислите:
        <?
            echo $x.' '.$masmath[0].' '.$y.' = ';
        ?> 
        <input type="hidden" name="givenp" id="givenp" value="<?=$x+$y?>"> 
        <input type="text" name="mathp" id="mathp">
        <button onclick='math_p("<?=$_POST['mathp']?>,<?=$_POST['givenp']?>")'>ОТВЕТ</button></p></div></li></ul>
	    </li>
	    <li><a href="#" id="minus">–</a>
	    <ul><li><div><p>Вычислите:         
        <?
            echo $x.' '.$masmath[1].' '.$y.' = ';
        ?>
        <input type="hidden" name="given" id="given" value="<?=$x-$y?>"> 
        <input type="text" name="math" id="math">
        <button onclick='math_f("<?=$_POST['math']?>,<?=$_POST['given']?>")'>ОТВЕТ</button></p></div></li></ul>
	    </li>
	    <li><a href="#" id="multi">x</a>
	    <ul><li><div><p>Вычислите:         
        <?
            echo $x.' '.$masmath[2].' '.$y.' = ';
        ?>
        <input type="hidden" name="givenm" id="givenm" value="<?=$x*$y?>"> 
        <input type="text" name="mathm" id="mathm">
        <button onclick='math_m("<?=$_POST['mathm']?>,<?=$_POST['givenm']?>")'>ОТВЕТ</button></p></div></li></ul>
	    </li>
	    <li><a href="#" id="divide">/</a>
	    <ul><li><div><p>Вычислите:         
        <?
            echo $x.' '.$masmath[3].' '.$y.' = ';
            if($y==0) $y++;
        ?>
        <input type="hidden" name="givend" id="givend" value="<?=round($x/$y,1)?>"> 
        <input type="text" name="mathd" id="mathd">
        <button onclick='math_d("<?=$_POST['mathd']?>,<?=$_POST['givend']?>")'>ОТВЕТ</button></p></div></li></ul>
	    </li>
	</ul>
    </form>    
    
	<!-- Задание №3: добавление комментариев  -->
    
<?  
    $res=mysqli_query($connect,"SELECT * FROM comments where text='$_POST[comment]'");
               
    if($_POST[mathp] && $_POST[mathp]==$_POST[givenp])  $xAns=1;
    elseif($_POST[math]&& $_POST[math]==$_POST[given])  $xAns=1;
    elseif($_POST[mathm]&& $_POST[mathm]==$_POST[givenm])  $xAns=1;
    elseif($_POST[mathd]&& $_POST[mathd]==$_POST[givend])  $xAns=1;
    else  $xAns=0;
               
    if(!mysqli_fetch_assoc($res) && $xAns==1) {
        mysqli_query($connect,"INSERT INTO comments (login, text) VALUES ('$_POST[fio]','$_POST[comment]')");
        echo 'Комментарий опубликован!<br/>';
    } elseif($xAns==0) echo 'Задачка не решена.<br/>Комментарий не опубликован!<br/>';
      else echo 'Добавьте свой комментарий!<br/>';
    
    $res=mysqli_query($connect,"SELECT * FROM comments");
    foreach($res as $key)     {
        $com='<div class="comment"><h3>';
        $com.=$key[login];
        $com.='</h3><p>';
        $com.=$key[text];
        $com.='</p><p><small>';
        $com.=$key[time];
        $com.='</small></p></div>';
        echo $com;
    }      
?>
