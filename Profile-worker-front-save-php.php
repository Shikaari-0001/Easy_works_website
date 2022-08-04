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
$count=0;
$rating=0;

$query="insert into workers values ('$uid','$name','$contact','$shop_name','$city','$address','$state','$category','$specialization','$experience','$other_info','$aadhar_org_name','$profile_pic_org_name','$email','$rating','$count')";

$result=mysqli_query($dbcon,$query);

print_r ($result);
if($result){
 echo "profile saved";
 move_uploaded_file($aadhar_tmp_name,"uploads/".$aadhar_org_name);
 move_uploaded_file($profile_pic_temp_name,"uploads/".$profile_pic_org_name);
echo "<h2>File uploaded Successfully..</h2>";
    header("location:dash-worker.php");
}
else{ 
 echo "profile not saved";
    $error=mysqli_error($dbcon);
    echo $error;
}

?>