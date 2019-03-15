<script src="jquery.js"></script>
<script>
    function f(id_image) {
        var id_size = "#size_"+id_image;       
        var size = $(id_size).val();
        $.ajax({
            method:"GET",
            url:"index.php",
            data:{id:id_image,p:size}
        })
        .done(function(answer) {
              alert('Успешно!');
              })
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
    
    $page = $_GET['image']; 
    
    include('templates/header.php');   
    
    include 'config/config.php';
    if(!isset($page))     include('templates/form.php'); 
    echo '<div>';
    
    function thumbmake($path, $pathumb) {
        list($iWidth, $iHeight, $iExtenOld) = getimagesize($path);
        $mime = explode("/",(getimagesize($path)['mime']))['1'];
        if($mime=='png'){
            $im = @imagecreatefrompng($path);
            if($iWidth<$iHeight){
                $im1 = imagescale($im, '180');
                $ycenter = (($iHeight/($iWidth/180))-180)/2;
                $im2 = imagecrop($im1, ['x' => 0, 'y' => $ycenter, 'width' => '180', 'height' => '180']);}
            else {
                $nWidth = $iWidth/($iHeight/180);
                $xcenter = ($nWidth-180)/2;
                $im1 = imagescale($im, $nWidth,'180');
                $im2 = imagecrop($im1, ['x' => $xcenter, 'y' => 0, 'width' => '180', 'height' => '180']);
            }
        imagepng($im2,$pathumb);}
        if($mime=='jpg' || $mime=='jpeg'){
            $im = @imagecreatefromjpeg($path);
            if($iWidth<$iHeight){
                $im1 = imagescale($im, '180');
                $ycenter = (($iHeight/($iWidth/180))-180)/2;
                $im2 = imagecrop($im1, ['x' => 0, 'y' => $ycenter, 'width' => '180', 'height' => '180']);}
            else {
                $nWidth = $iWidth/($iHeight/180);
                $xcenter = ($nWidth-180)/2;
                $im1 = imagescale($im, $nWidth,'180');
                $im2 = imagecrop($im1, ['x' => $xcenter, 'y' => 0, 'width' => '180', 'height' => '180']);
            }
        imagejpeg($im2,$pathumb);}
        
    }
    
	if(!isset($_FILES['photo']['tmp_name']) && !isset($page)) 
        echo '<p>Вы не добавили ни одного файла</p>'; 
    else {
        for($i=0;$i<count($_FILES['photo']['name']);$i++) {
        $path = "files/fImage/".$_FILES['photo']['name'][$i];
        $pathumb = "files/thumb/".$_FILES['photo']['name'][$i];
        move_uploaded_file($_FILES['photo']['tmp_name'][$i],$path);
        thumbmake($path, $pathumb);
        }
    }
    echo '</div>';
    include('templates/gallery.php'); 
    include('templates/footer.php');
    ?>
</body>
</html>