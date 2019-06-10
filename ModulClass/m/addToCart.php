<?php
session_start();

$num = $_POST[itemId];

if($_POST[itemOperand] == 'plus') {
    $_SESSION[buyItem][$num][num] = $_SESSION[buyItem][$num][num] + 1;
    echo $_SESSION[buyItem][$num][num];
} elseif($_POST[itemOperand] == 'mnus' && $_SESSION[buyItem][$num][num] != 1) {
    $_SESSION[buyItem][$num][num] = $_SESSION[buyItem][$num][num] - 1;
    echo $_SESSION[buyItem][$num][num];
} elseif($_POST[itemOperand] == 'mnus' && $_SESSION[buyItem][$num][num] == 1) {
    unset($_SESSION[buyItem][$num]);
    echo 'delete';
}

?>