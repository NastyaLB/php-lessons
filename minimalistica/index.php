<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?
    
// установка временной зоны Москва
date_default_timezone_set('Europe/Samara');
// указание на путь к файлу, у которого будет отображаться дата
$filename = 'templates/general.php';
// переменная для года создания файла, который будет отображаться на странице
$fileyear = date("Y", filemtime($filename));
//расчёт прошедшего времени с момента создания файла, которое будет отображаться на странице
$now = time() - filemtime($filename) . '<br/>';
//формулировка отображения времени публикации файла на странице
if (date('Y', $now)>1970) { $posted = 'posted '.$number=(date('Y', $now)-1970).' years ago ';} elseif (date('n', $now)>1) { $posted = 'posted '.$number=(date('n', $now)-1).' monthes ago ';} elseif (date('W', $now)>1) { $posted = 'posted '.$number=(date('W', $now)-1).' weeks ago ';} elseif (date('j', $now)>1) { $posted = 'posted '.$number=(date('j', $now)-1).' days ago ';} elseif (date('G', $now)>=1) { $posted = 'posted '.date('G', $now).' hours '. date('i', $now).' minutes ago ';} elseif (date('G', $now)<1) { $posted = 'posted '. date('i', $now).' minutes ago ';}   
 
//архив с переменными, формирующими контент (h1 и title)
    $titles = [
        ['id'=>'1','name'=>'home','logo'=>'minimalistica','link'=>'/'],
        ['id'=>'2','name'=>'archive','logo'=>'minimalistica','link'=>'index.php?page=archive'],
        ['id'=>'3','name'=>'contact','logo'=>'minimalistica','link'=>'index.php?page=contact'], 
        ['id'=>'4','name'=>'general','logo'=>'minimalistica','link'=>'index.php?page=general'],        
    ];
    $page = $_GET['page'];
    $Year=date('Y');
?>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="author" content="Luka Cvrk (www.solucija.com)" />
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <title>
        <? echo $titles[0]['logo']; ?>
    </title>
</head>

<body>
    <div id="content">
        <h1><? echo $titles[0]['logo']; ?></h1>
        <ul id="menu">
            <li><a href="<? echo $titles[0]['link']; ?>"><? echo $titles[0]['name']; ?></a></li>
            <li><a href="<? echo $titles[1]['link']; ?>"><? echo $titles[1]['name']; ?></a></li>
            <li><a href="<? echo $titles[2]['link']; ?>"><? echo $titles[2]['name']; ?></a></li>
        </ul>
<? if (!isset($page)) {
        require('templates/main.php');
    } elseif ($page == 'archive') {
        require('templates/archive.php');
    } elseif ($page == 'contact') {
        require('templates/contact.php');
    } elseif ($page == 'general') {
        require('templates/general.php');
    }
?>
       
        <div id="footer">
            <p>Copyright &copy; <? echo $Year; ?> <em>minimalistica</em> &middot; Design: Luka Cvrk, <a href="http://www.solucija.com/" title="Free CSS Templates">Solucija</a></p>
        </div>
    </div>
</body>

</html>
