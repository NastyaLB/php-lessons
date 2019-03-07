<?
       if ($page == 'archive' || !isset($page)) {
        echo '<div class="col">';
    } elseif ($page == 'archive/page2') {
        echo '<div class="wider">';}
       echo'<h3><b>№2.</b> С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:</h3>';
       $i = 0;
       do {
           if($i==0) echo'<ul><li>'.$i++.' - это ноль.</li>';
           else {
               echo '<li>'.$i++.' – нечётное число.</li><li>'.$i++.' – чётное число.</li>';
           }
       } while ($i <= 10) ;
           
       echo '</ul>';  

        if ($page == 'archive' || !isset($page)) {
        echo '</p> <div class="readmore"><a href="index.php?page=archive/page2">read more</a></div></div>'; 
    } elseif ($page == 'archive/page2') {
        echo '</p></div>'; }
?>
