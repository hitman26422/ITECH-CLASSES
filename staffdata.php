<?php
include 'session.php';
function getcourse($userid,$courseid,$type)
{
?>
<html>
<body>
<?php
echo "<b> LIST OF ".$courseid."</b>";
?>
<table border="2" align="center">
<tr><th>CLASS</th></th><th>course_id</th><th>Course_name</th><th>preference1</th><th>preference2</th><th>preference3</th></tr>
<?php
require 'sql.php';
$q="select * from  preference,".$type." where preference.courseid=".$type.".courseid and type='". $courseid."' and userid='".$userid."' and preference.sem='".$_SESSION['settime']."' and year(preference.date)=year(CONVERT('".$_SESSION['setyear']."', DATE))order by semno ASC";
        $result=mysqli_query($con,$q); 
	while ($row =mysqli_fetch_array($result))
	{
	?>
	<tr>
	<td><?php echo $row['semno'];?></td>
	<td><?php echo $row['courseid'];?></td>
	<td><?php echo $row['coursename'];?></td>
	<?php
	if($row['preference']==1)
	{
	?>
	<td><?php echo $row['preference'];?></td>
	<td></td>
	<td></td>
	<?php
	}
	else if($row['preference']==2)
	{
	?>
	<td></td>
	<td><?php echo $row['preference'];?></td>
	<td></td>
	<?php
	}
	else if($row['preference']==3)
	{
	?>
	<td></td>
	<td></td>
	<td><?php echo $row['preference'];?></td>
	<?php
	}

		}
		?>
	</tr>
</table>
</body>
<?php
}
if(isset($_GET['id']))
{
    if($_GET['id']=='*')
{
    require 'sql.php';
$q="select userid from login";
		$result=mysqli_query($con,$q); 
	while ($row =mysqli_fetch_array($result))
	{
        $userid=$row['userid'];
    echo "<h1>".$userid."</h1>";
    getcourse($userid,'UGTHEORY','ugcourses');
getcourse($userid,'UGLAB','ugcourseslab');
getcourse($userid,'UGELECTIVE','ugopenelective');
getcourse($userid,'PGTHEORY','pgcourses');
getcourse($userid,'PGLAB','pgcourseslab');
getcourse($userid,'PGELECTIVE','pgopenelective');
    }
}
else
{
    $userid=$_GET['id'];
getcourse($userid,'UGTHEORY','ugcourses');
getcourse($userid,'UGLAB','ugcourseslab');
getcourse($userid,'UGELECTIVE','ugopenelective');
getcourse($userid,'PGTHEORY','pgcourses');
getcourse($userid,'PGLAB','pgcourseslab');
getcourse($userid,'PGELECTIVE','pgopenelective');
}
}
?>