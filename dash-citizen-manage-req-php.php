<?php
include_once("required-files/connection.php");
if(isset($_GET["uid"]) && isset($_GET["fetch"])){
$uid=$_GET["uid"];

$query="select * from requirements where cust_uid='$uid'";
$table=mysqli_query($dbcon,$query);
$arry=array();
while($row=mysqli_fetch_array($table)){
    $arry[]=$row;
}

echo json_encode($arry);
}

if(isset($_GET["rid"]) && isset($_GET["uid"])){
$rid=$_GET["rid"];
$uid=$_GET["uid"];    
$query="delete from requirements where rid='$rid'";    
$result=mysqli_query($dbcon,$query);

if(mysqli_affected_rows($dbcon)==1){
$query="select * from requirements where cust_uid='$uid'";
$table=mysqli_query($dbcon,$query);
$arry=array();
while($row=mysqli_fetch_array($table)){
    $arry[]=$row;
}

echo json_encode($arry);  
}
    
    
}
?>