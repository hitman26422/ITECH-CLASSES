<?php
include('session.php');
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
	<link type="text/css" href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<style>
	    table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
	</style>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="mainpage.php">
			  	AUTOMATION
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav nav-icons">
						<li class="active"><a href="#">
							<i class="icon-envelope"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-eye-open"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-bar-chart"></i>
						</a></li>
					</ul>

					
					<ul class="nav pull-right">
						
						<li><a href="#">
							Welcome Admin
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
							<b>LOGOUT</b>	<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="sidebar">

						<ul class="widget widget-menu unstyled">
							<li class="active">
								<a href="mainpage.php">
									<i class="menu-icon icon-dashboard"></i>
									Dashboard
								</a>
							</li>
								</ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
                                <li><a href="form.php"><i class="menu-icon icon-paste"></i>Update Courses</a></li>
                                <li><a href="table.php"><i class="menu-icon icon-table"></i>LIST OF COURSES</a></li>
                                 </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									More Pages
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="other-user-listing.php">
											<i class="icon-inbox"></i>
											All Users
										</a>
									</li>
								</ul>
							</li>
							
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->


				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>COURSE DETAILS</h3>
							</div>
							<div class="module-body">
								<p>
									<strong>UG COURSES</strong>
								</p>
								<?php
require_once'sql.php';
		$result=mysqli_query($con,"select * from ugcourses ORDER BY semno ASC");
?>

								<table class="table">
			  <thead>
									<tr>
									  <th>#</th>
									  <th>COURSE ID</th>
									  <th>COURSE NAME</th>
									  <th>SEMSTER NO</th>
									</tr>
								  </thead>
								  <tbody>
<?php
$i=1;
	while ($row =mysqli_fetch_array($result))
	{
?>   	    
	   <tr><td><?php echo $i;?></td>
	   
<td>	<?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td><?php echo $row['semno'];?></td><td><a href="deletecourse.php?course=ugcourses&&cid=<?php echo $row['courseid'];?>"><button>DELETE</button></a></td></tr>
<?php
$i++;
	}
	?>
	</tbody>
	
		</table>

								<br />
								<!-- <hr /> -->
								<br />

			

			<p>
									<strong>UG Courses LAB</strong>
											</p>
								<?php
require_once'sql.php';
		$result=mysqli_query($con,"select * from ugcourseslab ORDER BY semno ASC");
?>



								<table class="table table-striped">
			  <thead>
									<tr>
									  <th>#</th>
									  <th>COURSE ID</th>
									  <th>COURSE NAME</th>
									  <th>SEMSTER NO</th>
									</tr>
								  </thead>
								  <tbody>
<?php
$i=1;
	while ($row =mysqli_fetch_array($result))
	{
?>   	    
	   <tr><td><?php echo $i;?></td>
	   
<td>	<?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td><?php echo $row['semno'];?></td>
<td><a href="deletecourse.php?course=ugcourseslab&&cid=<?php echo $row['courseid'];?>"><button>DELETE</button></a></td></tr>
<?php
$i++;
	}
	?>
	</tbody>
								  
								  
								  </table>

								<br />
								<!-- <hr /> -->
								<br />




								<p>
									<strong>UGOPEN ELECTIVE</strong>
								</p>
						<?php
require_once'sql.php';
		$result=mysqli_query($con,"select * from ugopenelective ORDER BY semno ASC");
?>		
		<table class="table table-bordered">
								  
 <thead>
									<tr>
									  <th>#</th>
									  <th>COURSE ID</th>
									  <th>COURSE NAME</th>
									  <th>SEMSTER NO</th>
									</tr>
								  </thead>
								  <tbody>
<?php
$i=1;
	while ($row =mysqli_fetch_array($result))
	{
?>   	    
	   <tr><td><?php echo $i;?></td>
	   
<td>	<?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td><?php echo $row['semno'];?></td>
<td><a href="deletecourse.php?course=ugopenelective&&cid=<?php echo $row['courseid'];?>"><button>DELETE</button></a></td></tr>
<?php
$i++;
	}
	?>
	</tbody>
			

								  </table>

								<br />
								<!-- <hr /> -->
								<br />



							<p>
									<strong>PG COURSES</strong>
								</p>
								<?php
require_once'sql.php';
		$result=mysqli_query($con,"select * from pgcourses ORDER BY semno ASC");
?>

								<table class="table">
			  <thead>
									<tr>
									  <th>#</th>
									  <th>COURSE ID</th>
									  <th>COURSE NAME</th>
									  <th>SEMSTER NO</th>
									</tr>
								  </thead>
								  <tbody>
<?php
$i=1;
	while ($row =mysqli_fetch_array($result))
	{
?>   	    
	   <tr><td><?php echo $i;?></td>
	   
<td>	<?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td><?php echo $row['semno'];?></td>
<td><a href="deletecourse.php?course=pgcourses&&cid=<?php echo $row['courseid'];?>"><button>DELETE</button></a></td></tr>
<?php
$i++;
	}
	?>
	</tbody>
	
		</table>

								<br />
								<!-- <hr /> -->
								<br />

			

			<p>
									<strong>PG Courses LAB</strong>
											</p>
								<?php
require_once'sql.php';
		$result=mysqli_query($con,"select * from pgcourseslab ORDER BY semno ASC");
?>



								<table class="table table-striped">
			  <thead>
									<tr>
									  <th>#</th>
									  <th>COURSE ID</th>
									  <th>COURSE NAME</th>
									  <th>SEMSTER NO</th>
									</tr>
								  </thead>
								  <tbody>
<?php
$i=1;
	while ($row =mysqli_fetch_array($result))
	{
?>   	    
	   <tr><td><?php echo $i;?></td>
	   
<td>	<?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td><?php echo $row['semno'];?></td>
<td><a href="deletecourse.php?course=pgcourseslab&&cid=<?php echo $row['courseid'];?>"><button>DELETE</button></a></td></tr>
<?php
$i++;
	}
	?>
	</tbody>
								  
								  
								  </table>

								<br />
								<!-- <hr /> -->
								<br />




								<p>
									<strong>PGOPEN ELECTIVE</strong>
								</p>
						<?php
require_once'sql.php';
		$result=mysqli_query($con,"select * from pgopenelective ORDER BY semno ASC");
?>		
		<table class="table table-bordered">
								  
 <thead>
									<tr>
									  <th>#</th>
									  <th>COURSE ID</th>
									  <th>COURSE NAME</th>
									  <th>SEMSTER NO</th>
									</tr>
								  </thead>
								  <tbody>
<?php
$i=1;
	while ($row =mysqli_fetch_array($result))
	{
?>   	    
	   <tr><td><?php echo $i;?></td>
	   
<td>	<?php echo $row['courseid'];?></td><td><?php echo $row['coursename'];?></td><td><?php echo $row['semno'];?></td>
<td><a href="deletecourse.php?course=pgopenelective&&cid=<?php echo $row['courseid'];?>"><button>DELETE</button></a></td></tr>
<?php
$i++;
	}
	?>
	</tbody>
			

								  </table>

								<br />
								<!-- <hr /> -->
								<br />


							</div>
						</div>





				<!--/.module-->

					<br />
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; DEVOLOPED BY IT Department,PSG Tech </b> All rights reserved.
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

</body>