<?php
include('session.php'); // Includes Login Script
if($_GET["uid"])
{
$id=$_GET["uid"];
require_once 'sql.php';  
$run=mysqli_query($con,"DELETE FROM  login WHERE userid='".$id."' ");  
  if($run)
	{
		header("location: other-user-listing.php?delete=1"); // Redirecting To Other Page
	}
	else
	{
	header("location: other-user-listing.php?errdelete=1"); // Redirecting To Other Page
	}


}
?>