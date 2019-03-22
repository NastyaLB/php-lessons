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
<div class="gallery">
<?
     /*  if($page!='admin') 
           echo '<div class="good-represent"><form action="#"><input type="file" accept="images/jpeg"><div class="success"><input type="submit" value="Загрузить"></div></form></div> ';*/
       
       
        include 'config/config.php';
       
       //задание №4: СТРАНИЦА КАТАЛОГА, формирующаяся автоматически
       
       $res2=mysqli_query($connect,"SELECT * FROM goods");
       foreach($res2 as $i){  
           $div='<div class="good-represent"><a href="?item=S';
           $div.=$i[id];
           $div.='"><img src="files/';
           $div.=$i[image];
           $div.='" alt="';
           $div.=$i[name];
           $div.='"><div class="success">';
           $div.=$i[name];
           $div.='</div></a></div>';
           echo $div;
       
       }
    ?>
</div>

<!-- 
           
       
    
   /*     $images = scandir('files/fImage');
        
        foreach($images as $key => $file) {
            if( $key>1 ){
                $res3=mysqli_query($connect,"SELECT * FROM images where name=$file");
                
                $linkIM='<div class="good-represent"><a href="?image=';
                $linkIM.=$key-1;
                $linkIM.='" "><img src="files/thumb/';
                $linkIM.=$file;
                $linkIM.='" alt="';
                $linkIM.=$file;
                $linkIM.='"><div class="success">';
                $res=mysqli_query($connect,"SELECT VIEWS FROM images where name='$file'");
                $yy=mysqli_fetch_assoc($res);
                $linkIM.='Просмотров: '.$yy[VIEWS].'</div></a></div>';
                echo $linkIM;    
            }
                    
        }*/ -->