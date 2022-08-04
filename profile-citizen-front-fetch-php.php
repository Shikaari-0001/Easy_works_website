<?php
include_once("required-files/connection.php");
$uid=$_GET["username"];

$query="select * from citizens where uid='$uid'";

$table=mysqli_query($dbcon,$query);// 1 or 0 record
$ary=array();

while($row=mysqli_fetch_array($table))
{
	
	$ary[]=$row;
}
echo json_encode($ary);


?>