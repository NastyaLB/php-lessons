<?
//формирование корзины $_SESSION
if(isset($_POST[buyIt]) && $_SESSION[buycount]!=0 && !isset($_SESSION[buycount])) {
    $_SESSION[buycount][$_POST[buyIt]][clicktime]=$_POST[clicktime];
    $_SESSION[buycount][$_POST[buyIt]][buycount]=1;
} elseif(isset($_POST[buyIt]) && isset($_SESSION[buycount][$_POST[buyIt]]) && $_SESSION[buycount][$_POST[buyIt]][clicktime]!=$_POST[clicktime] ) {
    $n=$_POST[buyIt];
    $_SESSION[buycount][$n][clicktime]=$_POST[clicktime];
    $buycount=$_SESSION[buycount][$n][buycount]+1;
    $_SESSION[buycount][$n][buycount]=$buycount;
} elseif(isset($_POST[buyIt]) && !isset($_SESSION[buycount][$_POST[buyIt]])) {
    $n=$_POST[buyIt];
    $_SESSION[buycount][$n][clicktime]=$_POST[clicktime];
    $_SESSION[buycount][$n][buycount]=1;
    
} 
if(isset($_SESSION[buycount]) && $_SESSION[buycount]!=0 && count($_SESSION[buycount])!=0) {
    echo count($_SESSION[buycount]);
    $basket=$_SESSION[buycount];
}
?>