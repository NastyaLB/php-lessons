<div class="catalog">
    <?
    
    
    $page = $_GET['item']; 
    $pUser = $_GET['cabinet']; 
    $pOrder = $_GET['order']; 
    
   
    if(!isset($pOrder) && !isset($page) || isset($pUser)) {
        include_once('views/greet.php');
    }
    if(!isset($pUser) && !isset($page) && !isset($pOrder) || $page==S) {
        include_once('views/gallery.php');
        include_once('views/special.php');
    }
    if($page!=S && isset($page)) {
        include_once('views/item.php');
        include_once('views/gallery.php');
    }
    if(isset($pUser)) {
        include_once('views/cabinet.php');
    } 
    if(isset($pOrder) && $pOrder!='Admin') {
        include_once('views/order.php');
    } elseif(isset($pOrder) && $pOrder=='Admin') {        
        include_once('views/admin.php');
    }  
    ?>
</div>