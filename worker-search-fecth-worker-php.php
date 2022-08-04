<?php
include_once("required-files/connection.php");

if(isset($_GET["city"]) && isset($_GET["category"])){
$city=$_GET["city"];
$category=$_GET["category"];

$query="select * from workers where city='$city' and category='$category'";
$table=mysqli_query($dbcon,$query);
$arry=array();
while($row=mysqli_fetch_array($table)){
    $arry[]=$row;
}

echo json_encode($arry);
}

if(isset($_GET["uid"])){
$uid=$_GET["uid"];        
$query="select * from workers where uid='$uid'";
$table=mysqli_query($dbcon,$query);
$arry=array();
while($row=mysqli_fetch_array($table)){
    $arry[]=$row;
}

echo json_encode($arry); 
    
}


?>