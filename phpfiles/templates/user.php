<script>
    function eNt(id,ps) {
        var il = "#login";
        var il2 = $(il).val();
        var ip = "#pass";
        var ip2 = $(ip).val();
        alert("Ваш логин: "+il2+"\nВаш пароль: "+ip2);
        return ip2;
    }
</script>
<?

    // Задание№2 модуля личного кабинета

    if(!$_SESSION[login]) echo '<div class="rightcol"><p>Добро пожаловать!</p><form action="#" method="post"><p>Ваш логин</p><input type="text" id="login" name="login" value=""><p>Ваш пароль</p><input type="password" maxlenght="10" id="pass" name="pass" value=""><br/><button onclick="eNt()">Войти</button></form>';
    else echo '<div class="rightcol"><p>Добро пожаловать, '.$_SESSION[login].'!</p>';
    if(!$_SESSION[login]) {
        $login=strip_tags($_POST[login]);
        $pass=strip_tags($_POST[pass]);
    } else {
        $login=$pass='';
    }
    
    $res=mysqli_query($connect,"SELECT id FROM users where login='$login' and pass='$pass'");
    if(mysqli_num_rows($res)) {
        $_COOKIE[login]=$login;
        $_COOKIE[pass]=$pass;
        $_SESSION[login]=$login;
        $_SESSION[pass]=$pass;
        echo 'Вы авторизованы!<br><br>';
    } elseif (!mysqli_num_rows($res) && $login!='' && $pass!='') {
        mysqli_query($connect,"INSERT INTO users (login, pass) VALUES ('$login','$pass')");
        $_COOKIE[login]=$login;
        $_COOKIE[pass]=$pass;
        $_SESSION[login]=$login;
        $_SESSION[pass]=$pass;
        echo 'Вы зарегистрированы!<br><br>';
    } elseif ($_SESSION[login]) echo 'Вы авторизованы!<br><br>';
    else echo 'Вы не авторизованы!<br><br>';
    
    
    if($_SESSION[login] && $pUser) echo '<br/>Ваш логин: <b>'.$_SESSION[login].'</b><br/>Ваш пароль: <b>'.$_SESSION[pass].'</b><br/><br/>';
    if(!isset($pUser)) include('/templates/form.php');
           
?>