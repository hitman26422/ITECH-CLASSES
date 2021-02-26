<?php
if(isset($_POST['unamer']))
{
    $uname=$_POST['unamer'];
    $des=$_POST['designation'];
    $ali=$_POST['aid'];
    require_once 'sql.php';
    $res=mysqli_query($con,"update login set designation='$des',alias='$ali' where userid='$uname'");
    if($res)
{	
	echo "success";
    }
else
{
	echo mysqli_error($con);
}
    
}
if(isset($_GET['settime']))
{
require_once 'sql.php';
$res=mysqli_query($con,"update login set ug=0,pg=0,ugopen=0,pgopen=0 where userid!=''");
$res1=mysqli_query($con,"update choosetime set publish=0");
if(($res)&&($res1))
{	
	echo "success";
}
else
{
	
}
    
}
if(isset($_POST['user']))
{
require_once 'sql.php';
$id=$_POST['user'];
$msg=$_POST['msg'];
$res=mysqli_query($con,"insert into request values('$id','$msg')");
if($res)
{	
	echo "success";
}
else
{
	
}
    
}


if(isset($_GET['year']))
{
require_once 'sql.php';
$res=mysqli_query($con,"update choosetime set selectperiod='".$_GET['year']."'");
if($res)
{	
	echo "success";
}
else
{
	
}
    
}



if(isset($_POST['settime']))
{
$name=$_POST['settime'];
if($name=="ODD")
		$name='EVEN';
else
$name='ODD';
require_once 'sql.php';
$res=mysqli_query($con,"update choosetime set settime='$name' where userid='c9999'");
if($res)
{	
	echo "success";
}
else
{
	
}
}
if(isset($_POST['publish']))
{
require_once 'sql.php';
$res=mysqli_query($con,"update choosetime set publish=1 where userid='c9999'");
if($res)
{	
	echo "success";
}
else
{
	
}
}
?>