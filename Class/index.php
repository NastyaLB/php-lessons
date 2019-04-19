<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Классы</title>
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <div class="content">
        <div class="header">
            Задание к уроку №1
        </div>
        <div class="main">
         <?
                class Item {
                    private $content;
                    private $Dend;
                    private $Dstart;
                    
                    function __construct($content) {
                        echo $this->getStart().$content.$this->getEnd();
                    }
                    
                    /*function setContent($content) {
                        $this->content = $content;
                    }*/
                    
                    function getStart() {
                        return $this->Dstart='<div class="item">';
                    }
                    
                    function getEnd() {
                        return $this->Dend='</div>';
                    }
                }  
            
                class ItemBlossom extends Item {
                    private $content;
                    private $Dend;
                    private $Dstart;
                    
                    function getStart() {
                        return $this->Dstart='<div class="item itBlossom">';
                    }
                    
                    function getEnd() {
                        return $this->Dend='<div class="blossom"><img src="files/blossom.png" alt=""></div></div>';
                    }
                }  
            
                    
            
            $dirtext=scandir('files/texts/');
            foreach($dirtext as $key => $mas) {
                if($key>1) {
                    $path=file_get_contents('files/texts/'.$mas);
                    $ter=explode('&&',$path);
                    $ter[1]=explode('$$',$ter[1]);
                    $ter1='';
                    foreach($ter[1] as $k => $m) {
                        $ter1.="<p>$m</p>";
                    }
                    $content="<h4>$ter[0]</h4>$ter1 $ter[2]<br>$ter[3]<br>";
                    if(!isset($ter[4])) $print=new Item($content);
                    else $print=new ItemBlossom($content);
                }
            }
            ?>
            <div class="clearfooter"></div>
        </div>
    </div>
    <div class="footer">
        All rights reserved &#169;
        <? echo date('Y',time()) ?>
    </div>
</body>

</html>
