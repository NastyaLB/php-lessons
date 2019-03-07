<?
       if ($page == 'archive' || !isset($page)) {
        echo '<div class="col">';
    } elseif ($page == 'archive/page5') {
        echo '<div class="wider">';}
       echo '<h3><b>№5.</b> Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.</h3>' ;
       
       $underlining = [' '=>'_'];
       function underlining($phrase,$underlining) {
           return strtr($phrase,$underlining);
       }
       echo underlining("<p><b>Московская область:</b><br/>Москва, Зеленоград, Клин</p><p><b>Ленинградская область:</b><br/>Санкт-Петербург, Всеволожск, Павловск, Кронштадт</p><p><b>Рязанская область:</b><br/>Рязань, Касимов, Сасово</p><p><b>Тверская область:</b><br/>Тверь, Торжок, Вышний Волочок, Ржев</p>",$underlining); 

       
        if ($page == 'archive' || !isset($page)) {
        echo '</p> <div class="readmore"><a href="index.php?page=archive/page5">read more</a></div></div>'; 
    } elseif ($page == 'archive/page5') {
        echo '</p></div>'; }
?>