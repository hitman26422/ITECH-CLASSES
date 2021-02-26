<?php
include('session.php'); // Includes Login Script

require_once 'sql.php';

if (isset($_POST["pid"]))
{
$id=$_POST["pid"];
$uid=$_POST["userid"];
$query ="update allotment set alloted='".$uid."' where u_pref='".$id."'";
if(mysqli_query($con,$query))
{
   echo "success"; 
}
}
if (isset($_POST["types"]))
{
  $data=$_POST["list"];
  $List=json_decode(stripslashes($data));
  $finalquery="";
  foreach($List as $i)
  {
  $query="select Unique_Prefrenece_no,preference,courseid from preference where UNid='".$i."' and  userid='".substr($i,0,5)."' and year(preference.date)=year(CONVERT('".$_SESSION['setyear']."', DATE))";
  $result=mysqli_query($con,$query);
      $preference=1;
    if(mysqli_num_rows($result)==0)
    {
    $preference=0;
    }
    $row =mysqli_fetch_array($result);
    if($preference!=0)
   $finalquery.="INSERT INTO `allotment`(`u_pref`, `preference`, `alloted`, `courseid`,`date`) VALUES ('".$row['Unique_Prefrenece_no']."','".$row['preference']."','".substr($i,0,5)."','".$row['courseid']."','".$_SESSION['setyear']."');";
   else
 $finalquery.="INSERT INTO `allotment`(`u_pref`, `preference`, `alloted`, `courseid`,`date`) VALUES ('".$row['Unique_Prefrenece_no']."',0,'".substr($i,0,5)."','".substr($i,5)."','".$_SESSION['setyear']."');";
  }
  if($con->multi_query($finalquery)===TRUE)
  {
   echo "success";
  }
} 
?>


