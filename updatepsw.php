<?php
include('session.php'); // Includes Login Script
if(isset($_POST['chpass']))
{
	$old=$_POST['old'];
$new=$_POST['newps'];
require_once 'sql.php';
$ses_sql=mysqli_query($con,"select password from login where userid='$login_session'");
$row = mysqli_fetch_assoc($ses_sql);
$psw =$row['password'];
if($psw==$old)
{
$res=mysqli_query($con,"update login set password='$new',verify='0' where userid='$login_session'");
if($res)
{	
header('Location:profile.php?succ=1'); // Redirecting To Home Page
}
else
{
	header('Location:profile.php?errsucc=1'); // Redirecting To Home Page

}
}
else
{
	header('Location:profile.php?errinold=1'); // Redirecting To Home Page
}
}
?>