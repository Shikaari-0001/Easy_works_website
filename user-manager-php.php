<?php
include_once("required-files/connection.php");
// to fetch users
if(isset($_GET["get_user"])){
    
$user=$_GET["get_user"];
if($user=="all"){
$query="select * from users";
$table=mysqli_query($dbcon,$query);    
$arry= array();

while($row=mysqli_fetch_array($table)){
$arry[]=$row;    
}

echo json_encode($arry);
}

else{
 $query="select * from users where category='$user'";
$table=mysqli_query($dbcon,$query);    
$arry= array();

while($row=mysqli_fetch_array($table)){
$arry[]=$row;    
}

echo json_encode($arry);   
    
}
    
}// isset

// if user send request to block user
if(isset($_GET["block"])){
$uid=$_GET["uid"];    
$query="update users set status=0 where uid='$uid'";
$result=mysqli_query($dbcon,$query);
if($result!="")
echo "blocked";
    
}

if(isset($_GET["unblock"])){
$uid=$_GET["uid"];    
$query="update users set status=1 where uid='$uid'";
$result=mysqli_query($dbcon,$query);
if($result!="")
echo "unblocked";
    
}

if(isset($_GET["remove"])){
$uid=$_GET["uid"];   
$query="update users set status=0 where uid='$uid'";
$result=mysqli_query($dbcon,$query);
if($result!="")
echo "removed";
    
}
?>