<?php
include('session.php'); // Includes Login Script
$result = mysqli_query( $con,"select settime from choosetime  where userid='c9999'");
$row = mysqli_fetch_array($result);
$_SESSION['settime']=$row[0];
	if(isset($_GET["delete"]))
						{
						?>
	<script>alert("Deleted sucessfully");</script>
<?php
	}
						if(isset($_GET["errdelete"]))
						{
						?>
	<script>alert("try again after some time");</script>
<?php
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTOMATION</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
        <script>
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
window.location.assign("other-user-listing.php");	
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
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">AUTOMATION</a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav nav-icons">
                        <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                        <li><a href="#"><i class="icon-eye-open"></i></a></li>
                        <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                    <li><a href="#"><select style="width:100px;" onchange="changeyear()" name="changeyear" id="changeyear">
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
                            </a></li>
                    </ul>
                    <ul class="nav pull-right">
                        <li><a href="#">Welcome Admin</a></li>
                        <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="images/user.png" class="nav-avatar" />
                            <b>LOGOUT</b><b class="caret"></b></a>
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
                            <li class="active"><a href="mainpage.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                            </a></li>
                        </ul>
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                                <li><a href="form.php"><i class="menu-icon icon-paste"></i>Update course </a></li>
                                <li><a href="table.php"><i class="menu-icon icon-table"></i>LIST COURSE </a></li>
                              </ul>
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                            <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                            </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                            </i>More Pages </a>
                                <ul id="togglePages" class="collapse unstyled">
                                    <li><a href="otherlisting.php"><i class="icon-inbox"></i>All Users </a></li>
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
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                    All Members</h3>
                            </div>
                             <div class="module-body">
   	<div class="row-fluid">
                         
  <iframe id="*" src="staffdata.php?id=*" style="display: none;"></iframe>                                   
                                        
                                                    <button class="btn btn-small" onclick="printOtherPage('*')">
                                                        <i class="icon-envelope"></i>
                                                    </button><B>ALL RECORDS</b>
  <?php         
require_once'sql.php';
		$result=mysqli_query($con,"select * from login ");
while ($row =mysqli_fetch_array($result))
	{
?>  
                            
							  <div class="col-lg-6"">
                                        <div class="media user">
                                            <a class="media-avatar pull-left" href="#">
                                                <img src="images/user.png">
                                            </a>
                                            <div class="media-body">
                                                <h3 class="media-title">
                                                </h3>
                                                <p>
                                                    <b><?php echo $row['userid'];?><b></p>
													    <b><?php echo $row['Designation'];?><b>
                                                <div class="media-option btn-group shaded-icon">
           <iframe id="<?php echo $row['userid'];?>" src="staffdata.php?id=<?php echo $row['userid'];?>" style="display: none;"></iframe>                             
                                        
                                                    <button class="btn btn-small" onclick="printOtherPage('<?php echo $row['userid'];?>')">
                                                        <i class="icon-envelope"></i>
                                                    </button>
                                                    <a href="deleteuser.php?uid=<?php echo $row['userid'];?>">
													<button type="submit" class="btn btn-small">
                                                        <i class="icon-share-alt"><b> DELETE<b></i>
                                                    </button>
													</a>
                                                    <button type="button" onclick="updatemod('<?php echo $row['userid']; ?>','<?php echo $row['Designation'];?>','<?php echo $row['alias']; ?>')"  class="btn btn-primary">
                                                        <b>UPDATE<b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                   <?php
	}
	?> 							 
	     </div>
          </div>
                         
	<!--/.row-fluid-->
                                <br />
         </div>
        </div>		 
            </div>

              <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">CHANGE DETAILS</h4>
        </div>
        <div class="modal-body">
<input type="text" id="uname" disabled>      
<input type="text" id="de" disabled>      
<input type="text" id="ali" disabled>      
     
    <label for="psw"><b>DESIGNATION</b></label>
	<select NAME="incharge" id="incharge" required>
	<option value="STAFF" >STAFF</option>
		<option value="PROFESSOR">PROFESSOR</option>
	<option value="HOD">HOD</option>
	<option value="ASSISTANT">ASSISTANT</option>
	</select><br>
	<label for="email"><b>Alias Name</b></label>
    <input type="text" placeholder="Enter A-NAME" name="aid" id="aid" required>
    <br>
        <button type="button" class="btn btn-success" onclick="updatevalue()"><span class="spinner-border spinner-border-sm" id="load" style="display:none;"></span>update</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    </div> 
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy;  DEVOLOPED BY IT Department,PSG Tech</b>All rights reserved.
        </div>
    </div>
    <script type="text/javascript">
    function updatevalue()
    {
        document.getElementById('load').style.display="block";
          uname=document.getElementById('uname').value;
          des=document.getElementById('incharge').value;
          all=document.getElementById('aid').value;
    $.ajax({
  type: 'post',
  url: 'updatetime.php',
  data: {
   unamer:uname,
   designation:des,
   aid:all,
    },
  success: function (response) {
    if(response=="success")	
   {
	alert("UPDATED STAFF DETAILS");
  document.getElementById('load').style.display="none";
  window.location.assign("other-user-listing.php");	
  }
  else
  {
	alert("please try again");  
     document.getElementById('load').style.display="none";
  }
  }
  });
    }
    function updatemod(uname,des,alias)
    {
          $("#myModal").modal();
          document.getElementById('uname').value=uname;
          document.getElementById('de').value=des;
          document.getElementById('ali').value=alias;
    }
  function printOtherPage(ide) {
  document.getElementById(ide).contentWindow.window.print();
  }
</script>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
</body>
