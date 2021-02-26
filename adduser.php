<?php
include('session.php'); // Includes Login Script
if(isset($_POST['adduser']))
{
	$uname=$_POST['uid'];
	$alias=$_POST['aid'];
	$ps="default";
	$des=$_POST['incharge'];
	require_once'sql.php';
			$r=mysqli_query($con,"INSERT INTO `login`(`userid`, `password`, `Designation`,`verify`,`alias`) 
			VALUES ('$uname','$ps','$des','1','$alias')");
if($r)
	{
		header("location: mainpage.php?add=1"); // Redirecting To Other Page
	}
	else
	{
	    header("location: mainpage.php?erradd=1"); // Redirecting To Other Page
	}
}
?>