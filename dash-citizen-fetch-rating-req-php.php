<?php
include_once("required-files/connection.php");
// fetch ratiing req
if(isset($_GET["fetch_rating_req"])){
$uid=$_GET["uid"];    
$query="select * from ratings where citizenuid='$uid' and rating='0' ";
$table=mysqli_query($dbcon,$query);
$arry=array();
while($row=mysqli_fetch_array($table)){
    $arry[]=$row;
}    
echo json_encode($arry);    
}
//***********************************************************************
// to rate worker

if(isset($_GET["rate"])){
$rate=$_GET["rate"];
$worker_uid=$_GET["worker_uid"];     
$citizen_uid=$_GET["citizen_uid"];

    
$query="update workers set rating=rating+'$rate',count=count+'1' where uid='$worker_uid'";
    
$result=mysqli_query($dbcon,$query);
    
if(mysqli_affected_rows($dbcon)){

$query="update ratings set rating='$rate' where citizenuid='$citizen_uid' and workeruid='$worker_uid'";
$result=mysqli_query($dbcon,$query);
    
$query="select * from ratings where citizenuid='$citizen_uid' and rating='0' ";
$table=mysqli_query($dbcon,$query);
$arry=array();
while($row=mysqli_fetch_array($table)){
    $arry[]=$row;
}    
echo json_encode($arry);    
}
}// rate isset
//****************************************************************************
?>