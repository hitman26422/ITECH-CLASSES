<?php
include('session.php'); // Includes Login Script
require_once 'sql.php';

if (isset($_POST["import"]))
{
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType))
  {
   $ext= pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
   	    $targetPath = "uploads/result.".$ext;
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);        
        $file =$targetPath;
  }
}
?>
<style>
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
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>

<button class="open-button" onclick="openResult()">update Result</button>

<div class="form-popup" id="result">
  <form action="test.php"  method ="post" enctype="multipart/form-data" class="form-container">
    <h1>Result Update</h1>

    <label for="result"><b>RESULT UPDATE</b></label>
						 <input type="file" name="file" id="file" accept=".xls,.xlsx"class="span8">

    <button type="submit" class="btn" name="import">Upload</button>
    <button type="button" class="btn cancel" onclick="closeResult()">Close</button>
  </form>
</div>

<script>
function openResult() {
  document.getElementById("result").style.display = "block";
}

function closeResult() {
  document.getElementById("result").style.display = "none";
}
</script>

</body>
</html>
