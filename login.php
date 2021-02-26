<?php
session_start(); // Starting Session
if(isset($_POST['submit_login']))
{
if (empty($_POST['uname']) || empty($_POST['psw']))
{
header("location: home.php?error-login=1"); 
}
else
{
// Define $username and $password
$username=$_POST['uname'];
$password=$_POST['psw'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require_once 'sql.php';
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query( $con,"select userid,password from login where password='$password' AND userid='$username'");
$rows = mysqli_num_rows($query);
while($row=mysqli_fetch_array($query))//while look to fetch the result and store in a array $row.  
        {  
			$last_login=$row[1];  
		}
if ($rows == 1) 
{
if($username=='c9999')
{
	$_SESSION['login_user']=$username;
header("location: mainpage.php"); // Redirecting To Other Page
}
else if($username!='c9999')
{
$_SESSION['login_user']=$username;
header("location: profile.php"); // Redirecting To Other Page
} 
}
else 
{
header("location:index.php?error-login=1"); // Redirecting To Other Page
}
mysqli_close($con); // Closing Connection
}
}
?>