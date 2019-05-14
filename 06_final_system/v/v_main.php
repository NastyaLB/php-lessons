<?php
/**
 * ?????? ??????? ????????
 * ===============
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div id="header">
		<h1><a href="index.php" id="logA"><?=$title?></a></h1>
	</div>
	
	<div id="menu">
		<a href="index.php">Reed text</a> |
		<a href="index.php?c=page&act=edit">Redact text</a>
        <span style="float:right"><a href="<?=$userlink['link']?>"><?=$userlink[linktext]?></a></span>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		All rights reserved. Adress. Phone-number.
    </div>
</body>
</html>
