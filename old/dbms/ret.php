<?php
require "db.php";
session_start();
$user=$_SESSION['username'];
$sql="select * from security where username='".$user."'";
$exec=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exec);
	echo $result[0]." ".$result[1]." ".$result[2]."<br>";
?>