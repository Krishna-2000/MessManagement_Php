<?php
session_start();
require_once "db.php";
    if (isset($_SESSION['roll_no'])) {
	$user = $_SESSION['username'];
	$roll_no = $_SESSION['roll_no'];
	$query = "UPDATE student_status SET status='Present' WHERE  roll_no= '$roll_no'";
	$roll_call = mysqli_query($con,$query) or die(mysql_error()); 
	
	if ($roll_call) 
	{   
		header("location: student_dash.php?user=$user");
	} else 
	{
		echo $mysqli->error;
	}
	
}
?>
