<?
       if ($page == 'archive' || !isset($page)) {
        echo '<div class="col">';
    } elseif ($page == 'archive/page7') {
        echo '<div class="wider">';}  
    echo '<h3><b>№7.</b> Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. То есть выглядеть должно так:</h3><p>for (…){ // здесь пусто}.</p>' ; 
        
        
        for($chislo=0;$chislo<=9;$CHISLA[]=$chislo++){}
        echo $sLangString = implode(' | ', $CHISLA);   

        for($chislo=0;$chislo<=9;$cherta.=$chislo++.'|'){}
        echo "<p>$cherta</p>";

        if ($page == 'archive' || !isset($page)) {
        echo '</p> <div class="readmore"><a href="index.php?page=archive/page7">read more</a></div></div>'; 
    } elseif ($page == 'archive/page7') {
        echo '</p></div>'; }
?>