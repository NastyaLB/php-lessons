<?

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('views/header.tmpl');
  
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  
  $content = $template->render(array(
    /*'name' => 'Clark Kent',
    'username' => 'ckent',
    'password' => 'krypt0n1te',*/
  ));
  echo $content;
  
} catch (Exception $e) {
  echo ('ERROR: ' . $e->getMessage());
}

//include_once('views/header.php');
include_once('views/gallery.php');
include_once('views/foto.php');
include_once('views/footer.php');