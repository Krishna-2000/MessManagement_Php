<?php
require('db.php');
$staff_name=$_POST['name'];
$phone_no=$_POST['phoneno'];
$mess_id=$_SESSION['mess_id'];
session_start();
$query="insert into staff(name,phoneno,mess_id) values('".$staff_name."',".$phone_no.",'".$mess_id."');";
$execute = mysqli_query($con,$query);
echo $execute;
if(!$execute)
    {
        
        echo json_encode(['added'=>false]);
    }
else{
   
    echo json_encode(['added'=>true]);
}
?>