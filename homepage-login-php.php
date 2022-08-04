<?php
session_start();
include_once("required-files/connection.php");

$username=$_GET["login_username"];
$password=$_GET["login_password"];

$query="select * from users where uid='$username' AND pwd='$password' And status='1'";

$table=mysqli_query($dbcon,$query);
$category="category";
if(mysqli_num_rows($table)==1){
    $row=mysqli_fetch_array($table);
    echo $row[$category];
    $_SESSION["active_user"]=$username;
}

else
    echo "false";
    
?>