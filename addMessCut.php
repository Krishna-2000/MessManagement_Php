<?php
require('db.php');
$from=$_POST['from_date'];
$to=$_POST['to_date'];
$no_of_days=$_POST['no_of_days'];
session_start();
$query="insert into mess_cuts(rollno,from_date,to_date,no_of_days) values('".$_SESSION['rollno']."','".$from."','".$to."',".$no_of_days.");";
$execute = mysqli_query($con,$query);
if(!$execute)
    {
        
        echo json_encode(['added'=>false]);
    }
else{
   
    echo json_encode(['added'=>true]);
}
?>