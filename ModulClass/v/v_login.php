<?php
/**
 * Шаблон входа в систему
 * ================
 * $text - текст статьи
 */
?>
<?=nl2br($text)?>
<form method="post">
<input type="text" name="userlogin" placeholder="login" required><br/>
<input type="password" name="password" required><br/>
<input type="submit" value="Войти" /><br/>
</form>
