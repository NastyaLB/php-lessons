<?php
function text_get()
{
	return file_get_contents('data/text.txt');
}

function text_set($text)
{
	file_put_contents('data/text.txt', $text);
}

function log_a_get() {
    if(isset($_SESSION[username])) {
        $form='Wellcome, '.$_SESSION[username].'!';
        $form.='<form method="post"><input type="hidden" name="logout" value="logout"><input type="submit" value="Logout"></form>';
        $link='index.php?u=page&act=cabinet';
        $linktext='My Cabinet/Logout';
    } else{
        $link='index.php?u=page&act=login';
        $linktext='My Cabinet/Login';
    }
    return $userlink=['form' => $form,'link' => $link,'linktext' => $linktext,];
}