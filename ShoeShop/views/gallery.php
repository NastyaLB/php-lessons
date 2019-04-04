<div class="gallery">
    <?=buildGallery($page,$connect)?>
                      
    <div id="modal_form_ad">                        <!-- всплывающее oкнo -->
        <span id="modal_close">&#61453;</span>        <!-- кнoпкa закрытия всплявающего окна -->
        <form class="admItem" action="" method="post" enctype="multipart/form-data">
            <p>Изображение товара:</p>
            <input type="file" name="image" accept="image/jpeg" value="" required>
            <p>Название товара:</p>
            <input type="text" name="item" value="" required>
            <p>Цена товара:</p>
            <input type="text" name="price" value="" required>
            <p>Характеристики товара:</p>
            <textarea name="charact" id="charact" cols="30" rows="5" required></textarea>
            <p>Описание товара</p>
            <textarea name="descript" id="descript" cols="30" rows="14" required></textarea>
            <input type="hidden" name="clicktime" value="<?=time()?>">
            <input type="hidden" name="addItem" value="1">
            <p><input type="radio" name="status" value="1" checked>:опубликовать | <input type="radio" name="status" value="0">:не публиковать</p>
            <input type="submit" value="Загрузить">
        </form>
    </div>
    <div id="overlay"></div>                   <!-- тень за всплывающим окном -->
    <?
    adminItems($page,$connect);
    adminEnableItem($page,$connect);
    ?>
</div>