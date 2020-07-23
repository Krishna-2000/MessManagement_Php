<?php
require_once "db.php";
session_start();
if($_REQUEST['rollno'])
{
    $rollno=$_REQUEST['rollno'];
}
else
{
    $rollno=$_SESSION['rollno'];
}
$query="select * from students,guests where students.rollno='".$rollno."' and students.rollno=guests.rollno";
$result=mysqli_query($con,$query);
if(!$result)
{
            die("Some error occurred. <a href='login.php'>Go back</a>");
}
$guests=array();
while($row = mysqli_fetch_assoc($result))
{
    array_push($guests,$row);
}
$query="select * from students,extras where students.rollno='".$rollno."' and students.rollno=extras.rollno";
$result=mysqli_query($con,$query);
if(!$result)
{
            die("Some error occurred. <a href='login.php'>Go back</a>");
}
$extras=array();
while($row = mysqli_fetch_assoc($result))
{
    if(sizeof($row)>0)
    {
        array_push($extras,$row);
    }
}
$query="select * from students,mess_cuts where students.rollno='".$rollno."' and students.rollno=mess_cuts.rollno";
$result=mysqli_query($con,$query);
if(!$result)
{
            die("Some error occurred. <a href='login.php'>Go back</a>");
}
$messcuts=array();
while($row = mysqli_fetch_assoc($result))
{
    array_push($messcuts,$row);
}
echo json_encode(['guest'=>$guests,'extra'=>$extras,'messcut'=>$messcuts]);   

?>