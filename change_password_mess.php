<?php
session_start();
require "db.php";
$current=$_REQUEST['current'];
$mess_id=$_SESSION['mess_id'];
$query="select * from messes where mess_id='".$mess_id."';";
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
    $query="update messes set password='".$new."' where mess_id='".$mess_id."';";
$execute = mysqli_query($con,$query);
if(!$execute)
    {
        echo json_encode(['changed'=>false,'error'=>'Some error occurred']);
        return;
    }
    echo json_encode(['changed'=>true]);
    
}

?>