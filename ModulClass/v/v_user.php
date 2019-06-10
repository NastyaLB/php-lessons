<?php
/**
 * Шаблон личного кабинета пользователя входа в систему
 * ================
 * $text - текст статьи
 */
?>

<p>Wellcome, <?=$_SESSION[userlogin]?>!</p>
<form method="post">
<input type="text" name="username" placeholder="username"><br/>
<input type="password" name="password"><br/>
<input type="submit" value="Login" /><br/>
</form>