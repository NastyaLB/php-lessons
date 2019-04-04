
<?
if(isset($basket)) {
    echo '<h2><i>Ваши покупки</i></h2>';
    putInBasket($basket,$connect);
} 
echo '<h2><i>Просмотр заказов</i></h2>';
watchOrder($basket,$connect);
?>