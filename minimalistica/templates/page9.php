<?
       if ($page == 'archive' || !isset($page)) {
        echo '<div class="col">';
    } elseif ($page == 'archive/page9') {
        echo '<div class="wider">';} 
    echo '<h3><b>№9.</b> Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания.</h3><p>Аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах.</p>' ; 

        $trans = ['а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'zh', 'з'=>'z', 'и'=>'i', 'й'=>'y', 'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'u', 'ф'=>'f', 'х'=>'h', 'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sch', 'ъ'=>"\'", 'ы'=>'eu', 'ь'=>'<small style="color:#AAAAAA">i</small>', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'А'=>'A', 'Б'=>'B', 'В'=>'V', 'Г'=>'G', 'Д'=>'D', 'Е'=>'E', 'Ё'=>'YO', 'Ж'=>'ZH', 'З'=>'Z', 'И'=>'I', 'Й'=>'Y', 'К'=>'K', 'Л'=>'L', 'М'=>'M', 'Н'=>'N', 'О'=>'O', 'П'=>'P', 'Р'=>'R', 'С'=>'S', 'Т'=>'T', 'У'=>'U', 'Ф'=>'F', 'Х'=>'H', 'Ц'=>'C', 'Ч'=>'CH', 'Ш'=>'SH', 'Щ'=>'SCH', 'Ъ'=>"\'", 'Ы'=>'EU', 'Ь'=>'<SMALL style="color:#AAAAAA">i</SMALL>', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA'];
        $trans9 = $trans;
        $trans9[' '] = '_';
       function transliter9($phrase,$trans9) {
           return strtr($phrase,$trans9);
       }
       echo transliter9("<p><b>Московская область:</b><br/>Москва, Зеленоград, Клин</p><p><b>Ленинградская область:</b><br/>Санкт-Петербург, Всеволожск, Павловск, Кронштадт</p><p><b>Рязанская область:</b><br/>Рязань, Касимов, Сасово</p><p><b>Тверская область:</b><br/>Тверь, Торжок, Вышний Волочок, Ржев</p>",$trans9);

        if ($page == 'archive' || !isset($page)) {
        echo '</p> <div class="readmore"><a href="index.php?page=archive/page9">read more</a></div></div>'; 
    } elseif ($page == 'archive/page9') {
        echo '</p></div>'; }
?>
