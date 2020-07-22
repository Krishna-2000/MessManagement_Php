<html>
<head>
<meta charset="utf-8">

<link
rel="stylesheet" href="style.css"/>
</head>

<body>
<h1 >Welcome <?php echo $_SESSION['username']; ?>!</h1>
session_start();
<?php

require_once "reg.php";
$sql= " INSERT into warden (username,email,name,phone_no) values ('ses','ssf','ssg','ssh')";
$exec=mysqli_query($link,$sql);
if(!exec)
{
	die("Something went wrong.");
}
?>
</body>
</html>
