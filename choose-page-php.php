<?php
session_start();
include_once("required-files/connection.php");
// to check citizen
if(isset($_GET["citizen"])){
$uid=$_SESSION["active_user"];    
$query="select * from citizens where uid='$uid'";
$table=mysqli_query($dbcon,$query);
if(mysqli_num_rows($table)==1){
    echo "true";
    $_SESSION["btn_to_show"]="update";
}
    
else{
    echo "false";
    $_SESSION["btn_to_show"]="save";
}
}

// to check for worker in
if(isset($_GET["worker"])){
$uid=$_SESSION["active_user"];    
$query="select * from workers where uid='$uid'";
$table=mysqli_query($dbcon,$query);
if(mysqli_num_rows($table)==1){
    echo "true";
    $_SESSION["btn_to_show"]="update";
}
    
else{
    echo "false";
    $_SESSION["btn_to_show"]="save";
}
}

?>