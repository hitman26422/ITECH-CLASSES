<?php
include('session.php'); // Includes Login Script
if(isset($_POST['prefselect']))
{
	require_once'sql.php';
		$result=mysqli_query($con,"select * from ugcourses where sem='".$_SESSION['settime']."' ORDER BY semno ASC");
		while ($row =mysqli_fetch_array($result))
	{
		if(isset($_POST[$row['courseid']]))
		{
			$pref=$_POST[$row['courseid']];
			$courseid=$row['courseid'];
			$coursename=$row['coursename'];
			$unid=$login_session.$courseid;
			if($pref!=0)
			{
			$r=mysqli_query($con,"INSERT INTO `preference`(`UNid`, `userid`, `courseid`, `coursename`, `preference`, `type`,`date`,`sem`) 
			VALUES ('$unid','$login_session','$courseid','$coursename','$pref','UGTHEORY',NOW(),'".$_SESSION['settime']."')");
		}
		}
	}
	$result=mysqli_query($con,"select * from ugopenelective where sem='".$_SESSION['settime']."' ORDER BY semno ASC");
		while ($row =mysqli_fetch_array($result))
	{
		if(isset($_POST[$row['courseid']]))
		{
			$pref=$_POST[$row['courseid']];
			$courseid=$row['courseid'];
			$coursename=$row['coursename'];
			$unid=$login_session.$courseid;
			if($pref!=0)
			{
			
			$r=mysqli_query($con,"INSERT INTO `preference`(`UNid`, `userid`, `courseid`, `coursename`, `preference`, `type`,`date`,`sem`) 
			VALUES ('$unid','$login_session','$courseid','$coursename','$pref','UGELECTIVE',NOW(),'".$_SESSION['settime']."')");		
		}
		}
	}
	if($r)
	{
	    		$result=mysqli_query($con,"update login set ug=1 where userid='".$login_session."'");
		header("location: profile.php?updateug=1"); // Redirecting To Other Page
	}
	else
	{
		header("location: profile.php?errupdateug=1"); // Redirecting To Other Page
	}
}


if(isset($_POST['prefselectlabugopen']))
{
	require_once'sql.php';
		$result=mysqli_query($con,"select * from ugcourseslab where sem='".$_SESSION['settime']."' ORDER BY semno ASC");
		while ($row =mysqli_fetch_array($result))
	{
		if(isset($_POST[$row['courseid']]))
		{
			$pref=$_POST[$row['courseid']];
			$courseid=$row['courseid'];
			$coursename=$row['coursename'];
			$unid=$login_session.$courseid;
			if($pref!=0)
			{
			$r=mysqli_query($con,"INSERT INTO `preference`(`UNid`, `userid`, `courseid`, `coursename`, `preference`, `type`,`date`,`sem`) 
			VALUES ('$unid','$login_session','$courseid','$coursename','$pref','UGLAB',NOW(),'".$_SESSION['settime']."')");
		}
		}
	}
	if($r)
	{
	    	    		$result=mysqli_query($con,"update login set ugopen=1 where userid='".$login_session."'");
		header("location: profile.php?updateugopen=1"); // Redirecting To Other Page
	}
	else
	{
		header("location: profile.php?errupdateugopen=1"); // Redirecting To Other Page
	}
}




if(isset($_POST['prefselectpg']))
{
	require_once'sql.php';
		$result=mysqli_query($con,"select * from pgcourses where sem='".$_SESSION['settime']."' ORDER BY semno ASC");
		while ($row =mysqli_fetch_array($result))
	{
		if(isset($_POST[$row['courseid']]))
		{
			$pref=$_POST[$row['courseid']];
			$courseid=$row['courseid'];
			$coursename=$row['coursename'];
			$unid=$login_session.$courseid;
			if($pref!=0)
			{
			$r=mysqli_query($con,"INSERT INTO `preference`(`UNid`, `userid`, `courseid`, `coursename`, `preference`, `type`,`date`,`sem`) 
			VALUES ('$unid','$login_session','$courseid','$coursename','$pref','PGTHEORY',NOW(),'".$_SESSION['settime']."')");
		}
		}
	}
			$result=mysqli_query($con,"select * from pgopenelective where sem='".$_SESSION['settime']."' ORDER BY semno ASC");
		while ($row =mysqli_fetch_array($result))
	{
		if(isset($_POST[$row['courseid']]))
		{
			$pref=$_POST[$row['courseid']];
			$courseid=$row['courseid'];
			$coursename=$row['coursename'];
			$unid=$login_session.$courseid;
			if($pref!=0)
			{
			
			$r=mysqli_query($con,"INSERT INTO `preference`(`UNid`, `userid`, `courseid`, `coursename`, `preference`, `type`,`date`,`sem`) 
			VALUES ('$unid','$login_session','$courseid','$coursename','$pref','PGELECTIVE',NOW(),'".$_SESSION['settime']."')");		
		}
		}
	}
	if($r)
	{
	    	    		$result=mysqli_query($con,"update login set pg=1 where userid='".$login_session."'");
		header("location: profile.php?updatepg=1"); // Redirecting To Other Page
	}
	else
	{
		header("location: profile.php?errupdatepg=1"); // Redirecting To Other Page
	}
}

if(isset($_POST['prefselectlabpgopen']))
{
	require_once'sql.php';
		$result=mysqli_query($con,"select * from pgcourseslab where sem='".$_SESSION['settime']."' ORDER BY semno ASC");
		while ($row =mysqli_fetch_array($result))
	{
		if(isset($_POST[$row['courseid']]))
		{
			$pref=$_POST[$row['courseid']];
			$courseid=$row['courseid'];
			$coursename=$row['coursename'];
			$unid=$login_session.$courseid;
			if($pref!=0)
			{
			$r=mysqli_query($con,"INSERT INTO `preference`(`UNid`, `userid`, `courseid`, `coursename`, `preference`, `type`,`date`,`sem`) 
			VALUES ('$unid','$login_session','$courseid','$coursename','$pref','PGLAB',NOW(),'".$_SESSION['settime']."')");
		}
		}
	}
	if($r)
	{
	    	    		$result=mysqli_query($con,"update login set pgopen=1 where userid='".$login_session."'");
		header("location: profile.php?updatepgopen=1"); // Redirecting To Other Page
	}
	else
	{
		header("location: profile.php?errupdatepgopen=1"); // Redirecting To Other Page
	}

}

?>