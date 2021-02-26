<?php
session_start();// Starting Session
require_once 'sql.php';
if(!isset($_SESSION['login_user']))
{
header('Location:index.php'); // Redirecting To Home Page
}
// Storing Session
$user_check;
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($con,"select userid,verify,ugopen,ug,pg,pgopen from login where userid='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$_SESSION['ug']=$row['ug'];
$_SESSION['ugopen']=$row['ugopen'];
$_SESSION['pg']=$row['pg'];
$_SESSION['pgopen']=$row['pgopen'];
$login_session =$row['userid'];
$verify =$row['verify'];
$result = mysqli_query( $con,"select settime,publish,selectperiod from choosetime  where userid='c9999'");
$row = mysqli_fetch_array($result);
$_SESSION['settime']=$row[0];
$_SESSION['publish']=$row[1];
$_SESSION['setyear']=$row[2];
$_SESSION['verification']=$verify;
if(!isset($login_session))
{
header('Location:index.php'); // Redirecting To Home Page
}
?>