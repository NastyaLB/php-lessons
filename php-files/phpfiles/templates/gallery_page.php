<div class="gallery">
    <? 
        include 'config/config.php';
    
        $images = scandir('files/fImage');
    
        /*function viewsr($a, $b) {*/
            foreach($images as $key => $file) {
                $res3=mysqli_query($connect,"SELECT views FROM images where name='$file'");
                $yy=mysqli_fetch_assoc($res3);
                $a=$yy[views];  
                if($key>1) {   
                $a=$a.$key;
                $imagesviews[$a]=$file;
                $b=$key-1;
                $imagespath[$a]=$b;
                }
            }   krsort($imagesviews);
                krsort($imagespath);
    
        foreach($imagesviews as $key => $file) {
            
            $res3=mysqli_query($connect,"SELECT * FROM images where name=$file");
            
            $linkIM='<div class="img"><a href="?image=';
            $linkIM.=$imagespath[$key];
            $linkIM.='" "><img src="files/thumb/';
            $linkIM.=$file;
            $linkIM.='" alt="';
            $linkIM.=$file;
            $linkIM.='"></a><div class="success">';
            
            $res=mysqli_query($connect,"SELECT VIEWS FROM images where name='$file'");
            $yy=mysqli_fetch_assoc($res);
            
            $linkIM.='Просмотров: '.$yy[VIEWS].'</div></div>';
            echo $linkIM;            
        }
    ?>
</div>
