<?php
require('db.php');
$rollno=$_POST['student_id'];
$item=$_POST['item'];
$price=$_POST['price'];
session_start();
$query="insert into extras(rollno,item,price) values('".$rollno."','".$item."',".$price.");";
$execute = mysqli_query($con,$query);
if(!$execute)
    {
        
        echo json_encode(['added'=>false]);
    }
else{
   
    echo json_encode(['added'=>true]);
}
?>