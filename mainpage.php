<?php
require_once 'session.php';
require_once'sql.php';// Includes Login Script
$result = mysqli_query( $con,"select settime from choosetime  where userid='c9999'");
$row = mysqli_fetch_array($result);
$_SESSION['settime']=$row[0];
if($login_session!="c9999")
{
mysqli_close($con); // Closing Connection
header('Location:logout.php'); // Redirecting To Home Pag
}
if(isset($_GET['file']))
{
$file = $_GET['file'].".xlsx";
$file = 'uploads/'.$file;
if(!file_exists($file)){ // file does not exist
?>
<script>alert
('result arent published some error');</script>
<?php
} else {
    
       		header("location:download.php?file=$file"); // Redirecting To Other Page
}
}
if(isset($_GET['result']))
{
?>
<script>alert("Result updated waiting to be published"); </script>
<?php
}
if(isset($_GET['errresult']))
{
?>
<script>alert("some error check for file type"); </script>
<?php
}

if(isset($_GET['reset']))
{
?>
<script>alert("opened gateway for user"); </script>
<?php
}
if(isset($_GET['errorreset']))
{
?>
<script>alert("sone error happened"); </script>
<?php
}
if(isset($_GET['add']))
{
?>
<script>alert("ADDED USER PASSWORD default"); </script>
<?php
}
if(isset($_GET['erradd']))
{
?>
<script>alert("Already USER EIXTS  [OR] some error happened in Insertion ");</script>
<?php
}

?><!DOCTYPE html>
<html lang="en">
<head>
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
			<style>
			/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}
/* Add styles to the form container */
.formup-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}


/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

			
    table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
			.form-popup {
  display: none;
			}
table {
    overflow-x: auto;
}


.modalown {
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
}

