<?php
require('db.php');
$student_rollno=$_POST['student_id'];
$guest_name=$_POST['name'];
$guest_rollno=$_POST['rollno'];
session_start();
$query="insert into guests(name,rollno,guestrollno) values('".$guest_name."','".$student_rollno."','".$guest_rollno."');";
$execute = mysqli_query($con,$query);
if(!$execute)
    {
        
        echo json_encode(['added'=>false]);
    }
else{
   
    echo json_encode(['added'=>true]);
}
?>