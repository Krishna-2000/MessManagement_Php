<?php
require('db.php');
session_start();
$staff_name=$_POST['name'];
$phone_no=$_POST['phoneno'];
if(!is_numeric($phone_no))
{
    echo json_encode(['added'=>false,'error'=>"Phone number should be numeric"]);
    return;
}
$mess_id=$_SESSION['mess_id'];
$query="insert into staff(name,phoneno,mess_id) values('".$staff_name."',".$phone_no.",'".$mess_id."');";
$execute = mysqli_query($con,$query);
if(!$execute)
    {
        
        echo json_encode(['added'=>false,'error'=>mysqli_error($con)]);
    }
else{
   
    echo json_encode(['added'=>true]);
}
?>