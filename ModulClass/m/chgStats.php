<?php
session_start();

$iDem = $_POST[iDem];
$iValue = $_POST[iValue];
$connect= mysqli_connect("localhost","root","","les2-6");

if(isset($_POST[iDem])) {
    mysqli_query($connect,"UPDATE orders SET id_ordrstatus='$iValue' WHERE id_order='$iDem'");
    $_SESSION[usArr][$iDem][ordrstatus]=$iValue;
    echo '1';
}
?>