/* Modal Content/Box */
.modalown-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.closeown {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.closeown:hover,
.closeown:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
.modalown-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

/* Modal Body */
.modalown-body {padding: 2px 16px;}

/* Modal Footer */
.modalown-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

/* Modal Content */
.modalown-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@keyframes animatetop {
  from {top: -300px; opacity: 0}
  to {top: 0; opacity: 1}
}

			</style>

    <script>
		function update_key(login)
{
	$.ajax({
  type: 'post',
  url: 'updatetime.php',
  data: {
   settime:login,
    },
  success: function (response) {
 $('#status' ).html(response);
	if(response=="success")	
   {
	alert("updated");
window.location.assign("mainpage.php");	
  }
  else
  {
	alert("please try again");  
  }
  }
  });
}
	function resetall()
{
    if (confirm('Are you sure you want to reset:this will open registration to all and results will be unpublished?')) {
 	$.ajax({
  type: 'get',
  url: 'updatetime.php',
  data: {
   settime:1,
    },
  success: function (response) {
 $('#status' ).html(response);
	if(response=="success")	
   {
	alert("reseted all");
window.location.assign("mainpage.php");	
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
    
    function publish()
{
    if (confirm('click yes to publish')) {
 	$.ajax({
  type: 'post',
  url: 'updatetime.php',
  data: {
   publish:1,
    },
  success: function (response) {
 $('#status' ).html(response);
	if(response=="success")	
   {
	alert("published");
window.location.assign("mainpage.php");	
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
    function changeyear()
    {
        var e = document.getElementById("changeyear");
var struser = e.options[e.selectedIndex].value;
struser+='-00-00';
console.log(struser);
    $.ajax({
  type: 'get',
  url: 'updatetime.php',
  data: {
   year:struser,
    },
  success: function (response) {
 $('#status' ).html(response);
	if(response=="success")	
   {
	alert("UPDATED VIEW THE RESULTS");
window.location.assign("mainpage.php");	
  }
  else
  {
	alert("please try again");  
  }
  }
  });
}   
</script>
	</head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">AUTOMATIC </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><br><select class="form-control inputstl" style="width:200px;" onchange="changeyear()" name="changeyear" id="changeyear">
                                                <option disabled selected><?php echo $_SESSION['setyear'];?></option>
                                                <?php 
                                                $year=2018;
                                                while($year!=date('Y'))
                                                {?>
                                                <option><?php echo $year;?></option>
                                                <?php
                                                $year++;
                                                }?>
                                                 <option><?php echo date('Y');?></option>
                                                </select>
                            </li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <ul class="nav pull-right">
                            <li><a href="#">Welcome Admin</a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <b>LOGOUT</b>
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                             </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="form.php"><i class="menu-icon icon-paste"></i>UPDATE COURSES </a></li>
                                <li><a href="table.php"><i class="menu-icon icon-table"></i>LIST COURSES </a></li>
                <iframe id="l" src="staffdata.php?id=*" style="display: none;"></iframe>      
                <iframe id="frame_b" src="getallotment.php?year=<?php echo $_SESSION['setyear'];?>" style="display: none;"></iframe>      
                
                                        
                                <li>   <a onclick="printOtherPage2()"><i class="menu-icon icon-table"></i>ALL RECORDS</a></li>
                                                        
                                <li><a onclick="printOtherPage()"><i class="menu-icon icon-table"></i>GENERATE REPORT</a></li>
                                <li><a onclick="printOtherinPage()"><i class="menu-icon icon-table"></i>GENERATE ALLOTMENT REPORT</a></li>
   
                                      <iframe id="frame" src="pd.php" style="display: none;"></iframe>
<script type="text/javascript">
  function printOtherPage() {
  document.getElementById('frame').contentWindow.window.print();
  }
  function printOtherinPage() {
  document.getElementById('frame_b').contentWindow.window.print();
  }
  function printOtherPage2() {
  document.getElementById('l').contentWindow.window.print();
  }
</script>

                             </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>More Pages </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="other-user-listing.php"><i class="icon-inbox"></i>All Users </a></li>
                                    </ul>
                                </li>
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="#" onclick="update_key('<?php echo $_SESSION['settime'];?>')" class="btn-box big span4"><i class=" icon-random"></i><b><?php echo $_SESSION['settime'].date("Y");?></b>
                                        <p class="text-muted">
                                            SET ODD/EVEN</p>
                                    </a>
                                    <a href="#" class="btn-box big span4" onclick="hi()"><i class="icon-user"></i><b><?php echo "USER";?></b>
                                        <p class="text-muted">
                                           Create New Users</p>
                                    </a>
<div class="widget widget-usage unstyled span4" >
            <marquee direction="up" style="height:200px;">
          <?php require 'sql.php';
          $query="select * from request";
          $res=mysqli_query($con,$query);
   	while ($row =mysqli_fetch_array($res))
	{     ?>
          <div class="card-header"><b>
            <?php
            echo $row['userid'];                                        
          ?><b>
            </div>
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p class="card-text"><?php
            echo $row['message'];                                        
          ?></p>
          
              <a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-primary">RESET</a>
            </div>
    <?php
    }
    ?>
            </marquee>
          </div>
   

                                </div>
  <br>

<div class="modalown-content" style="display:none" id="userModal">
  <div class="modalown-header">
    <span class="closeown" onclick="closeForm()">&times;</span>
    <h2>CREATION</h2>
  </div>
  <div class="modalown-body">
      <form action="adduser.php" method="POST" class="form-container">
    <h1>ADD USER</h1>

    <label for="email"><b>USER ID</b></label>
    <input type="text" placeholder="Enter USERID" name="uid" required>
	<b>Note Id should be a alphabet followed by four digits else you can create but cannot login<b>
    <label for="psw"><b>Password</b></label>
    <input type="password"  value="default" placeholder="Enter Password" name="psw" disabled>

    <label for="psw"><b>DESIGNATION</b></label>
	<select NAME="incharge">
	<option value="STAFF">STAFF</option>
		<option value="PROFESSOR">PROFESSOR</option>
	<option value="HOD">HOD</option>
	<option value="ASSISTANT">ASSISTANT</option>
	</select><br>
	<label for="email"><b>Alias Name</b></label>
    <input type="text" placeholder="Enter A-NAME" name="aid" required>
    <br>
	<button type="submit" name="adduser" class="btn">Create</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>


  </div>
  <div class="modalown-footer">
    <h3></h3>
  </div>
</div>
<script>
function hi()
{
var modal = document.getElementById("userModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");


// When the user clicks on the button, open the modal
  modal.style.display = "block";
}
function closeForm()
{
var mod = document.getElementById("userModal");
 mod.style.display = "none";
}
</script>
<br><br>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">RESET</h4>
        </div>
        <div class="modal-body">
        <form  action="reset.php" method="post" name="rese">
            <input type="text" placeholder="Enter staff Id" id="resetid" name="resetid">
            <button type="submit" name="reset" class="btn btn-default">Reset</button>
        </form>
        <h6>USER REQUEST FOR RESET</h6>
         <?php require 'sql.php';
          $query="select distinct userid from request";
          $res=mysqli_query($con,$query);
   	while ($row =mysqli_fetch_array($res))
	{    
        echo $row['userid']."<br>";
     }
     ?>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
 <div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" onclick="resetall()" class="btn-box small span4"><i class="icon-envelope"></i><b>Reset all new registeration</b>
                                                </a><a href="#" class="btn-box small span4" data-toggle="modal" data-target="#myModal"><i class="icon-group"></i><b>Reset particuar staff</b>
                                                </a><a href="allocate.php?year=1" target="_blank" class="btn-box small span4"><i class="icon-exchange"></i><b>UPDATE ALLOTMENT</b>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" onclick="printOtherinPage()" class="btn-box small span4"><i class="icon-save"></i><b>view allotment</b>
                                                </a><a href="#" onclick="publish()" class="btn-box small span4"><i class="icon-bullhorn"></i><b>Publish</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-sort-down"></i><b>RENEW Data 
                                                <?php echo $_SESSION['setyear'].$_SESSION['settime']; ?></b>
                                                  </a>

                                            </div>
                                        </div>
                                    </div>
                                    <ul class="widget widget-usage unstyled span4">
                                        <li>
                                            <p>
                                                <?php
                                                require_once 'sql.php';
                                                $res=mysqli_query($con,"SELECT count(ug) as ug FROM `login`");
                                                $row = mysqli_fetch_assoc($res);
                                                $count=$row['ug'];
                                                $res=mysqli_query($con,"SELECT count(ug) as ug FROM `login` where ug=1");
                                                $row = mysqli_fetch_assoc($res);
                                                $reg=$row['ug'];
                                                $prob=($reg/$count)*100;
                                                ?>
                                                <strong>UG ELECTIVE AND 
                                                THEORY</strong> <span class="pull-right small muted"><?php echo $prob; ?>%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar" style="width: <?php echo $prob; ?>%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <?php
                                                require_once 'sql.php';
                                                $res=mysqli_query($con,"SELECT count(ugopen) as ug FROM `login`");
                                                $row = mysqli_fetch_assoc($res);
                                                $count=$row['ug'];
                                                $res=mysqli_query($con,"SELECT count(ugopen) as ug FROM `login` where ugopen=1");
                                                $row = mysqli_fetch_assoc($res);
                                                $reg=$row['ug'];
                                                $prob=($reg/$count)*100;
                                                ?>
                                            
                                                <strong>UG LAB</strong> <span class="pull-right small muted"><?php echo $prob; ?>%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-success" style="width: <?php echo $prob; ?>%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                    <?php
                                                require_once 'sql.php';
                                                $res=mysqli_query($con,"SELECT count(pg) as ug FROM `login`");
                                                $row = mysqli_fetch_assoc($res);
                                                $count=$row['ug'];
                                                $res=mysqli_query($con,"SELECT count(pg) as ug FROM `login` where pg=1");
                                                $row = mysqli_fetch_assoc($res);
                                                $reg=$row['ug'];
                                                $prob=($reg/$count)*100;
                                                ?>
                                            
                                                <strong>PG THEORY AND ELECTIVE</strong> <span class="pull-right small muted"><?php echo $prob; ?>%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-warning" style="width: <?php echo $prob; ?>%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                    <?php
                                                require_once 'sql.php';
                                                $res=mysqli_query($con,"SELECT count(pgopen) as ug FROM `login`");
                                                $row = mysqli_fetch_assoc($res);
                                                $count=$row['ug'];
                                                $res=mysqli_query($con,"SELECT count(pgopen) as ug FROM `login` where pgopen=1");
                                                $row = mysqli_fetch_assoc($res);
                                                $reg=$row['ug'];
                                                $prob=($reg/$count)*100;
                                                ?>
                                            
                                                <strong>PG LAB</strong> <span class="pull-right small muted"><?php echo $prob; ?>%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-danger" style="width: <?php echo $prob; ?>%;">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                           
</div>
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        DataTables</h3>
                                </div>
                                <div class="table-responsive">
                                <div class="module-body table">
                                  
<?php
require_once'sql.php';
		$result=mysqli_query($con,"select * from preference where sem='".$_SESSION['settime']."' and year(preference.date)=year(CONVERT('".$_SESSION['setyear']."', DATE)) ORDER BY preference ASC");
?>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for records.." title="Type in a name">
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
		
		<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mytable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>



						   </div>
                            </div>
                            </div>
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        <script>
</script>

<div class="form-popup" id="result">
  <form action="result.php"  method ="post" enctype="multipart/form-data" class="formup-container">
    <h1>Result Update</h1>

    <label for="result"><b>RESULT UPDATE</b></label>
						 <input type="file" name="file" id="file" accept=".xls,.xlsx"class="span8" required>

    <button type="submit" class="btn" name="import">Upload</button>
    <button type="button" class="btn cancel" onclick="closeResult()">Close</button>
  </form>
</div>

        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; DEVOLOPED BY IT Department,PSG Tech </b>All rights reserved.

            </div>
        </div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>
