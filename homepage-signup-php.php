<?php
include_once("required-files/connection.php");
$uid=$_GET["sign_up_username"];
$pwd=$_GET["sign_up_password"];
$mobile=$_GET["sign_up_mobile"];
$category=$_GET["sign_up_category"];
$status=1;

$query="insert into users values ('$uid','$pwd','$mobile','$category',CURDATE(),'$status')";

//$query="insert into users values ('test','test','123','',CURDATE())";

$result=mysqli_query($dbcon,$query);
$error=mysqli_error($dbcon);
if($result!="")
    echo "true";

else
    echo $error;

?>