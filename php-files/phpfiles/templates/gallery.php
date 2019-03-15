<?

    $page = $_GET['image']; 

    $rr=scandir("files/fImage/");
        
    if (!isset($page)) 
        include('templates/gallery_page.php');
    elseif (isset($page)) 
        include('templates/image.php');

    for($i=2;$i<count($rr);$i++){
        
        $getupIMn=$rr[$i];
        $res5=mysqli_query($connect,"SELECT COUNT(DISTINCT(id)) FROM images WHERE name='$getupIMn'");
        $yy=mysqli_fetch_assoc($res5);
        if( !$yy["COUNT(DISTINCT(id))"] ) {            
            $getupIMp='files/fImage/'.$getupIMn;
            $getupIM=getimagesize($getupIMp);
            $getupIMs=$getupIM[0].'x'.$getupIM[1];
            mysqli_query($connect,"INSERT into images (name,size,place) values ('$getupIMn','$getupIMs','$getupIMp')");
        }
    }
?>