<?php
$con = mysqli_connect("localhost","phpmyadmin","vichukichu","phpmyadmin");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="select date_string from save_date";
$exec=mysqli_query($con,$sql);
if(!$exec)
{
        die("Something went wrong.");
}
$row=mysqli_fetch_array($exec);
$d1=strtotime($row[0]);
$today=date("Y-m-d");
$d2=strtotime($today);
$diff=floor(($d2-$d1)/60/60/24);
if($diff>0)
{
	$sql="update student_status set status='Absent'";
	$exec=mysqli_query($con,$sql);
	if(!$exec)
	{
        die("Something went wrong.");
	}
	$sql="update save_date set date_string='".$today."'";
	$exec=mysqli_query($con,$sql);
	if(!$exec)
	{
        die("error updating database");
	}
}
?>
