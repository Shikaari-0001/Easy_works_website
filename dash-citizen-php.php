<?php
include_once("required-files/connection.php");
$uid=$_GET["uid"];
$problem=$_GET["problem"];
$category=$_GET["category"];
$location=$_GET["location"];
$city=$_GET["city"];

$query="insert into requirements (cust_uid,category,problem,location,city,dop) values ('$uid','$category','$problem','$location','$city',CURDATE())";

$result=mysqli_query($dbcon,$query);
//echo mysqli_error($dbcon);

if($result!="")
    echo "true";

else
    echo "false";

?>