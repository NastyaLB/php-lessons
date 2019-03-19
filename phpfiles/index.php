<script src="jquery.js"></script>
<script>
    function math_f(id2,id3) {
        var im = "#math";
        var im2 = $(im).val();
        var im = "#given";
        var im3 = $(im).val();
        if(im2==im3) {
            alert('Верно');
        } else {            
            alert('Неверно');
        }
    }
    function math_m(id2,id3) {
        var im = "#mathm";
        var im2 = $(im).val();
        var im = "#givenm";
        var im3 = $(im).val();
        if(im2==im3) {
            alert('Верно');
        } else {            
            alert('Неверно');
        }
    }
    function math_p(id2,id3) {
        var im = "#mathp";
        var im2 = $(im).val();
        var im = "#givenp";
        var im3 = $(im).val();
        if(im2==im3) {
            alert('Верно');
        } else {            
            alert('Неверно');
        }
    }
    function math_d(id2,id3) {
        var im = "#mathd";
        var im2 = $(im).val();
        var im = "#givend";
        var im3 = $(im).val();
        if(im2==im3) {
            alert('Верно');
        } else {            
            alert('Неверно');
        }
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Files|pload</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?  
    
    include 'config/config.php';
    
    $page = $_GET['item']; 
    
    include('templates/header.php');  
    
    echo '<div class="contain"><div class="main">';
    
    include('templates/gallery.php'); 
    
    echo '</div>';    
    if(!isset($page))   
        include('templates/form.php'); 
    elseif($page=='admin') include('admin.php'); 
    echo '</div>';
    include('templates/footer.php');
    ?>
</body>
</html>