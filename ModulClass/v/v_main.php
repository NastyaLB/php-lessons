<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
include('config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <title>
        <?=$title?>
    </title>
    <meta content="text/html; charset=Windows-1251" http-equiv="content-type">
    <link rel="stylesheet" type="text/css" media="screen" href="v/style.css" />
    <script src="m/jquery.js"></script> 
    <script src="m/cart.js"></script>
    <script src="m/adminJS.js"></script>
</head>

<body>
    <div id="header">
        <h1><a href="index.php" id="logA">
                <?=$title?></a></h1>
    </div>

    <div id="menu">
        <div>
            <a href="index.php">Читать текст</a><span> | </span> 
            <a href="index.php?c=page&act=edit">Редактировать текст</a>
        </div>
        <div class="menu1">
            <a href="<?=$userlink['link'][0]?>"><?=$userlink[linktext][0]?></a>
            <a href="<?=$userlink['link'][1]?>"><?=$userlink[linktext][1]?></a>
        </div>
    </div>

    <div id="content">
        <?=$content?>
        <?=build_view($goods)?> 
    </div>
    <div class="gallery">
        <?=build_gallery($goods)?>       
    </div>

    <div id="footer">
        Все права защищены. Адрес. Телефон.
    </div>
</body>

</html>
