
<form class="fOrder admItem admred" action="?cabinet" method="post">
  <p>Заказ: <?=$_POST[order]?></p>
  <input type="hidden" name="order" value="<?=$_POST[order]?>">
  <p>Телефон: 
  <input type="text" name="phone" value="<?
    $res=mysqli_fetch_assoc( mysqli_query( $connect,"SELECT phone FROM users where login='$_POST[user]'" ) )[phone];
      echo $res; ?>" required></p>
  <p>Адрес: 
  <input type="text" name="dest" required></p>
    <?=$ph="<input type='hidden' name='phone' value='$res'>"?>
    <p><small>
  <?
    foreach($basket as $k => $m) {
        $res=mysqli_fetch_assoc( mysqli_query( $connect,"SELECT item FROM goods where id='$k'" ) )[item];
        echo $res.' - '.$m[buycount].' шт<br/><input type="hidden" name="item[]" value="'.$k.'"><input type="hidden" name="item[]" value="'.$res.' - '.$m[buycount].' шт">';
    }
?> 
</small></p>
  <p>К оплате: <?=$_POST[total].
  "<input type='hidden' name='total' value='$_POST[total]'>"?> руб.</p>
  <input type="radio" name="buyway" value="1" checked>: по интернету | 
  <input type="radio" name="buyway" value="0">: после доставки  
  <p>Номер карты: 
  <input type="text" name="card" value="1134-5678-9638-1235" required></p>
  <input type="hidden" name="ordered" value="1">
  <input type="hidden" name="clicktime" value="<?=time()?>">
  <input type="submit" value="Оформить">
</form>