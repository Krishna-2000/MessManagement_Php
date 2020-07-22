<?php
require_once "db.php";
session_start();
$mess_id=$_SESSION['mess_id'];
$query="select * from staff where staff.mess_id='".$mess_id."'";
$result=mysqli_query($con,$query);
if(!$result)
{
            die("Some error occurred. <a href='login.php'>Go back</a>");
}
$staffs=array();
while($row = mysqli_fetch_assoc($result))
{
    array_push($staffs,$row);
}

echo json_encode(['staff'=>$staffs]);   

?>