<?php
session_start();
include_once("required-files/connection.php");
// get all info of citizen
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


// query to insert in table citizens
// table  uid,name,contact,address,city,state,pic,email
$query="insert into citizens values ('$uid','$name','$contact','$address','$city','$state','$org_name','$email')";

$result=mysqli_query($dbcon,$query);

//print_r ($result);
if($result){
 echo "profile saved";
 move_uploaded_file($tmp_name,"uploads/".$org_name);
echo "<h2>File uploaded Successfully..</h2>";
    header("location:dash-citizen.php");
    $_SESSION["btn_to_show"]="update";
}
else{ 
 echo "profile not saved";
    $error=mysqli_error($dbcon);
    echo $error;
}
?>