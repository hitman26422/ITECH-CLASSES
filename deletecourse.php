<?php
include('session.php'); // Includes Login Script
if($_GET["cid"])
{
$course=$_GET["course"];
$courseid=$_GET["cid"];
$dupl="D".$courseid;
require_once 'sql.php';  
$run=mysqli_query($con,"update $course set sem='Declined',courseid='".$dupl."' WHERE courseid='".$courseid."'");  
$run1=mysqli_query($con,"update preference set courseid='".$dupl."' WHERE courseid='".$courseid."'");  
$run2=mysqli_query($con,"update allotment set courseid='".$dupl."' WHERE courseid='".$courseid."'");  
  if($run&&$run1&&$run2)
	{
		header("location: table.php?delete=1"); // Redirecting To Other Page
	}
	else
	{
	header("location: table.php?errdelete=1"); // Redirecting To Other Page
	}


}
?>