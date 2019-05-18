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
</head>

<body>
    <div id="header">
        <h1><a href="index.php" id="logA">
                <?=$title?></a></h1>
    </div>

    <div id="menu">
        <a href="index.php">Читать текст</a> |
        <a href="index.php?c=page&act=edit">Редактировать текст</a>
        <span style="float:right"><a href="<?=$userlink['link']?>">
                <?=$userlink[linktext]?></a></span>
    </div>

    <div id="content">
        <?=$content?>
        <?=build_view($goods)?> 
    </div>
    <div class="gallery">
        <?=build_gallery($goods)?>       
    </div>

    <div id="footer">
        Все права защищены. Адрес. Телефон. ||| Логин:Some. Пароль:SomeSome
    </div>
</body>

</html>
