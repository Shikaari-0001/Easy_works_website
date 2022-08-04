<?php
include_once("required-files/connection.php");
// get data of citizen userid is not takken as it sholud not be updated
$uid=$_POST["username"];
$email=$_POST["email"];
$name=$_POST["citizen_name"];
$contact=$_POST["contact"];
$address=$_POST["address"];
$city=$_POST["city"];
$state=$_POST["state"];
// get pic 
$tmp_name=$_FILES["profile_pic"]["tmp_name"];
$org_name=$_FILES["profile_pic"]["name"];
//hidden field of previous profile pic org name
$h_field_pic=$_POST["h_field_pic"];

if($org_name=="")// if user does not change pic
 $pic=$h_field_pic;

else{   // if user change pic 
    $pic=$org_name;
    move_uploaded_file($tmp_name,"uploads/".$org_name);
}

$query="update citizens set email='$email',name='$name',contact='$contact',address='$address',city='$city',state='$state',pic='$pic' where uid='$uid'";

$result=mysqli_query($dbcon,$query);

if(mysqli_affected_rows($dbcon)==1 ){
    echo "done";
    header("location:dash-citizen.php");
}

if(mysqli_error($dbcon)==""){
    echo "han bi";
    header("location:dash-citizen.php");
}
?>