<?php
$server='localhost';
$user='phpmyadmin';
$pass='vichukichu';
$db='phpmyadmin';
/* Attempt to connect to MySQL database */
$link = mysqli_connect($server,$user,$pass,$db);
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql="select name from checker";
$exec=mysqli_query($link,$sql);
if(!exec)
{
	die("Something went wrong.");
}
$row=mysqli_fetch_array($exec);
echo $row[0];
$row=mysqli_fetch_array($exec);
echo $row[0];

?>

