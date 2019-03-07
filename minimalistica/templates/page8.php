<?
       if ($page == 'archive' || !isset($page)) {
        echo '<div class="col">';
    } elseif ($page == 'archive/page8') {
        echo '<div class="wider">';} 
    echo '<h3><b>№8.</b> Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».</h3>' ; 

      $citys= [
           'Московская область'=> ['Москва','Зеленоград','Клин'],
           'Ленинградская область'=> ['Санкт-Петербург','Всеволожск','Павловск','Кронштадт'],
           'Рязанская область'=> ['Рязань','Касимов','Сасово'],   
           'Тверская область'=> ['Тверь','Торжок','Вышний Волочок','Ржев','Кимры'],        
       ];  
       foreach ($citys as $key => $value) {
           foreach ($value as $key_down => $value_down) {
               if($key_down==0 && mb_substr($value_down,0,1)=='К') 
                   echo "<p><b>$key:</b><br/>$value_down ";
               elseif($key_down==0 && mb_substr($value_down,0,1)!='К') 
                   echo "<p><b>$key:</b><br/>";
               elseif($key_down < (count($value)-1) && mb_substr($value_down,0,1)=='К') 
                   echo "$value_down ";
               elseif ($key_down = (count($value)-1) && mb_substr($value_down,0,1)=='К') 
                   echo "$value_down</p>"; 
           }
       }

        if ($page == 'archive' || !isset($page)) {
        echo '</p> <div class="readmore"><a href="index.php?page=archive/page8">read more</a></div></div>'; 
    } elseif ($page == 'archive/page8') {
        echo '</p></div>'; }
?>