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
?>

