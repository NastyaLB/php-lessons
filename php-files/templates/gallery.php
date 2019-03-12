<div class="gallery">
   <?
        $images = scandir('files');
        $linken = '<div class="img"><a href="files/';
        $link2 = '" target="_blank"><img src="files/';
        $link3 = '" alt="';
        $link4 = '"></a><div class="success">';
        $linkex = '</div></div>';
    
        foreach($images as $key => $file) {
            if($key>1) echo $linken.$file.$link2.$file.$link3.$file.$link4.$file.$linkex;
        }
    ?>
</div>