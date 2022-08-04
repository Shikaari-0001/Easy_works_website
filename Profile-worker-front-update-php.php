<?php
include_once("required-files/connection.php");

// get all data of user
$uid=$_POST["username"];
$email=$_POST["email"];
$name=$_POST["worker_name"];
$contact=$_POST["contact"];
$state=$_POST["state"];
$city=$_POST["city"];
$category=$_POST["category"];
$shop_name=$_POST["shop_name"];
$address=$_POST["address"];
$experience=$_POST["experience"];
$specialization=$_POST["specialization"];
$other_info=$_POST["other_info"];
// files
$aadhar_tmp_name=$_FILES["aadhar_card"]["tmp_name"];
$aadhar_org_name=$_FILES["aadhar_card"]["name"];
$profile_pic_org_name=$_FILES["profile_pic"]["name"];
$profile_pic_temp_name=$_FILES["profile_pic"]["tmp_name"];
//hidden field for file updation
$h_field_aadhar_org_name=$_POST["h_field_aadhar_org_name"];
$h_field_profile_pic_org_name=$_POST["h_field_profile_pic_org_name"];

// if user did't change aadhar card pic
if($aadhar_org_name=="")
    $aadhar_pic=$h_field_aadhar_org_name;

else{
 move_uploaded_file($aadhar_tmp_name,"uploads/".$aadhar_org_name);
    $aadhar_pic=$aadhar_org_name;
}
//if user did't change profile pic
if($profile_pic_org_name=="")
    $pic=$h_field_profile_pic_org_name;

else{
 move_uploaded_file($aadhar_tmp_name,"uploads/".$profile_pic_org_name);
    $pic=$profile_pic_org_name; 
}
$query="update workers set name='$name',contact='$contact',firmshop='$shop_name',city='$city',address='$address',spl='$specialization',exp='$experience',apic='$aadhar_pic',ppic='$pic',email='$email' where uid='$uid'";

$result=mysqli_query($dbcon,$query);


if(mysqli_affected_rows($dbcon)==1 ){
 header("location:dash-worker.php");
    //echo "done";
}

if(mysqli_error($dbcon)==""){
   // echo "han bi";
  header("location:dash-worker.php");
}
?>