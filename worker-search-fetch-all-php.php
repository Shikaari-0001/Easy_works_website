<?php
include_once("required-files/connection.php");

// to give  all distinct city
if(isset($_GET["city"])){

$query="select distinct city from workers";

$table=mysqli_query($dbcon,$query);

$arry=array();

while($row=mysqli_fetch_array($table)){
    $arry[]=$row;
   // print_r($row);
}

echo json_encode($arry);
}

// to give  all distinct city
if(isset($_GET["category"])){

$query="select distinct category from workers";

$table=mysqli_query($dbcon,$query);

$arry=array();

while($row=mysqli_fetch_array($table)){
    $arry[]=$row;
   // print_r($row);
}

echo json_encode($arry);
}


?>