<?  
    $page = $_GET['image']; 

    $rr=scandir("files/fImage/");
    foreach($rr as $iKey => $nameIM) {
        $kk=$iKey-1;
        if($kk>=1 && $page == $kk) {
           
            $res6=mysqli_query($connect,"UPDATE images set views=views+1 where name='$nameIM'");
          
            $res7=mysqli_query($connect,"SELECT VIEWS FROM images where name='$nameIM'");
            $yy=mysqli_fetch_assoc($res7);
            echo '<div class="image_profile"><div></div><div class="imagecenter"><a href="index.php">вернуться на главную</a><img src="files/fImage/'.$nameIM.'" alt="image'.$kk.'"><h3>просмотров:'.$yy[VIEWS].'</h3></div><div></div>';}
    }
    echo '</div>';
?>