<?php
session_start();
require "db.php";
$current=$_REQUEST['current'];
$rollno=$_SESSION['rollno'];
$query="select * from students where rollno='".$rollno."';";
$execute = mysqli_query($con,$query);
if(!$execute)
    {
        echo json_encode(['changed'=>false,'error'=>'Some error occurred']);
        return;
    }
$row = mysqli_fetch_assoc($execute);
if($row['password']!=$current)
{
    echo json_encode(['changed'=>false,'error'=>'Current password wrong']);
    return;
}
else{
    $new=$_REQUEST['new'];
    if(strlen($new)<6)
    {
        echo json_encode(['changed'=>false,'error'=>'Minimum 6 characters required']);
        return;
    }
    $query="update students set password='".$new."' where rollno='".$rollno."';";
$execute = mysqli_query($con,$query);
if(!$execute)
    {
        echo json_encode(['changed'=>false,'error'=>'Some error occurred']);
        return;
    }
    echo json_encode(['changed'=>true]);
    
}

?>