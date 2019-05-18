<?php
/**
 * Шаблон редактора
 * ================
 * $text - текст статьи
 */
?>

<form class="textwide" method="post">
	<textarea name="text"><?=$text?></textarea>
	<br/>
	<input type="submit" value="Save" />
</form>