<div class="wide">
<?  
    $page = $_GET['item']; 

    
    $res=mysqli_query($connect,"SELECT * FROM goods");
    foreach($res as $key) {
        $pageS='S'.$key['id'];
        if($pageS==$page) {
            
            $pItem="<a href='files/";
            $pItem.=$key['image'];
            $pItem.="' target='_blank'><img src='files/";
            $pItem.=$key['image'];
            $pItem.="' alt='";
            $pItem.=$key['name'];
            $pItem.="'></a><div class='goodtitle'><h1>";
            $pItem.=$key['name'];
            $pItem.="</h1><form action=''><h3>";
            $pItem.=$key['price'];
            $pItem.="&nbsp;</h3><input type='submit' value='Купить'></form></div><h3>Характеристики</h3><ul>";
            $pItem.=$key['charact'];
            $pItem.="</ul><hr><h3>Описание</h3><p>";
            $pItem.=$key['desript'];
            $pItem.="</p></div>";
            
            echo $pItem;
        }
    }
/*
    $rr=scandir("files/fImage/");
    foreach($rr as $iKey => $nameIM) {
        $kk=$iKey-1;
        if($kk>=1 && $page == $kk) {
           /*
            $res6=mysqli_query($connect,"UPDATE images set views=views+1 where name='$nameIM'");
          
            $res7=mysqli_query($connect,"SELECT VIEWS FROM images where name='$nameIM'");
            $yy=mysqli_fetch_assoc($res7);
            echo '<div class="image_profile"><div></div><div class="imagecenter"><a href="index.php">вернуться на главную</a><img src="files/fImage/'.$nameIM.'" alt="image'.$kk.'"><h3>просмотров:'.$yy[VIEWS].'</h3></div><div></div>';}
    }
    echo '</div>';*/
?>
<?
/*if(!isset($_FILES['photo']['tmp_name']) && !isset($page)) 
        echo '<p>Вы не добавили ни одного файла</p>'; 
    else {
        for($i=0;$i<count($_FILES['photo']['name']);$i++) {
        $path = "files/fImage/".$_FILES['photo']['name'][$i];
        $pathumb = "files/thumb/".$_FILES['photo']['name'][$i];
        move_uploaded_file($_FILES['photo']['tmp_name'][$i],$path);
        thumbmake($path, $pathumb);
        }
    }*/
?>