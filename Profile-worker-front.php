<?php session_start();

if(isset($_SESSION["active_user"])==false)
   {
       header("location:homepage.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>

<script src="required-files/jquery-3.5.1.min.js"></script>


<script src="required-files/popper.min.js"></script>

<script src="required-files/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="required-files/bootstrap.min.css">
<!-- line awsome-->
<!--<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">-->
<!-- custom css-->
<link rel="stylesheet" type="text/css" href="css/Profile-worker-front.-css.css">

<!-- custom js-->

<script src="js/Profile-worker-front-js.js"></script>

<body>
<!--1 row having heading-->
<!--2 row having username-->
<form action="Profile-worker-front-save-php.php" method="post" enctype="multipart/form-data">
 <div class="container">
 
  <div class="row">   
   <div class="col-md-9">
<!-- username-->
    <div class="form-group">
    <label class="font-label"><i class="las la-user icons"></i>Username</label>
    <input type="text" class="form-control input-box" id="username" name="username" readonly>
    <span id="user_error">*</span>
  </div>     
   </div>   
               
<!--fetch profile
<div class="col-md-3">
 <button type="button" id="fetch_profile" class="btn btn-primary align-middle">Fetch Profile</button>     
</div>-->
 
 </div>
<!-- 3 row having email-->
<div class="row">
 <div class="col-md-12">
    <!-- email-->
    <div class="form-group">
    <label class="font-label"><i class="las la-envelope icons"></i>Email address</label>
    <input type="email" class="form-control input-box" id="email" aria-describedby="emailHelp" name="email">
  </div> 
 </div>    
</div>      
 
<!-- 4 row having worker name and conact no-->   
<div class="row">
 <div class="col-md-6">
   <!-- worker name-->
    <div class="form-group">
    <label class="font-label"><i class="las la-male icons"></i>Worker Name</label>
    <input type="text" class="form-control input-box" id="worker_name" name="worker_name">
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
 
<!-- 5 row have city and state-->
 <div class="row">
   <div class="col-md-6">
    <!-- state-->
    
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text label-font">State:</label>
  </div>
  <select class="custom-select input-select" name="state" id="state">
    <option selected>Choose...</option>
  </select>
</div>
      
   </div>
   
    <div class="col-md-6">
      <!-- city -->
    <div class="form-group">
    <label class="font-label">City</label>
    <input type="text" class="form-control input-box" id="city" name="city">
    </div>     
    
    </div>         
 </div>                                  
  
<!-- 6 row have category and firm shop name-->
  <div class="row">
    <div class="col-md-6 center-vertically">
      <!-- category -->
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text label-font">Category:</label>
  </div><br>
  <select class="custom-select input-select " name="category" id="category">
    <option selected>Choose...</option>
  </select>
</div>
      
    </div>  
     
      <div class="col-md-6">
       <!-- firm shop name-->
        <div class="form-group">
        <label class="font-label">Firm/Shop Name</label>
        <input type="text" class="form-control input-box" id="shop_name" name="shop_name">
        </div>    
      </div> 
  </div>                                                            
    
    <!-- 7 row have address-->
     <div class="row ">
      <div class="col-md-12">
   <!-- address-->
    <div class="form-group">
    <label class="font-label "><i class="las la-home icons"></i>Address</label>
    <input type="text" class="form-control input-box" id="address" name="address">
  </div>       
 </div>    
</div>                                                                
 
 <!-- 8 row have experince and spizilition-->
 <div class="row">
    <div class="col-md-6">
    <!-- experience-->
       <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text label-font">Experience</label>
  </div>
  <select class="custom-select input-select" name="experience" id="experience">
    <option selected>Choose...</option>
  </select>
</div>
   </div> 
   
    <div class="col-md-6">
       <!-- specialization-->
        <div class="form-group">
        <label class="font-label "><i class="las la-home icons"></i>Specialization</label>
        <input type="text" class="form-control input-box" id="specialization" name="specialization">
        </div>   
    </div>  
    </div>
 
 <!-- 9 row have pre worked or other info-->
 <div class="row">
    <div class="col-md-12">
      <!-- pre worked or other info -->
        <div class="form-group">
        <label class="font-label "><i class="las la-home icons"></i>Pre worked or other info</label>
        <input type="text" class="form-control input-box" id="other_info" name="other_info">
        </div>        
    </div>  
 </div>
 
 <!-- 10 row have upload addar card and upload profile pic-->
 <div class="row">
    <div class="col-md-6">
    <!-- aadhar carrd-->
    
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text font-span" id="inputGroupFileAddon01">Upload Aadhar Card</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input input-file"  aria-describedby="inputGroupFileAddon01" name="aadhar_card" id="aadhar_card">
    <label class="custom-file-label label-file" for="inputGroupFile01">Choose file</label>
  </div>
</div>
        
    </div>
    <!--profile pic-->
    <div class="col-md-6">      
     <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text font-span" id="inputGroupFileAddon01">Upload Profile Pic</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input input-file"  aria-describedby="inputGroupFileAddon01" name="profile_pic" id="profile_pic">
    <label class="custom-file-label label-file" for="inputGroupFile01">Choose file</label>
  </div>
</div>   
    </div> 
     
 </div>
 
 <!-- for preview aadharcard and profile pic-->
 <div class="row">
<div class="col-md-6">
    <img src="" id="preview_aadhar_card_pic" width="100px" height="100px">
</div>
<div class="col-md-6"></div>     
  <img src="" id="preview_profile_pic" width="100px" height="100px">   
 </div>
  <!-- buttons-->
<div class="row">
 <div class="col-md-6">
  <input type="submit" class="btn btn-danger" id="worker_save" value="Save">     
 </div>
 <div class="col-md-6">
  <input type="submit" class="btn btn-danger" value="Update" formaction="profile-worker-front-update-php.php" id="worker_update" >    
 </div>      
</div>    
 <!-- contaner-->
 </div>
 <!-- hidden fields-->
 <input class="hidde-field" type="text" name="h_field_aadhar_org_name" id="h_field_aadhar_org_name">       
 <input class="hidde-field" type="text" name="h_field_profile_pic_org_name" id="h_field_profile_pic_org_name"> 
 <input class="hidde-field" id="active_user" type="text" value="<?php echo $_SESSION["active_user"]?>">      
 <input class="hidde-field" id="btn_to_show" type="text" value="<?php echo $_SESSION["btn_to_show"]?>">      
</form> 
       
                                                       
                                                                
</body>
</html>