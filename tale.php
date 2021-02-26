<?php
include 'session.php';
function getcourse($courseid)
{
?>
<html>
<body>
<?php
echo "<b> LIST OF ".$courseid."</b>";
?>
<table border="2" align="center">
<tr><th>CLASS</th><th>course_id</th><th>Course_name</th><th>preference1</th><th>preference2</th><th>preference3</th></tr>
<?php
require 'sql.php';
$q="select * from  " . $courseid." ORDER BY semno ASC";
		$result=mysqli_query($con,$q); 
	while ($row =mysqli_fetch_array($result))
	{
	?>
	<tr>
	<td><?php echo $row['semno'];?></td>
	<td><?php echo $row['courseid'];?></td>
	<td><?php echo $row['coursename'];?></td>
	<?php		
	$jquery="SELECT preference.* FROM ".$courseid."
RIGHT JOIN preference ON ".$courseid.".courseid=preference.courseid where preference.preference=1 and preference.courseid='".$row['courseid']."' and
preference.sem='".$_SESSION['settime']."' and year(preference.date)=year(CONVERT('".$_SESSION['setyear']."', DATE))";
	$join=mysqli_query($con,$jquery);
		?>
		<td>
		<?php
		while ($jo =mysqli_fetch_array($join))
		{
		    $user="select alias from login where userid='".$jo['userid']."'";
			$alias=mysqli_query($con,$user);
			while ($aliasname =mysqli_fetch_array($alias))
		{
		echo $aliasname['alias']."<br>";
		}
		}
		?>
		</td>
		
	<?php		
	$jquery="SELECT preference.* FROM ".$courseid."
RIGHT JOIN preference ON ".$courseid.".courseid=preference.courseid where preference.preference=2 and preference.courseid='".$row['courseid']."'and preference.sem='".$_SESSION['settime']."' and year(preference.date)=year(CONVERT('".$_SESSION['setyear']."', DATE))";
	$join=mysqli_query($con,$jquery);
		?>
		<td>
		<?php
		while ($jo =mysqli_fetch_array($join))
		{
		       $user="select alias from login where userid='".$jo['userid']."'";
			$alias=mysqli_query($con,$user);
			while ($aliasname =mysqli_fetch_array($alias))
		{
		echo $aliasname['alias']."<br>";
		}
		}
		?>
		</td>
	
	
	<?php		
	$jquery="SELECT preference.* FROM ".$courseid."
RIGHT JOIN preference ON ".$courseid.".courseid=preference.courseid where preference.preference=3 and preference.courseid='".$row['courseid']."' and preference.sem='".$_SESSION['settime']."' and year(preference.date)=year(CONVERT('".$_SESSION['setyear']."', DATE))";
	$join=mysqli_query($con,$jquery);
		?>
		<td>
		<?php
		while ($jo =mysqli_fetch_array($join))
		{
   $user="select alias from login where userid='".$jo['userid']."'";
			$alias=mysqli_query($con,$user);
			while ($aliasname =mysqli_fetch_array($alias))
		{
		echo $aliasname['alias']."<br>";
		}
		}
		?>
		</td>
	
	
	</tr>
<?php	
}
?>
</table>
</body>
<?php
}
?>