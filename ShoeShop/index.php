<?  
    session_start();
    date_default_timezone_set('Europe/Samara');
    

    
    include_once "controllers.php";


    
    $q="admin";
    //$q="0";

    include_once('views/header.php');
    include_once('views/basketleftcolumn.php');
    include_once('views/main.php');
    include_once('views/rightcolumn.php');
    include_once('views/footer.php');?>