<script>
    function conv(){
        alert('Перезагрузите страницу, для отображения изменений');
    }
</script>
<h2>Корзина</h2>
<?
 
// Задание№1 создание корзины с возможностью удалять товары и менять их количество. Про JSON я так ничего и не поняла

$res=mysqli_query($connect,"SELECT * FROM orders where user='$_SESSION[login]'");
print_r($res);
if(isset($pUser)) {
    $res=mysqli_query($connect,"SELECT * FROM orders where user_name='$_SESSION[login]'");
    $bastable='<table class="basket"><tr><td class="b-t"></td><td class="b-t">название товара</td><td class="b-t">X</td><td class="b-t">кол-во</td><td class="b-t">цена<small>(и за шт)</small></td><td class="b-t">№заказ</td></tr>';
    foreach($res as $key) {
        $rew=mysqli_query($connect,"SELECT image FROM goods where name='$key[item]'");
        $rei=mysqli_query($connect,"SELECT id FROM goods where name='$key[item]'");
        $reclick=mysqli_query($connect,"SELECT clicktime FROM orders WHERE item='$key[item]' and user_name='$_SESSION[login]'");
        $click=mysqli_fetch_assoc($reclick)[clicktime];
        $rep=mysqli_query($connect,"SELECT price FROM goods where name='$key[item]'");
        $pricy=mysqli_fetch_assoc($rep)[price];
        $priceAll=$priceAll+($pricy*$key[summa]);
        
        $tc=$_POST[Lclicktime.$key[id]];
        if($_POST[lower.$key[id]]>0 && $tc!=0 && $click!=$tc ) {
            $ret=mysqli_query($connect,"UPDATE orders SET summa=summa-1,clicktime='$tc'  WHERE item='$key[item]' and user_name='$_SESSION[login]'");
        }   
        
        $tcl=$_POST[Uclicktime.$key[id]];
       if($_POST[upper.$key[id]]>0 && $tcl!=0 && $click!=$tcl ) {
            $ret=mysqli_query($connect,"UPDATE orders SET summa=summa+1,clicktime='$tcl' WHERE item='$key[item]' and user_name='$_SESSION[login]'");
        }
        
       if($_POST[delete.$key[id]]>0) {
            $ret=mysqli_query($connect,"DELETE FROM orders WHERE item='$key[item]' and user_name='$_SESSION[login]'");
        }
        if($key[summa]>0) {
            $bastable.='<tr><td><a href="?item=S';
        $bastable.=mysqli_fetch_assoc($rei)[id];
        $bastable.='" target="_blank"><img src="files/thumb/';
        $bastable.=mysqli_fetch_assoc($rew)[image];
        $bastable.='" alt="';
        $bastable.=$key[item];
        $bastable.='"></a></td><td>';
        $bastable.=$key[item];
        $bastable.='</td><td><form action="#" method="post"><input type="hidden" name="delete'.$key[id].'" value="1"><input type="submit" name="submit" value="X" onclick="conv()"></form></td><td><form style="position:relative; top:5px;" action="#" method="post"><input type="hidden" name="lower'.$key[id].'" value="1"><input type="hidden" name="Lclicktime'.$key[id].'" value="'.time().'"><input type="submit" name="submit" value="v" onclick="conv()"></form>';     
        $bastable.=$key[summa];
        $bastable.='<form style="position:relative; top:5px;" action="#" method="post"><input type="hidden" name="upper'.$key[id].'" value="1"><input type="hidden" name="Uclicktime'.$key[id].'" value="'.time().'"><input type="submit" name="submit" value="v"  onclick="conv()"style="transform: rotate(180deg);"></form></td><td>';
        $bastable.=($pricy*$key[summa]).'<small>('.$pricy;
        $bastable.=')</small></td><td>';
        $bastable.=$key[order_num];
        $bastable.='</td></tr>';
        } else $ret=mysqli_query($connect,"DELETE FROM orders WHERE item='$key[item]' and user_name='$_SESSION[login]'"); 
        
    }
    $bastable.='<tr><td colspan="4"></td><td>Итого: ';
    $bastable.=$priceAll;
    $bastable.=' р.</td><td><form action="#" method="post"><input type="hidden" name="deleteAll" value="1"><input type="submit" name="submit" value="X" onclick="conv()"></form></td></tr>';
    if($_POST[deleteAll]>0) {
            $ret=mysqli_query($connect,"DELETE FROM orders WHERE user_name='$_SESSION[login]'");
        }
    $bastable.='</table>';
    echo $bastable;    
} 
?> 