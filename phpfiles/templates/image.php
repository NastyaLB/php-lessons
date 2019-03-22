<div class="wide">
<?  
    $page = $_GET['item']; 

    
    $res=mysqli_query($connect,"SELECT * FROM goods");
    foreach($res as $key) {
        $pageS='S'.$key['id'];
        if($pageS==$page) {
                        
            $pItem="<a href='files/";
            $pItem.=$key['image'];
            $pItem.="' target='_blank'><img src='files/";
            $pItem.=$key['image'];
            $pItem.="' alt='";
            $pItem.=$key['name'];
            $pItem.="'></a><div class='goodtitle'><h1>";
            $pItem.=$key['name'];
            $pItem.="</h1><form action='#' method='post'><h3>";
            $pItem.=$key['price'];
            $pItem.="&nbsp;</h3><input type='hidden' name='order' value='1'><input type='hidden' name='time' value='".time()."'><input type='submit' value='В корзину'></form></div><h3>Характеристики</h3><ul>";
            $pItem.=$key['charact'];
            $pItem.="</ul><hr><h3>Описание</h3><p>";
            $pItem.=$key['desript'];
            $pItem.="</p></div>";
            
            echo $pItem; break;
        }
    }
    
    $res=mysqli_query($connect,"SELECT order_num FROM orders where user_name='$_SESSION[login]'");
    $res2=mysqli_query($connect,"SELECT order_num,summa,clicktime FROM orders where item='$key[name]' and user_name='$_SESSION[login]'");
    $col=mysqli_fetch_assoc($res2);
    $click=$col[clicktime];
    if($_SESSION[login] && !mysqli_num_rows($res)) {
        $nomer = session_id();
        $nomer = mb_strimwidth($nomer,0,12);
        $sum=1;
        $ord=mysqli_query($connect,"INSERT INTO orders (order_num, user_name, item, summa, clicktime) VALUES ('$nomer','$_SESSION[login]','$key[name]','$sum','$_POST[time]')"); 
    } elseif (mysqli_num_rows($res2) && $_POST[time]!=0 && $_POST[time]!=$click) {
        $sum=$col[summa]+1;
        $ord=mysqli_query($connect,"UPDATE orders SET summa='$sum',clicktime='$_POST[time]' where item='$key[name]' and user_name='$_SESSION[login]'"); 
    }elseif (mysqli_num_rows($res) && $_POST[time]!=0 && $_POST[time]!=$click) {
        $col=mysqli_fetch_assoc($res);
        $sum=1;
        $ord=mysqli_query($connect,"INSERT INTO orders (order_num, user_name, item, summa, clicktime) VALUES ('$col[order_num]','$_SESSION[login]','$key[name]','$sum','$_POST[time]')"); 
    } 
?>