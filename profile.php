<?php
include('session.php'); 
if($login_session=="c9999")
{
mysqli_close($con); // Closing Connection
header('Location:mainpage.php'); // Redirecting To Home Pag
}// Includes Login Script
if($_SESSION['verification']==1)
{
?>
<script>alert("change your password"); </script>
<?php	
}
if(isset($_GET['year']))
{
$resyear=$_GET['year'];
}
if(isset($_GET['succ']))
{
?>
<script>alert("Updated UG Password Sucessfully"); </script>
<?php
}
if(isset($_GET['errsucc']))
{
?>
<script>alert("please try after some time"); </script>
<?php
}
if(isset($_GET['errinold']))
{
?>
<script>alert("old password doent match with our records"); </script>
<?php
}

if(isset($_GET['updateug']))
{
?>
<script>alert("Updated UG THEORY Preferences"); </script>
<?php
}
if(isset($_GET['errupdateug']))
{
?>
<script>alert("Already Updated UG THEORY Preferences [OR] some error happened in updation ");</script>
<?php
}

if(isset($_GET['updateugopen']))
{
?>
<script>alert("Updated UG LAB Preferences");</script>
<?php
}
if(isset($_GET['errupdateugopen']))
{
?>
<script>alert("Already Updated UG  LAB Preferences [OR] some error happened in updation ");</script>
<?php
}


if(isset($_GET['updatepg']))
{
?>
<script>alert("Updated PG THEORY Preferences"); </script>
<?php
}
if(isset($_GET['errupdatepg']))
{
?>
<script>alert("Already Updated PG THEORY Preferences [OR] some error happened in updation ");</script>
<?php
}

if(isset($_GET['updatepglab']))
{
?>
<script>alert("Updated PG Lab Preferences");</script>
<?php
}
if(isset($_GET['errupdatepglab']))
{
?>
<script>alert("Already Updated PG  LAB Preferences [OR] some error happened in updation ");</script>
<?php
}

