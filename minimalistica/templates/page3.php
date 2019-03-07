<?
       if ($page == 'archive' || !isset($page)) {
        echo '<div class="col">';
    } elseif ($page == 'archive/page3') {
        echo '<div class="wider">';}
       echo '<h3><b>№3.</b> Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:</h3>' ;
       $citys= [
           'Московская область'=> ['Москва','Зеленоград','Клин'],
           'Ленинградская область'=> ['Санкт-Петербург','Всеволожск','Павловск','Кронштадт'],
           'Рязанская область'=> ['Рязань','Касимов','Сасово'],   
           'Тверская область'=> ['Тверь','Торжок','Вышний Волочок','Ржев','Кимры'],        
       ];
       foreach ($citys as $key => $value) {
           foreach ($value as $key_down => $value_down) {
               if($key_down==0) 
                   echo "<p><b>$key:</b><br/>$value_down, ";
               elseif($key_down < (count($value)-1)) 
                   echo "$value_down, ";
               else 
                   echo "$value_down</p>"; 
           }
       } 
        
        if ($page == 'archive' || !isset($page)) {
        echo '</p> <div class="readmore"><a href="index.php?page=archive/page3">read more</a></div></div>'; 
    } elseif ($page == 'archive/page6') {
        echo '</p></div>'; }
?>