<div class="post" style="height:80px;">
    <div class="details">
        <h2><a href="#">Archive</a></h2>
        <p class="info"><?echo $posted.' at year '.$fileyear;?><a href="index.php?page=general"> Решение примеров по этой ссылке</a></p>

    </div>
</div>
<div class="cols">	
<?
    foreach ($titles['1']['inpages'] as $arkey => $arvalue) {
        require($arvalue);
    }
?>
</div>
