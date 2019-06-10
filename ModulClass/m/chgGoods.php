<?php
session_start();
$connect = mysqli_connect("localhost","root","","les2-6");

//Загрузка новых или изменение товаров в БД

$itID = $_POST[itID];
$itIDnum = str_replace('sbmt', '', $itID);
$itName = $_POST[itName];
$itPrice = $_POST[itPrice];
$itChar = $_POST[itChar];

if($_POST[itID] === 'newsbmt') {    
    $maxID = mysqli_fetch_assoc(mysqli_query($connect,"SELECT MAX(id_good) FROM goods"))['MAX(id_good)']+1;
    
    $sqlAdd = mysqli_query($connect,"INSERT INTO goods (good_name, price, id_category, charact, id_status) VALUES ('$itName','$itPrice','1','$itChar','1')");
    
    $_SESSION[goods][$maxID][good_name] = $itName;
    $_SESSION[goods][$maxID][price] = $itPrice;
    $_SESSION[goods][$maxID][charact] = $itChar;
    
    echo $maxID;
} elseif($_POST[itID] != 'newsbmt') {
    $sql = "UPDATE goods SET ";
    
    if($_SESSION[goods][$itIDnum][good_name] != $itName) {
        $sql .= "good_name='$itName'";
        $_SESSION[goods][$itIDnum][good_name] = $itName;
    }
    
    if($_SESSION[goods][$itIDnum][price] != $itPrice) {
        if($sql != 'UPDATE goods SET ') $sql .= ", price='$itPrice'";
        else $sql .= "price='$itPrice'";
        $_SESSION[goods][$itIDnum][price] = $itPrice;
    }
    
    if($_SESSION[goods][$itIDnum][charact] != $itChar) {
        if($sql != 'UPDATE goods SET ') $sql .= ", charact='$itChar'";
        else $sql .= "charact='$itChar'";
        $_SESSION[goods][$itIDnum][charact] = $itChar;
    }
    
    if($sql != "UPDATE goods SET ") {
        $sql .= " WHERE id_good='$itIDnum'";
        $tty=mysqli_query($connect,$sql);
    }
    echo $itIDnum.$sql;
}