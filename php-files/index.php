<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Files|pload</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?    
    include('templates/header.php');    
    include('templates/form.php');      
    
    echo '<div>';
    
	if(!isset($_FILES['photo']['tmp_name'])) 
        echo '<p>Вы не добавили ни одного файла</p>';
    else {
	   for($i=0;$i<count($_FILES['photo']['name']);$i++) {
		  $path = "files/".$_FILES['photo']['name'][$i];
		  $pathumb = "files/thumb/".$_FILES['photo']['name'][$i];
		  move_uploaded_file($_FILES['photo']['tmp_name'][$i],$path);
       }
        
    }
    echo '</div>';
    include('templates/gallery.php');
    include('templates/footer.php');
    ?>
</body>
</html>