<?php
include 'session.php';
function getcourse($year,$courseid,$type)
{
?>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AUTOMATION</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery.min.js"></script>
		<link type="text/css" href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            </head>
<body><h1>
<?php
echo "<b> LIST OF ".$courseid."</b> (".$year.")";
?></h1>
<table class="table table-dark table-striped"  border="2" align="center">
<tr><th>SEM</th></th><th>course_id</th><th>Course_name</th><th>ALLOCATED_TO</th></tr>
<?php
require 'sql.php';
$q="select * from ".$type." where sem='".$_SESSION['settime']."' OR sem='Declined' order by semno ASC";
        $result=mysqli_query($con,$q); 
        $i=0;
	while ($row =mysqli_fetch_array($result))
	{
	?>
	<tr>
	<td><?php echo $row['semno'];?></td>
	<td><?php echo $row['courseid'];?></td>
	<td><?php echo $row['coursename'];?></td>
	<td> 
		<?php
$list_allocated="select alias,userid from login where userid=(select alloted from allotment where courseid='".$row['courseid']."' and date='".$year."')";
  $result_alias=mysqli_query($con,$list_allocated); 
	while ($rowi=mysqli_fetch_array($result_alias))
	{
echo $rowi['alias']." <b>(".$rowi['userid'].")<b>";
	}
		?>
		</td>
		<?php	
}	
		?>
	</tr>
</table>
</body>
<?php
}
if(isset($_GET["year"]))
{
getcourse($_GET["year"],'UGTHEORY','ugcourses');
getcourse($_GET["year"],'UGLAB','ugcourseslab');
getcourse($_GET["year"],'UGELECTIVE','ugopenelective');
getcourse($_GET["year"],'PGTHEORY','pgcourses');
getcourse($_GET["year"],'PGLAB','pgcourseslab');
getcourse($_GET["year"],'PGELECTIVE','pgopenelective');
}
?>