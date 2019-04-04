<?

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ShoeShop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="contain">
        <div class="header">
            <div class="headerUp"></div>
            <div class="linemenu"></div>
           <div class="logo"><a href="index.php">ShoeShop</a></div>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="?item=S">Каталог</a>
                </li>
                <li><a href="index.php#special">Акции</a></li>
                <li><a href="?cabinet">Кабинет</a><div class="basIn"><? include_once('views/insert.php'); ?></div></li>
            </ul>
        </div>
        
        <div class="main">