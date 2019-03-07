<?
       if ($page == 'archive' || !isset($page)) {
        echo '<div class="col">';
    } elseif ($page == 'archive/page1') {
        echo '<div class="wider">';}
        echo '<h3><b>№1.</b> С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.</h3>';
       $i = 0;
       echo '<p><b>Числа от 0 до 100,</b> которые делятся на три: ';
       while ($i <= 100) {
           if($i%3==0 && $i>0) {
               echo ' '.$i++.',';
           }
           $i++;
       }
        if ($page == 'archive' || !isset($page)) {
        echo '</p> <div class="readmore"><a href="index.php?page=archive/page1">read more</a></div></div>'; 
    } elseif ($page == 'archive/page1') {
        echo '</p></div>'; }
        
?>