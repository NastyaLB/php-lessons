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
        ['id'=>'2','name'=>'archive','logo'=>'minimalistica','link'=>'index.php?page=archive','inpages'=> ['page1'=>'templates/page1.php','page2'=>'templates/page2.php','page3'=>'templates/page3.php','page4'=>'templates/page4.php','page5'=>'templates/page5.php','page6'=>'templates/page6.php','page7'=>'templates/page7.php','page8'=>'templates/page8.php','page9'=>'templates/page9.php']
        ],
        ['id'=>'3','name'=>'contact','logo'=>'minimalistica','link'=>'index.php?page=contact'], 
        ['id'=>'4','name'=>'general','logo'=>'minimalistica','link'=>'index.php?page=general'], ['id'=>'page1','name'=>'archive/page1','logo'=>'minimalistica','link'=>'index.php?page=archive/page1'], ['id'=>'page2','name'=>'archive/page2','logo'=>'minimalistica','link'=>'index.php?page=archive/page2'], ['id'=>'page3','name'=>'archive/page3','logo'=>'minimalistica','link'=>'index.php?page=archive/page3'], ['id'=>'page4','name'=>'archive/page4','logo'=>'minimalistica','link'=>'index.php?page=archive/page4'], ['id'=>'page5','name'=>'archive/page5','logo'=>'minimalistica','link'=>'index.php?page=archive/page5'], ['id'=>'page6','name'=>'archive/page6','logo'=>'minimalistica','link'=>'index.php?page=archive/page6'], ['id'=>'page7','name'=>'archive/page7','logo'=>'minimalistica','link'=>'index.php?page=archive/page7'], ['id'=>'page8','name'=>'archive/page8','logo'=>'minimalistica','link'=>'index.php?page=archive/page8'], ['id'=>'page9','name'=>'archive/page9','logo'=>'minimalistica','link'=>'index.php?page=archive/page9'],        
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
        <div class="header">
            <div class="logo">
                <h1>
                    <? echo $titles[0]['logo']; ?>
                </h1>
            </div>

            <? 
    for ($id = 0; $id < 3; $id++) {
        if($id==0) {  echo '<ul class="menu"><li><a href="'.$titles[$id]['link'].'">'.$titles[$id]['name'].'</a></li>';}
        elseif($id!=1)  {  echo '<li><a href="'.$titles[$id]['link'].'">'.$titles[$id]['name'].'</a></li>';}        
        elseif($id==3)  {  echo '<li><a href="'.$titles[$id]['link'].'">'.$titles[$id]['name'].'</a></li></ul>';}        
        else {  
            echo '<li><a href="'.$titles[$id]['link'].'">'.$titles[$id]['name'].'</a><ul>'; 
            for ($idpage = 4; $idpage < 13; $idpage++) {
                echo '<li><a href="'.$titles[$idpage]['link'].'"> задача&nbsp№'.($idpage-3).'</a></li>';
            }
            echo'</ul></li>';
        }
    }

       
        
?>
        </div>
        <? 
    if (!isset($page)) {
        require('templates/main.php');
    } elseif ($page == 'archive') {
        require('templates/archive.php');
    } elseif ($page == 'archive/page1') {
        require('templates/page1.php');
    } elseif ($page == 'archive/page2') {
        require('templates/page2.php');
    } elseif ($page == 'archive/page3') {
        require('templates/page3.php');
    } elseif ($page == 'archive/page4') {
        require('templates/page4.php');
    } elseif ($page == 'archive/page5') {
        require('templates/page5.php');
    } elseif ($page == 'archive/page6') {
        require('templates/page6.php');
    } elseif ($page == 'archive/page7') {
        require('templates/page7.php');
    } elseif ($page == 'archive/page8') {
        require('templates/page8.php');
    } elseif ($page == 'archive/page9') {
        require('templates/page9.php');
    } elseif ($page == 'contact') {
        require('templates/contact.php');
    } elseif ($page == 'general') {
        require('templates/general.php');
    }
?>


        <div id="footer">
            <p>Copyright &copy;
                <? echo $Year; ?> <em>minimalistica</em> &middot; Design: Luka Cvrk, <a href="http://www.solucija.com/" title="Free CSS Templates">Solucija</a></p>
        </div>
    </div>
</body>

</html>
