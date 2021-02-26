<?php
include('session.php'); // Includes Login Script
if(isset($_POST['course_submit']))
{
	$coursename=$_POST['coursename'];
	$courseid=$_POST['courseid'];
	$semesterno=$_POST['semno'];
	$type=$_POST['semtype'];
	$coursetype=$_POST['coursetype'];
	echo $coursetype;
	require_once'sql.php';
	$query = "INSERT INTO `" . $coursetype . "` (`courseid`, `coursename`, `sem`, `semno`)VALUES ('".$courseid."','".$coursename."','".$type."','".$semesterno."')";
			$r=mysqli_query($con,$query);
		
	if($r)
	{
		header("location:form.php?update=1"); // Redirecting To Other Page
	}
	else
	{
		header("location:form.php?errupdate=1"); // Redirecting To Other Page
	}
}
?>