<?php
$itID = $_POST['photoName'];
$pathfrom = $_FILES['photo']['tmp_name'];
$path = '../data/files/Plush-'.$itID.'.jpg';
if (move_uploaded_file( $pathfrom , $path )) echo $path;