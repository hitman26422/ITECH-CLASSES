<?php
include 'session.php';
function getcourse($courseid,$type)
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
            <script>
function su(type,num)
{
	var array=[];
	for(i=num-1;i>=0;i--)
	{
		array[i]=document.getElementById(type+i).value;
	}
	if(num!=0)
	{
		var json=JSON.stringify(array);
	    $.ajax({
  type: 'post',
  url: 'result.php',
  data: {
   list:json,
   types:type,
    },
  success: function (response) {
	if(response.substring(0,7)=="success")	
   	{
	alert("allocated sucessfully");	
  location.reload();	
  }
  else
  	{
	alert("please try again /use update section if you have already updated preference");  
  	}
  },
  error: function (jqXHR, exception) {
    alert("error contacting server");
}
  });}
}
function changeallotment(number,n)
{
	$.ajax({
  type: 'post',
  url: 'result.php',
  data: {
   pid:number,
   userid:n.value,
    },
  success: function (response) {
	if(response.substring(0,7)=="success")	
   	{
	alert("allocated sucessfully");	
location.reload();
  	}
  else
  	{
	alert("please try again");  
  	}
  },
  error: function (jqXHR, exception) {
    alert("error contacting server");
}
  });
}
</script>
            </head>
<body><h1>
<?php
echo "<b> LIST OF ".$courseid."</b> (".$_SESSION['setyear'].")";
?></h1>
<table class="table table-dark table-striped"  border="2" align="center">
<tr><th>SEM</th></th><th>course_id</th><th>Course_name</th><th>ALLOCATE</th><th>IF ALLOCATED</th></tr>
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
	<?php if($row['sem']!="Declined")
	{?>
		<td><select id='<?php echo $type.$i;?>'>
<?php
$query="select userid,alias from login";
  $result_loop=mysqli_query($con,$query); 
	while ($rowl =mysqli_fetch_array($result_loop))
	{
?><option value='<?php echo $rowl['userid'].$row['courseid'];?>'><?php echo $rowl['alias'];?></option>
	<?php 
	}
	?>
		</select></td> 
		<td> <?php
$list_allocated="select alias from login where userid=(select alloted from allotment where courseid='".$row['courseid']."' and date='".$_SESSION['setyear']."')";
  $result_alias=mysqli_query($con,$list_allocated); 
while ($rowi=mysqli_fetch_array($result_alias))
	{
?>

<?php
$j=0;
$query="select userid,alias from login";
$unique="select u_pref from allotment where courseid='".$row['courseid']."' and date='".$_SESSION['setyear']."'";
  $result_loop=mysqli_query($con,$query); 
$pid=mysqli_query($con,$unique);
while ($rowj =mysqli_fetch_array($pid))
	{
		$al=$rowj['u_pref'];
	}	
?>
<select id="<?php echo $al.$j;?>"onchange="changeallotment(<?php echo $al;?>,this)"> 
	<?php while ($rowl =mysqli_fetch_array($result_loop))
	{
		 if($rowl['alias']==$rowi['alias'])
		{ 
?><option value='<?php echo $al;?>' selected disabled> <?php echo $rowl['alias'];?></option>
	<?php 
}
else
{
	?>
<option value='<?php echo $rowl['userid'];?>'> <?php echo $rowl['alias'];?></option>
	<?php
}
}
$j++;
}
		?>
		</td>
		<?php
$i++;	
}
	else{
		?>
		<td><b>DECLINED/DELETED<b></td>
		<?php
	}	
}
		?>
	</tr>
<tr><td></td><td></td><td></td><td><button  onclick="su('<?php echo $type;?>',<?php echo $i;?>)"class="btn btn-danger" >submit</button>

</td>
</tr>
</table>

</body>
<?php
}
if(isset($_GET["year"]))
{
	$year=(int)$_SESSION['setyear'];
	$curr=(int)date('Y');
	if($curr-$year>=0&&$curr-$year<2)
	{
    getcourse('UGTHEORY','ugcourses');
getcourse('UGLAB','ugcourseslab');
getcourse('UGELECTIVE','ugopenelective');
getcourse('PGTHEORY','pgcourses');
getcourse('PGLAB','pgcourseslab');
getcourse('PGELECTIVE','pgopenelective');
	}
	else
		echo "<h1>Set DATE in ADMIN PAGE WITH PAST TWO YEARS</h1>";
}
else
{
	
}
?>