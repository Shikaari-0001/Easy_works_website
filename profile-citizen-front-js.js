$(document).ready(function (){
//which btn to show save or update
  
  
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

    
/*
$("#citizen_update").click(function(){
    
});    
 */   
    
});// ready