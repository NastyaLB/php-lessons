<!-- Задание №5: добавление статей  -->

<div class="rightcol">
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <h3>Загрузите файл на&nbsp;сервер</h3><br>
        Название: <input type="text" name="name" style="width:213px;" required>
        <input type="file" name="image" accept="image/jpg,image/jpeg" required><br>
        Список характеристик:
        <textarea name="charact" id="charact" cols="38" rows="6" required><li></li></textarea><br/>
        Описание:
        <textarea name="descript" id="descript" cols="38" rows="12" required></textarea><br/>
        Цена: <input type="text" name="price" style="width:246px;" required>
        <input type="submit" value="Сохранить">
	
    </form>
    
    <?     
    $image=$_FILES[image][name];
    $name=$_POST[name];
    $charact=$_POST[charact];
    $descript=$_POST[descript];
    $price=(int)$_POST[price];
    if(!isset($_FILES[image][tmp_name]) && !isset($_POST[name]) && !isset($_POST[name]) && !isset($_POST[charact]) && !isset($_POST[descript]) && !isset($_POST[price])) 
        echo '<p>Статья не добавлена</p>'; 
    else {
        if(!mysqli_fetch_assoc( mysqli_query($connect,"SELECT * FROM GOODS where name='$name'") )) {
            $res=mysqli_query($connect,"INSERT INTO goods (name, image, charact, desript, price) VALUES ('$name','$image','$charact','$descript','$price')");
            echo 'Статья добавлена';              
        } 
    }
    
    ?>
    
</div>