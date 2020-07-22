<?php
require('db.php');
session_start();
$id = $_REQUEST['id'];
$query = "delete from staff where staff.id='".$id."';";
$exec = mysqli_query($con,$query);
if(!$exec)
{
    echo json_encode(['deleted'=>false]);
} 
else
{
    echo json_encode(['deleted'=>true]);   
}
?>