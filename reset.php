<?php
include('session.php');
if(isset($_POST['reset']))
{
    require 'sql.php';
	$name=$_POST['resetid'];
    $result="delete  from preference where userid='".$name."' and year(preference.date)=year(NOW()) and sem='".$_SESSION['settime']."'";

if (mysqli_query($con,$result))
{
     $result="update login set ug=0,pg=0,pgopen=0,ugopen=0 where userid='".$name."'";
	if (mysqli_query($con,$result))
{
    $result="delete from request where userid='".$name."'";
     if (mysqli_query($con,$result))
{
 	header("location: mainpage.php?reset=1"); // Redirecting To Other Page
}
}
}
else
{
		header("location: mainpage.php?errorreset=1"); // Redirecting To Other Page
}   
}
?>