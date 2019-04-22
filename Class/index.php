<?
include 'config.php';
include_once('views/amount0.php');
include_once('views/price0.php');
include_once('views/amount1.php');
include_once('views/price1.php');
include_once('views/amount2.php');
include_once('views/price2.php');
?>
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
            Задание к уроку №2
        </div><a href="fonts/fontawesome-webfont.eot"></a>
        <div class="main">
         <?
            //начало описания асбтрактного товара
            //наследуется вся верстка товара, кроме единиц измерения и формулы расчёта цены.
                abstract class Item {
                    private $content;
                    private $measure;
                    private $price;
                    private $id;
                    private $idder;
                    private $descript;
                    
                    function __construct($content,$txt,$amnt) {
                        $divIt='<div class="item"><h4>';
                        $divIt.=$content[product];
                        $divIt.='</h4><p>';
                        $divIt.=$this->getDescript($content);
                        $divIt.='</p><form action="" method="post"><input type="text" name="amount" value="';
                        $divIt.=$this->getMeasure($content,$txt);
                        $divIt.='"><input type="hidden" name="';
                        $divIt.=$this->getIdder($content);
                        $divIt.='" value="';
                        $divIt.=$this->getId($content);
                        $divIt.='"><input type="hidden" name="measure" value="';
                        $divIt.=$content[measure];
                        $divIt.='"><input type="hidden" name="price" value="';
                        $divIt.=$content[price];
                        $divIt.='"><input type="submit" value="&#61452;"></form><div class="priceBlock">';
                        $divIt.=$this->getPrice($content,$amnt);
                        $divIt.='</div></div>';
                        
                        
                        echo $divIt;
                    }
                    
                    function getStart() {   return $this->Dstart='<div class="item">';  }    
                    
                    function getContent($content) { return $this->$content=$content;    }    
                    
                    abstract function getId($content);     
                    
                    abstract function getIdder($content);    
                    
                    abstract function getDescript($content);     
                    
                    abstract function getMeasure($content,$txt);   
                    
                    abstract function getPrice($content,$amnt);
                    
                    function getEnd() { return $this->Dend='</div>';    }
                }
                 //конец описания абстрактного товара    
            
                trait GetIdDescript {
                    
                    function getIdder($content) {
                        return $this->idder = 'id';
                    } 
                    
                     function getId($content) {
                         return $this->id = $content[id]-1;
                     } 
                    
                     function getDescript($content) {
                         return $this->descript = $content[descript];
                     }  
                    
                }
                
            //класс для штучного товара. Цена за штуку и единица измерения - "штуки".
                 class Item1 extends Item {
                     use GetIdDescript ;
                     
                     function getMeasure($content,$txt1) {
                         if(!isset($txt1[$content[id]-1])) { 
                            return $this->measure = '1 шт';
                        } else return $this->measure = $txt1[$content[id]-1];
                     }                     
                          
                     function getPrice($content,$amnt1) {
                         if(isset($amnt1[$this->id])) return $this->price=$amnt1[$this->id]; 
                         else return $this->price=$content[price].' р';
                     }
                }
            
            //класс для весового товара. Цена за кг и единица измерения - "кг".
                 
                 class Item0 extends Item { 
                     use GetIdDescript ;
                     
                     function getMeasure($content,$txt0) {
                         if(!isset($txt0[$content[id]-1])) { 
                            return $this->measure='1 кг';
                        } else return $this->measure=$txt0[$content[id]-1];
                     }                     
                          
                     function getPrice($content,$amnt0) {
                         if(isset($amnt0[$this->id])) return $this->price=$amnt0[$this->id]; 
                         else return $this->price=$content[price].' р';
                     }
                }
                 
            
            //класс для цифрового товара, у него всё тоже, что и у штучного, но перед началом описания добавляется слово "ЭСКИЗ", цена вдвое ниже и единица измерения - эскиз и.
                 class Item2 extends Item1 {   
                    
                     function getIdder($content) {
                         return $this->idder = 'digit';
                     } 
                    
                     function getDescript($content) {
                         return $this->descript = '<b>ЭСКИЗ</b>/'.$content[descript];
                     }
                     
                     function getMeasure($content,$txt2) {
                         if(!isset($txt2[$content[id]-1])) { 
                            return $this->measure = '1 эскиз';
                        } else return $this->measure = $txt2[$content[id]-1];
                     }                     
                          
                     function getPrice($content,$amnt2) {
                         if(isset($amnt2[$this->id])) {
                             return $this->price=$amnt2[$this->id]; 
                         }
                         else {
                             $amnt=$content[price]/2;
                             $amnt.=' руб.';
                             return $this->price=$amnt;
                         }
                     }
                }
            
               $res=mysqli_query($connect,'SELECT*FROM goods');
                foreach($res as $k => $m) {
                    if($m[measure]==1) {
                        $a=new Item1($m,$txt1,$amnt1);
                        $a=new Item2($m,$txt2,$amnt2);
                    } elseif($m[measure]==0) {
                        $a=new Item0($m,$txt0,$amnt0);
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
