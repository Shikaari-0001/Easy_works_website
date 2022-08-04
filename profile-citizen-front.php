<?php session_start();

if(isset($_SESSION["active_user"])==false)
   {
       header("location:homepage.php");
   }
?>
<html>
<head></head>
<script src="required-files/jquery-3.5.1.min.js"></script>


<script src="required-files/popper.min.js"></script>

<script src="required-files/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="required-files/bootstrap.min.css">


<!-- custum css-->
<link rel="stylesheet" type="text/css" href="profile-citizen-front-css.css">
<!-- custum js-->
<script src="profile-citizen-front-js.js"></script>
<script>
$(document).ready(function(){
    
      
// this function will get json data of citizen in table  citizens and set it in fields with ajax  
function fetch_profile(){
var username=$("#username").val();// get username from field
var action_url="profile-citizen-front-fetch-php.php?username="+username;    
// to get data from database
$.getJSON(action_url,function (json_ary){
// username is incorrect
if(json_ary.length==0){
   $("#user_error").html("inavild id");
}
    
else{
// set data to fields    
 $("#email").val(json_ary[0].email);
 $("#citizen_name").val(json_ary[0].name);
 $("#contact").val(json_ary[0].contact);
 $("#address").val(json_ary[0].address);
 $("#city").val(json_ary[0].city);
 $("#state").val(json_ary[0].state);
     
 var pic=document.getElementById("pic");
 pic.setAttribute("src","uploads/"+json_ary[0].pic);
  $("#h_field_pic").val(json_ary[0].pic);  
}    
    
});// get json data    
}// fetch profile

function show_btn(){
    var btn_to_show="<?php echo $_SESSION["btn_to_show"]?>";
        alert(btn_to_show);
    if(btn_to_show=="save"){
   document.getElementById("citizen_update").setAttribute("class","hidden-field");
    document.getElementById("username").value="<?php echo $_SESSION["active_user"]?>";
    fetch_profile();   
    }
    
    if(btn_to_show=="update"){   document.getElementById("citizen_save").setAttribute("class","hidden-field");
    document.getElementById("username").value="<?php echo $_SESSION["active_user"]?>";
    fetch_profile();                           
    }
}
show_btn();
});    
</script>
<body>

<div class="container">
<!-- form-->
 <form action="profile-citizen-front-save-php.php" method="post" enctype="multipart/form-data">
 <div class="row">
 <!-- for profile pic--><center>
  <div class="col-md-12">
      <img src="../uploads/call-of-duty-modern-warfare-ps4-playstation-4-1.original.jpg" class="img-responsive"
      id="pic" width="50%">
  </div></center>       
 </div>
 <br><br>
<div class="row">
<div class="col-md-3"></div>
 <div class="col-md-6"> 
   
   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text font-span" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input input-file" id="profile_pic" name="profile_pic" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label label-file" for="inputGroupFile01">Choose file</label>
  </div>
</div>
   
  <!-- <input type="file" name="profile_pic" name="profile_pic">  -->
 </div> 
 <div class="col-md-3"></div>   
</div>    
  
<div class="row">
  <div class="col-md-9">
   <!-- username-->
    <div class="form-group">
    <label class="font-label"><i class="las la-user icons"></i>Username</label>
    <input type="text" value="" class="form-control input-box" id="username" name="username">
    <span id="user_error">*</span>
  </div>
    
  </div> 
   
  <div class="col-md-3">
  <!-- to fetch profile-->
    <button type="button" id="fetch_profile" class="btn btn-primary hidden-field">Fetch Profile</button>  
  </div>
  </div>
<!-- 4 row having email-->
<div class="row">
 <div class="col-md-12">
    <!-- email-->
    <div class="form-group">
    <label class="font-label"><i class="las la-envelope icons border1"></i>Email address</label>
    <input type="email" class="form-control input-box" id="email" aria-describedby="emailHelp" name="email">
  </div> 
 </div>    
</div>     
    
<!-- 5 row having citizen name and mobile no-->   
<div class="row">
 <div class="col-md-6">
   <!-- citizen name-->
    <div class="form-group">
    <label class="font-label"><i class="las la-male icons"></i>Citizen Name</label>
    <input type="text" class="form-control input-box" id="citizen_name" name="citizen_name">
  </div>  
 </div>
 
<div class="col-md-6">
  <!-- contact no -->
    <div class="form-group">
    <label class="font-label"><i class="las la-phone icons"></i>Contact Number</label>
    <input type="text" class="form-control input-box" id="contact" name="contact">
  </div>   
</div>      
       
</div>

<!-- 6 row havinng address--->
<div class="row border1">
 <div class="col-md-12">
   <!-- address-->
   <div class="form-group">
    <label class="font-label "><i class="las la-home icons"></i>Address</label>
    <input type="text" class="form-control input-box" id="address" name="address">
  </div>  
       
 </div>    
</div>
<!-- 7 row have city and state-->
<div class="row">
 <div class="col-md-6">
   <!-- city -->
   <div class="form-group">
    <label class="font-label"><i class="las la-city icons"></i>City</label>
    <input type="text" class="form-control input-box" id="city" name="city">
  </div>    
 </div>
 
<div class="col-md-6">
  <!-- state-->
   <div class="form-group">
    <label class="font-label">State</label>
    <input type="text" class="form-control input-box" id="state" name="state">
  </div>    
 </div> 
</div>        
<!-- 8 row having save and update button-->
<div class="row">
 <div class="col-md-6">
  <input type="submit" class="btn btn-danger" value="Save" id="citizen_save">     
 </div>
 <div class="col-md-6">
  <input type="submit" class="btn btn-danger" value="Update" formaction="profile-citizen-front-update-php.php" id="citizen_update" >    
 </div>      
</div>
<!-- hidden fields-->
<input type="text" class="hidden-field" id="h_field_pic" name="h_field_pic">
</form>    
</div>



</body>
</html>