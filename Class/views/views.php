<script src="jquery.js"></script>
<script src="js/main.js"></script>
    
<?

// ПОЛУЧЕНИЕ  АДРЕСА  СТРАНИЦЫ
$foto = (int)$_GET['foto']; 

// ПОЛУЧЕНИЕ ДАННЫХ из БД
try {
  $dbh = new PDO('mysql:dbname=lesson2-2;host=localhost', 'root', '');
} catch (PDOException $e) {
  echo "Error: Could not connect.<br>" /*. $e->getMessage()*/;
}
            // установка error режима
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // использовано для заполнения базы данных
            try {
                // формируем SELECT запрос
                // в результате каждая строка таблицы будет объектом
                $sql = "SELECT * from foto";
                $sth = $dbh->query($sql);
                while ($row = $sth->fetchObject()) {
                    $data[] = $row;
                }
                // закрываем соединение
                unset($dbh);
                } catch (Exception $e) { die ('ERROR: ' . $e->getMessage());}


// ФОРМИРОВАНИЕ ШАПКИ
try {
  // указываем где хранятся шаблоны-инициализируем Twig-подгружаем шаблон
  $loader = new Twig_Loader_Filesystem('templates'); 
  $twig = new Twig_Environment($loader);
  $template = $twig->loadTemplate('header.tmpl');
    
    for($i=1;$i<=8;$i++) {
        $carr='link'.$i;
        $conarr[$carr]='?foto='.$i;
    }
    for($i=1;$i<=8;$i++) {
        $carr='foto'.$i;
        $conarr[$carr]='Фрагмент №'.$i;
    }  
  $content = $template->render($conarr);    
  echo $content;  
} catch (Exception $e) {
  echo ('ERROR: ' . $e->getMessage());
}


// ФОРМИРОВАНИЕ  СТРАНИЦЫ  ГАЛЕРЕИ
if(!isset($_GET['foto'])) {
    
    try {
        $loader = new Twig_Loader_Filesystem('templates');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('gallery.tmpl');
        
        $datac=count($data);
        foreach($data as $key => $mas) {
            $arrayGallery[gallery][$key+1][1]='?foto=';
            $arrayGallery[gallery][$key+1][1].=$mas->id;
            $arrayGallery[gallery][$key+1][2]=$mas->fotoname;
            $arrayGallery[gallery][$key+1][3]=$arrayGallery[gallery][$key+1][1];
            $arrayGallery[gallery][$key+1][4]='Фрагмент №';
            $arrayGallery[gallery][$key+1][4].=$mas->id;
        }
        
        $content = $template->render($arrayGallery);
        echo $content;
    } catch (Exception $e) {    echo ('ERROR: ' . $e->getMessage());    }
} 


// ФОРМИРОВАНИЕ  СТРАНИЦЫ  ФОТО
elseif(isset($_GET['foto']) && $foto!=0) { 
    try {
        $loader = new Twig_Loader_Filesystem('templates');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('foto.tmpl');
        
        $dataIn=$data[$foto-1];
        
        $content = $template->render(array(
            'title'=>'Фрагмент №'.$dataIn->id,
            'img'=>'files/full/'.$dataIn->fotoname,
        ));
        
        echo $content;
    } catch (Exception $e) {    echo ('ERROR: ' . $e->getMessage());    }
} else {
    try {
        $loader = new Twig_Loader_Filesystem('templates');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('foto.tmpl');
        
        $nFoto=str_pad($foto, 4, "0", STR_PAD_LEFT);
        
        $content = $template->render(array(
            'title'=>'Нет такого фрагмента',
        ));
        
        echo $content;
    } catch (Exception $e) {    echo ('ERROR: ' . $e->getMessage()); }
} 

include_once('templates/footer.tmpl');