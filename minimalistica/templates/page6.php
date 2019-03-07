<?
       if ($page == 'archive' || !isset($page)) {
        echo '<div class="col">';
    } elseif ($page == 'archive/page6') {
        echo '<div class="wider">';} 
    echo '<h3><b>№6.</b> В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP.</h3><p>Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.</p>' ; 
    
    
        if ($page == 'archive' || !isset($page)) {
        echo '</p> <div class="readmore"><a href="index.php?page=archive/page6">read more</a></div></div>'; 
    } elseif ($page == 'archive/page6') {
        echo '</p></div>'; }
?>