if(isset($_GET['updatepgopen']))
{
?>
<script>alert("Updated PG LAB Preferences");</script>
<?php
}
if(isset($_GET['errupdatepgopen']))
{
?>
<script>alert("Already Updated PG LAB Preferences [OR] some error happened in updation ");</script>
<?php
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>AUTOMATIC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
 </head>
<script>
function myEnable(bad) {
        $("#"+bad+" *").attr('disabled', false);
}
function myFunction(no) {
	var e = document.getElementById(no);
var strUser = e.options[e.selectedIndex].value;
var integer = parseInt(no, 10);
var inte=parseInt(no, 10);
integer++;
var myEle = document.getElementById(no);
myEle.setAttribute("disabled","disabled");
    while(myEle)
	{
   myEle.options[strUser].setAttribute("disabled","disabled");
	var myEle = document.getElementById(integer);
	integer++;
	}
inte--;
var myEle = document.getElementById(no);
	while(myEle)
	{
   myEle.options[strUser].setAttribute("disabled","disabled");
	var myEle = document.getElementById(inte);
	inte--;
	}
}
</script>	

<style>
.disabled{
    background-color: #00ff00;
}
/* The Modal (background) */
.modaldis {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  -webkit-animation-name: fadeIn; /* Fade in the background */
  -webkit-animation-duration: 0.4s;
  animation-name: fadeIn;
  animation-duration: 0.4s
}

/* Modal Content */
.modal-contentdis {
    overflow-y: auto;
  position: fixed;
  bottom: 0;
  background-color: #fefefe;
  width: 100%;
  -webkit-animation-name: slideIn;
  -webkit-animation-duration: 0.4s;
  animation-name: slideIn;
  animation-duration: 0.4s
}

/* The Close Button */
.closedis {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.closedis:hover,
.closedis:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-headerdis {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-bodydis {padding: 2px 16px;
height: 450px;
    overflow-y: auto;
	}

.modal-footerdis {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

/* Add Animation */
@-webkit-keyframes slideIn {
  from {bottom: -300px; opacity: 0} 
  to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}

@keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}

.blinking{
    animation:blinkingText 1.2s infinite;
}
@keyframes blinkingText{
    0%{     color: #000;    }
    49%{    color: #000; }
    60%{    color: transparent; }
    99%{    color:transparent;  }
    100%{   color: #000;    }
}
</style>
<body  style="background-image: url('bgforweb.jpg');">
 
    <nav class="navbar navbar-default" id="colorful-nav">
        <div class="container">
            <div class="navbar-header">
                    <h3>AUTOMATION</h3>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="home"><a href="#"><span class="fa fa-camera-retro"></span><h5>HOME</h5></a></li>
                    <li class="profile"><a href="#"><span class="fa fa-check-circle"></span><h5><?php echo $login_session;?></h5></a></li>
                    <li class="REQUEST"><a href="#" id="blu" onclick="req('<?php echo $login_session;?>')"><i class="fa fa-clock-o"></i><h5>REQUEST</h5></a></li>
                    <li class="statistics"><a href="#" id="myBtndis"><i class="fa fa-address-card"></i><h5>STATISTICS</h5></a></li>
                    <li class="lists"><a href="#" data-toggle="modal" data-target="#pass"><i class="fa fa-low-vision"></i><h5>PASSWORD</h5></a></li>
                    
<script>
function req(request)
{
    if (confirm('Are you sure want to post request to admin for opening registration')) {
 	var tenure = prompt("Enter any message also here");
     $.ajax({
  type: 'post',
  url: 'updatetime.php',
  data: {
   user:request,
   msg:tenure,
    },
  success: function (response) {
 $('#status' ).html(response);
	if(response=="success")	
   {
	alert("REQUESTED WAIT FOR ACCEPTANCE");
window.location.assign("profile.php");	
  }
  else
  {
	alert("please try again");  
  }
  }
  });
} else {
 
}
    }
    function refreshin()
    {
window.location.assign("profile.php");	
    }
</script>
                    <?php
                    if($_SESSION['publish']==1)
                    {
        ?>
                    <li class="about" ><a class="blinking" href="#" data-toggle="modal" data-target="#result"><span class="fa fa-briefcase"></span><h5>RESULTS</h5></a></li>
<?php
}else
{?>
   <li class="about"><a href="#"><span class="fa fa-briefcase"></span><h5>RESULTS</h5></a></li>
<?php
}
?>
	<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-book"></span><h5>ACADEMIC
        <span class="caret"></span></h5></a>
        <ul class="dropdown-menu">
          <li><a href="#" data-toggle="modal" data-target="#myModal">SELECT preference for UG courses[theory and open elective courses]</a></li>
          <li><a href="#" data-toggle="modal" data-target="#myModalforopen">SELECT preference for UG courses(lab)</a></li>
		   <li><a href="#" data-toggle="modal" data-target="#myModalpg">SELECT preference for PG courses[theory and open elective courses]</a></li>
           <li><a href="#" data-toggle="modal" data-target="#myModalforopenpg">SELECT preference for PG courses(lab)</a></li>
        </ul>
      </li>
	  
                    <li class="search"><a href="logout.php"><span class="fa fa-clock-o"></span><h5>LOGOUT</h5></a></li>
                </ul>
            </div>
        </div>
    </nav>
	<div  class="container">

  
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">COURSE PREFERENCES UG </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php
 $date=$_SESSION['settime'];
if($_SESSION['ug']==1)
{	
?>
     <!-- Modal body -->
      <div class="modal-body">
  	you have already registered for the course
	<B>To RE-REGISTER PLEASE PLACE REQUEST</b>
    	</div>
<?php
}
else if($date=='EVEN')
{
    $count=2;
            $i=0;
    ?>
    <form method = "post" id="ugsub" action = "name.php" onsubmit="myEnable('ugsub')">
      <!-- Modal body -->
      <div class="modal-body">
	  
	  <table style="width:100%" id="ugthe" class="table table-dark table-striped">
	  <tr><th>COURSE-ID</th><th>COURSE-NAME</th><th>SELECT PREFERNCE</th></tr>
<?php
    while($count!=10)
    {
	require_once'sql.php';
		$result=mysqli_query($con,"select * from ugcourses where sem='even' AND semno='".$count."' ORDER BY semno ASC");
	while ($row =mysqli_fetch_array($result))
	{
	?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1" >PREFERENCE 1</option>
  <option value="2">PREFERENCE 2</option>
  <option value="3">PREFERENCE 3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$i++;
	}
			$result=mysqli_query($con,"select * from ugopenelective where sem='even' AND semno='".$count."' ORDER BY semno ASC");
	while ($row =mysqli_fetch_array($result))
	{
?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1">PREFERENCE1</option>
  <option value="2">PREFERENCE2</option>
  <option value="3">PREFERENCE3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$i++;
	}
        $count=$count+2;
    }
	?>
		</table>
	</div>
		<div class="modal-footer">
        <button type="submit"  name="prefselect" class="btn btn-danger">SUBMIT</button>
        <button type="reset"  onclick="refreshin()" class="btn btn-danger">RESET</button>
      </div>
</form>
<?php
}
else if($date=='ODD')
{
	    $count=1;
            $i=0;
    ?>
    <form method = "post" id="ugsub" action = "name.php" onsubmit="myEnable('ugsub')">
      <!-- Modal body -->
      <div class="modal-body">
	  
	  <table style="width:100%" id="ugthe" class="table table-dark table-striped">
	  <tr><th>COURSE-ID</th><th>COURSE-NAME</th><th>SELECT PREFERNCE</th></tr>
<?php
    while($count!=9)
    {
	require_once'sql.php';
		$result=mysqli_query($con,"select * from ugcourses where sem='odd' AND semno='".$count."' ORDER BY semno ASC");
	while ($row =mysqli_fetch_array($result))
	{
	?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1" >PREFERENCE 1</option>
  <option value="2">PREFERENCE 2</option>
  <option value="3">PREFERENCE 3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$i++;
	}
			$result=mysqli_query($con,"select * from ugopenelective where sem='odd' AND semno='".$count."' ORDER BY semno ASC");
	while ($row =mysqli_fetch_array($result))
	{
?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1">PREFERENCE1</option>
  <option value="2">PREFERENCE2</option>
  <option value="3">PREFERENCE3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$i++;
	}
	         $count=$count+2;
    }
	?>
		</table>
	</div>
		<div class="modal-footer">
        <button type="submit"  name="prefselect" class="btn btn-danger">SUBMIT</button>
 <button  type="reset" onclick="refreshin()" class="btn btn-danger">RESET</button>
      </div>
</form>
<?php
}
?>
  
    </div>
  </div>
</div>

<!-- The Modal For change pass-->
<div class="modal" id="pass">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">CHANGE PASSWORD</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<div class="modal-body">
	  <b>if you enter new password correctly you can submit the form<b>
	  <form method="post" action="updatepsw.php">
	   <label for="psw"><b>Enter OLD Password</b></label>
	<br>
	  <input type="password" name="old" id="old" required><br>
   <label for="psw"><b>Enter NEW Password</b></label>
	<br>
	  <input type="password" name="new" id="new"required><br>
 <label for="psw" ><b>REnter NEW Password</b></label>
	<br>
	<input type="password" name="newps" id="newps"required>
	  </div>
		<div class="modal-footer">
        <button type="submit" name="chpass" id="chpass" class="btn btn-danger" disabled>SUBMIT</button>
      </div>
      </form>
	 
	  <script>
	   var myInput = document.getElementById("new");
var myInput1 = document.getElementById("newps");

myInput1.onkeyup = function() {
var c_pas = document.getElementById("new").value;  
if(myInput1.value.match(c_pas))
{
document.getElementById("new").disabled=true; // this adds the error class
document.getElementById("new").style.borderColor = "green";
document.getElementById("chpass").disabled =false;
}
 else 
	{
document.getElementById("chpass").disabled =true;
document.getElementById("new").disabled=false; // this adds the error class
		document.getElementById("new").style.borderColor = "red"; // this adds the error class
    }

}

	  </script>
	</div>
  </div>
</div>




<div class="modal" id="result">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ALLOTMENT RESULTS<?php if(isset($_GET['year'])) echo "(".$resyear.")";?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<div class="modal-body">
<?php
if(isset($_GET['year']))
{
?>
<table class="table">
<tr><th>COURSE ID</th><th>COURSE NAME</th><th>Given preference</th><th>Alloted</th></tr>
<?php
$query="Select * from allotment where alloted='".$login_session."' and date='".$resyear."'";
$res=mysqli_query($con,$query);
  while ($row =mysqli_fetch_array($res))
  {
?>
<tr><td>
<?php
echo $row['courseid'];
?></td>
<td>
<?php $querry1="select Distinct coursename from preference where courseid='".$row['courseid']."'";
$rese=mysqli_query($con,$querry1);
while ($row1 =mysqli_fetch_array($rese))
  {
echo $row1['coursename'];
}
?>
</td>
<td><?php
echo $row['preference'];
?></td><td><?php
echo $row['alloted'];
?></td></tr>
<?php
}?>
</table>
<?php 
}
?>
    </div>
    <div class="modal-footer">

        <select class="form-control inputstl"  onchange="changeyear(this)" name="changeyear" id="changeyear">
                                                <option disabled selected>SELECT YEAR FOR ALLOTMENT RESULTS </option>
                                                <?php 
                                                $year=2018;
                                                while($year!=date('Y'))
                                                {    
                                                ?>
                                                <option value="<?php echo $year;?>">
                                              <?php echo $year;?></option>
                                                <?php
                                                $year++;
                                                }?>
                                                <option value="<?php echo $year;?>"><?php echo date('Y');?></option>
        </select>
      </div>
   <script>
function changeyear(obj)
{
  window.location.assign("profile.php?year="+obj.value);
}
   </script>
  </div>
  </div>
</div>




<!-- The Modal for open elective -->
<div class="modal" id="myModalforopen">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">COURSE PREFERENCES UG LAB </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php
if($_SESSION['ugopen']==1)
{	
?>
     <!-- Modal body -->
      <div class="modal-body">
  	you have already registered for the course
	<B>To RE-REGISTER PLEASE PLACE REQUEST</b>
		</div>
<?php
}
else if($date=='EVEN')
{
	require_once'sql.php';
		$result=mysqli_query($con,"select * from ugcourseslab where sem='even' ORDER BY semno ASC");
?>
<form method = "post" id="ugopen" action = "name.php" onsubmit="myEnable('ugopen')">
      <!-- Modal body -->
      <div class="modal-body">
	  
	  <table style="width:100%" id="ugthe" class="table table-dark table-striped">
	  <tr><th>COURSE-ID</th><th>COURSE-NAME</th><th>SELECT PREFERNCE</th></tr>
<?php
$i=300;
$previous=NULL;
	while ($row =mysqli_fetch_array($result))
	{
	    $i++;
if($previous!=$row['semno']&&$previous!=NULL)
	{
		$i=$i++;
	}
?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1">PREFERENCE1</option>
  <option value="2">PREFERENCE2</option>
  <option value="3">PREFERENCE3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$previous=$row['semno'];
	}
	?>
		</table>
			</div>
		<div class="modal-footer">
        <button type="submit" name="prefselectlabugopen" class="btn btn-danger">SUBMIT</button>
 <button  type="reset" onclick="refreshin()" class="btn btn-danger">RESET</button>
      </div>
</form>
<?php
}
else if($date=='ODD')
{
	require_once'sql.php';
		$result=mysqli_query($con,"select * from ugcourseslab where sem='odd' ORDER BY semno ASC");
?>
<form method = "post" id="ugopen" action = "name.php" onsubmit="myEnable('ugopen')">
      <!-- Modal body -->
      <div class="modal-body">
	  
	  <table style="width:100%" id="ugthe" class="table table-dark table-striped">
	  <tr><th>COURSE-ID</th><th>COURSE-NAME</th><th>SELECT PREFERNCE</th></tr>
<?php
$i=300;
$previous=NULL;
	while ($row =mysqli_fetch_array($result))
	{
	    $i++;
if($previous!=$row['semno']&&$previous!=NULL)
	{
		$i=$i++;
	}
?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1">PREFERENCE1</option>
  <option value="2">PREFERENCE2</option>
  <option value="3">PREFERENCE3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$previous=$row['semno'];
	}
	?>
		</table>
			</div>
		<div class="modal-footer">
        <button type="submit" name="prefselectlabugopen" class="btn btn-danger">SUBMIT</button>
       <button  type="reset" onclick="refreshin()" class="btn btn-danger">RESET</button>
      </div>
</form>
<?php
}
else
{	
?>
     <!-- Modal body -->
      <div class="modal-body">
  	COME AFTER SOME TIME
		</div>
<?php
}?>
  
    </div>
  </div>
</div>



<!-- The Modal for pg course -->
<div class="modal" id="myModalpg">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">COURSE PREFERENCES PG </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php
 $date=$_SESSION['settime'];
 if($_SESSION['pg']==1)
{	
?>
     <!-- Modal body -->
      <div class="modal-body">
  	you have already registered for the course
	<B>To RE-REGISTER PLEASE PLACE REQUEST</b>
		</div>
<?php
}
else if($date=='EVEN')
{
    $count=2;
            $i=1000;
    ?>
  <form method = "post" id="pgss" action = "name.php" onsubmit="myEnable('pgss')">
    <!-- Modal body -->
      <div class="modal-body">
	  
	  <table style="width:100%" id="ugthe" class="table table-dark table-striped">
	  <tr><th>COURSE-ID</th><th>COURSE-NAME</th><th>SELECT PREFERNCE</th></tr>
<?php
    while($count!=10)
    {
	require_once'sql.php';
		$result=mysqli_query($con,"select * from pgcourses where sem='even' AND semno='".$count."' ORDER BY semno ASC");
	while ($row =mysqli_fetch_array($result))
	{
	?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1" >PREFERENCE 1</option>
  <option value="2">PREFERENCE 2</option>
  <option value="3">PREFERENCE 3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$i++;
	}
			$result=mysqli_query($con,"select * from pgopenelective where sem='even' AND semno='".$count."' ORDER BY semno ASC");
	while ($row =mysqli_fetch_array($result))
	{
?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1">PREFERENCE1</option>
  <option value="2">PREFERENCE2</option>
  <option value="3">PREFERENCE3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$i++;
	}
        $count=$count+2;
    }
	?>
		</table>
	</div>
		<div class="modal-footer">
           <button type="submit" name="prefselectpg" class="btn btn-danger">SUBMIT</button>
            <button type="reset"  onclick="refreshin()" class="btn btn-danger">RESET</button>
	   </div>
</form>
<?php
}
else if($date=='ODD')
{
	    $count=1;
            $i=1000;
    ?>
  <form method = "post" id="pgss" action = "name.php" onsubmit="myEnable('pgss')">
    <!-- Modal body -->
      <div class="modal-body">
	  
	  <table style="width:100%" id="ugthe" class="table table-dark table-striped">
	  <tr><th>COURSE-ID</th><th>COURSE-NAME</th><th>SELECT PREFERNCE</th></tr>
<?php
    while($count!=9)
    {
	require_once'sql.php';
		$result=mysqli_query($con,"select * from pgcourses where sem='even' AND semno='".$count."' ORDER BY semno ASC");
	while ($row =mysqli_fetch_array($result))
	{
	?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1" >PREFERENCE 1</option>
  <option value="2">PREFERENCE 2</option>
  <option value="3">PREFERENCE 3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$i++;
	}
			$result=mysqli_query($con,"select * from pgopenelective where sem='even' AND semno='".$count."' ORDER BY semno ASC");
	while ($row =mysqli_fetch_array($result))
	{
?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1">PREFERENCE1</option>
  <option value="2">PREFERENCE2</option>
  <option value="3">PREFERENCE3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$i++;
	}
	         $count=$count+2;
    }
	?>
		</table>
	</div>
		<div class="modal-footer">
           <button type="submit" name="prefselectpg" class="btn btn-danger">SUBMIT</button>
	    <button type="reset"  onclick="refreshin()" class="btn btn-danger">RESET</button>
       </div>
</form>
<?php
    
}
else
{	
?>
     <!-- Modal body -->
      <div class="modal-body">
  	COME AFTER SOME TIME
		</div>
<?php
}?>
  
    </div>
  </div>
</div>





<!-- The Modal for open elective -->
<div class="modal" id="myModalforopenpg">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">COURSE PREFERENCES PG LAB </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php
if($_SESSION['pgopen']==1)
{	
?>
     <!-- Modal body -->
      <div class="modal-body">
  	you have already registered for the course
	<B>To RE-REGISTER PLEASE PLACE REQUEST</b>
		</div>
<?php
}
else if($date=='EVEN')
{
	require_once'sql.php';
		$result=mysqli_query($con,"select * from pgcourseslab where sem='even' ORDER BY semno ASC");
?>
<form method = "post" id="pgopen" action = "name.php" onsubmit="myEnable('pgopen')">
      <!-- Modal body -->
      <div class="modal-body">
	  <table style="width:100%" id="ugthe" class="table table-dark table-striped">
	  <tr><th>COURSE-ID</th><th>COURSE-NAME</th><th>SELECT PREFERNCE</th></tr>
<?php
$i=800;
$previous=NULL;
	while ($row =mysqli_fetch_array($result))
	{
	    $i++;
if($previous!=$row['semno']&&$previous!=NULL)
	{
		$i++;
	}
?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1">PREFERENCE1</option>
  <option value="2">PREFERENCE2</option>
  <option value="3">PREFERENCE3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$previous=$row['semno'];
	}
	?>
			</table>
		</div>
		<div class="modal-footer">
        <button type="submit" name="prefselectlabpgopen" class="btn btn-danger">SUBMIT</button>
       <button type="reset" onclick="refreshin()" class="btn btn-danger">RESET</button>
      </div>
</form>
<?php
}
else if($date=='ODD')
{
	require_once'sql.php';
		$result=mysqli_query($con,"select * from pgopenelective where sem='odd' ORDER BY semno ASC");
?>
<form method = "post" id="pgopen" action = "name.php" onsubmit="myEnable('pgopen')">
      <!-- Modal body -->
      <div class="modal-body">
	  
	  <table style="width:100%" id="ugthe" class="table table-dark table-striped">
	  <tr><th>COURSE-ID</th><th>COURSE-NAME</th><th>SELECT PREFERNCE</th></tr>
<?php
$i=800;
$previous=NULL;
	while ($row =mysqli_fetch_array($result))
	{
	    $i++;
if($previous!=$row['semno']&&$previous!=NULL)
	{
		$i=$i++;
	}
?>       
	   <tr><td><?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td>
<select onchange="myFunction(<?php echo $i;?>)" id="<?php echo $i;?>" name="<?php echo $row['courseid'];?>" class="form-control">
<option value="0" selected>preference 0</option>
  <option value="1">PREFERENCE1</option>
  <option value="2">PREFERENCE2</option>
  <option value="3">PREFERENCE3</option>
</select></td><td><?php echo $row['semno'];?></td></tr>
<?php
	$previous=$row['semno'];
	}
	?>
			</table>
		</div>
		<div class="modal-footer">
        <button type="submit" name="prefselectlabpgopen" class="btn btn-danger">SUBMIT</button>
      <button  type="reset" onclick="refreshin()" class="btn btn-danger">RESET</button>
      </div>
</form>
<?php
}
else
{	
?>
     <!-- Modal body -->
      <div class="modal-body">
  	COME AFTER SOME TIME
		</div>
<?php
}?>
  
    </div>
  </div>
</div>







<!-- The Modal For display-->
<div id="myModaldis" class="modaldis">

  <!-- Modal content -->
  <div class="modal-contentdis">
    <div class="modal-headerdis">
      <span class="closedis">&times;</span>
      <h2>SELECTED PREFERENCES</h2>
    </div>
    <div class="modal-bodydis">

<?php
require_once'sql.php';
		$result=mysqli_query($con,"select * from preference where userid='$login_session' AND year(date)=year(NOW()) AND sem='$date' ");
?>
<select class="form-control" id="opt">
<option value>FILTER</option>
<option value='UGTHEORY'>UGTHEORY</option>
<option value='UGLAB'>UGLAB</option>
<option value='UGELECTIVE'>UGELECTIVE</option>
<option value='PGTHEORY'>PGTHEORY</option>
<option value='PGLAB'>PGLAB</option>
<option value='PGELECTIVE'>PGELECTIVE</option>

</select>


     <table style="width:100%" class="table table-dark table-striped" id="mytable">
<thead>	<tr><th>USER-ID</th><th>COURSE-ID</th><th>COURSE-NAME</th><th>PREFERNCE</th><th>Type</th></tr></thead>
<tbody>
<?php
	while ($row =mysqli_fetch_array($result))
	{
?>       
	   <tr data-year="<?php echo $row['type'];?>"><td><?php echo $row['userid'];?></td>
	   
<td>	<?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td><?php echo $row['preference'];?></td>
	   <td><?php echo $row['type'];?></td></tr>
<?php
	}
	?>
	</tbody>
		</table>
  		<button type="button" id="mal">CLOSE&times;</button>
     
	</div>
    <div class="modal-footerdis">
      <h3>For Changes Contact Admin</h3>
    </div>
  </div>







</div>
  
<script>
// Get the modal
var modal = document.getElementById("myModaldis");

// Get the button that opens the modal
var btn = document.getElementById("myBtndis");
var btn2 = document.getElementById("mal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closedis")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

btn2.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script>
// for filter purpose

$('#opt').on('change', function(e){
    // Get the value of the select box
    var val = $(this).val();
 console.log(val);
 // Show all the rows
    $('tbody tr').show();
    // If there is a value hide all the rows except the ones with a data-year of that value
    if(val) {
        $('tbody tr').not($('tr[data-year="' + val + '"]')).hide();
    }
});
<?php 
if(isset($_GET['year'])&&$_SESSION['publish']==1)
{
?>
$('#result').modal('show');
<?php
}
?>
</script>

</div>	
 </body>

</html>
