<?php
	if($_GET['file'])
	{
	$file=$_GET['file'];
    $basename = basename($file);
    header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"".$basename."\""); 

         readfile($file);
            die();
	}
?>