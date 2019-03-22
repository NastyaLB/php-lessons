<?
    if($_SESSION[login]) $prof = '?profile='.$_SESSION[login];
    else $prof = '?profile';
?>
<div class="container">
<div class="header">
        <div class="logo"><a href="index.php">f<span class="up">i</span> les|pload</a></div> 
        <ul>
            <li><a href="index.php">главная</a></li>
            <li><a href="index.php">каталог</a>
            <ul>
               <?
                $res=mysqli_query($connect,"SELECT * FROM goods");
                for($i=0;$i<8,$i<=$res_i;$i=$i){
                foreach($res as $key) {
                    echo "<li><a href='?item=S".$key['id']."'>".$key['name']."</a></li>";
                    $i++;
                }}
                ?>
            </ul>
            </li>
            <li><a href="<?echo $prof;?>">профиль</a></li>
        </ul>
        <div class="st"></div>
</div>