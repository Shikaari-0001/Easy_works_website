<?php
include_once("required-files/connection.php");
//get uid of worker
$uid=$_GET["uid"];

$query="select * from workers where uid='$uid'";

$table=mysqli_query($dbcon,$query);

$ary=array();
 
while($row=mysqli_fetch_array($table)){
    $ary[]=$row;
}

echo json_encode($ary);

?>