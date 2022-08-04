<?php
include_once("required-files/connection.php");
$worker_uid=$_GET["worker_uid"];
$citizen_uid=$_GET["citizen_uid"];

$query="select * from ratings where citizenuid='$citizen_uid' && workeruid='$worker_uid'";
$table=mysqli_query($dbcon,$query);
$row=mysqli_fetch_array($table);

//echo(mysqli_num_rows($table));
    
if(mysqli_num_rows($table)==0){

$query="insert into ratings (citizenuid,workeruid,rating) values ('$citizen_uid','$worker_uid','0')" ;

$result=mysqli_query($dbcon,$query);

echo mysqli_error($dbcon);

if($result!="")
    echo "true";
    
else
    echo "false";
}

else
  echo "sended";
?>