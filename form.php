<?php
include('session.php'); // Includes Login Script
require_once 'sql.php';
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType))
  {
		$tabletype=$_POST["ctype"];
        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $id = "";
                if(isset($Row[0])) {
                    $id = mysqli_real_escape_string($con,$Row[0]);
                }
       $coursename="";
                if(isset($Row[1])) 
				{
                    $coursename= mysqli_real_escape_string($con,$Row[1]);
                }
                
				$sem= "";
                if(isset($Row[2])) 
				{
                    $sem= mysqli_real_escape_string($con,$Row[2]);
                }
				
                $no= "";
                if(isset($Row[3])) 
				{
                    $no= mysqli_real_escape_string($con,$Row[3]);
                }
				
                if (!empty($id) &&!empty($coursename)&& !empty($sem)&& !empty($no))
					{ 
                    $query = "INSERT INTO `".$tabletype."`(`courseid`, `coursename`, `sem`, `semno`) values('".$id."','".$coursename."','".$sem."','".$no."')";
                    $result = mysqli_query($con, $query);
                
                    if ($result)
						{
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } 
					else 
					{
                        $type = "error";
                        $message = "Problem in Importing Excel Data check for Blank spaces/the CID may already included if want to replace then delete the data using list course";
                    }
                }
             }
        
  $file =$targetPath;
  unlink($file);
}
         }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>
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
	    #response {
    padding: 10px;
    margin-top: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
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
							Welcome ADMIN
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
            <b>LOGOUT</b>								<b class="caret"></b>
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
                                <li><a href="form.php"><i class="menu-icon icon-paste"></i>Update Courses </a></li>
                                <li><a href="table.php"><i class="menu-icon icon-table"></i>List Courses </a></li>
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
								<h3>Forms</h3>
							</div>
							<div class="module-body">

<?php 
if(isset($_GET['errupdate']))
{
	?>				<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Oh snap!</strong> COURSE ID EXITS /SOME ERROR OCCURED 
									</div>
									<?php
}
if(isset($_GET['update']))
{
?>
									
									<div class="alert alert-success">
																		<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Well done!</strong> Updated Sucessfully
									</div>
<?php
}
?>
									<br />

									<form class="form-horizontal row-fluid" method="POST" action="updatecourse.php">
										<div class="control-group">
											<label class="control-label" for="basicinput">COURSE ID</label>
											<div class="controls">
												<input type="text" name="courseid" id="basicinput" placeholder="Type something here..." class="span8" required>
												<span class="help-inline">Minimum 5 Characters</span>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Course NAME</label>
											<div class="controls">
												<input type="text" name="coursename" id="basicit" placeholder="course NAME" class="span8" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">SEMESTER NO</label>
											<div class="controls">
												<div class="input-prepend">
													<span class="add-on">#</span><input name="semno" class="span8" type="number_format" placeholder="Enter semeseter NO" required>       
												</div>										
										</div>
			</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">EVEN/ODD</label>
											<div class="controls">
											<div class="dropdown">
											<select class="dropdown-menu" name="semtype" role="menu" aria-labelledby="dLabel" required>
														<option value='ODD'>ODD</option>
														<option value='EVEN'>EVEN</option>
													</select>
											</div>
										</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Course Type</label>
											<div class="controls">
												<div class="dropdown">
													<select class="dropdown-menu" name="coursetype" role="menu" aria-labelledby="dLabel" required>
														<option value='ugcourses'>UGCOURSE</option>
														<option value='ugcourseslab'>UGCOURSELAB</option>
														<option value='ugopenelective'>UGOPEN ELECTIVE</option>
														<option value='pgcourses'>PGCOURSE</option>
													<option value='pgcourseslab'>PGCOURSELAB</option>
														<option value='pgopenelective'>PGOPENELECTIVE</option>
														
													</select>
												</div>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="course_submit" class="btn">Submit Form</button>
											</div>
										</div>
									</form>
						<H2>UPLOAD DIRECT EXCEL TO DB</H2>			   
									   <form action="form.php" class="form-horizontal row-fluid" method="post"     name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Choose file</label>
											<div class="controls">
					 <input type="file" name="file"id="file" accept=".xls,.xlsx"class="span8" required>
											</div>
										</div>
                    
				<div class="control-group">
											<label class="control-label" for="basicinput">Course Type</label>
											<div class="controls">
												<div class="dropdown">
										
					<select  class="dropdown-menu" name="ctype" required>
					<option value="ugcourses">UGTHEORY</option>
						<option value="ugcourseslab">UGLAB</option>
					<option value="ugopenelective">UGELECTIVE</option>
					<option value="pgcourses">PGTHEORY</option>
					<option value="pgcourseslab">PGLAB</option>
					<option value="pgopenelective">PGELECTIVE</option>
					</select>
					
					</div>
					</div>
					</div>
				
						<div class="control-group">
											<div class="controls">
                <button type="submit" id="submit" name="import"
                    class="btn">Import</button>
                    </div>
                    </div>
        
            </div>
        
        </form>
     <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
						<?php
    if(!isset($_POST["ctype"]))
	{
	}
	else
	{
	$sqlSelect = "SELECT * FROM ".$_POST["ctype"];
    $result = mysqli_query($con, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
        
         <table style="width:100%" class="table table-dark table-striped" id="mytable">
                 <thead>
            <tr>
                <th>cid</th>
                <th>cname</th>
				<th>semname</th>
                <th>no</th>

            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        <tbody>
        <tr>
		    <td><?php  echo $row['courseid']; ?></td>
            <td><?php  echo $row['coursename']; ?></td>
			     <td><?php  echo $row['sem']; ?></td>
            <td><?php  echo $row['semno']; ?></td>
       </tr>
<?php
    }
?>
        </tbody>
    </table>
<?php 
}
	} 
?>

							</div>
						</div>

						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy;  DEVOLOPED BY IT Department,PSG Tech </b> All rights reserved.
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>