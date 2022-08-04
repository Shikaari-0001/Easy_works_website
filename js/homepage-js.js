$(document).ready(function(){

// sign up type button with ajax    
$("#sign_up_button").click(function(){
var username=$("#sign_up_username").val();    
var password=$("#sign_up_password").val();
var mobile=$("#sign_up_mobile").val();
var category="";
var radio_citizen,radio_worker;
 
// getting node of radio button with value citizen     
radio_citizen=document.getElementById("sign_up_citizen");
// getting node of radio button with value worker     
radio_worker=document.getElementById("sign_up_worker");  

if(radio_citizen.checked==true)//get value of radio btn citizen if checked
category=radio_citizen.value; 

if(radio_worker.checked==true)//get value of radio btn worker if checked
 category=radio_worker.value;   
 
 //alert(category);
// url where to send data for signup
var action_url="homepage-signup-php.php?sign_up_username="+username+"&sign_up_password="+password+"&sign_up_mobile="+mobile+"&sign_up_category="+category;    
//alert(action_url);
// send data to process file for signup     
$.get(action_url,function(response){

    if(response=="true"){
    //alert("ajax worked");
    $("#sign_up_msg").html("sign up");
    }
    else
        alert (response);
});// send data to process file for signup    
    
});// for sign up type button with ajax    
 
//login with ajax
$("#login_button").click(function(){
 var username=$("#login_username").val();
 var password=$("#login_password").val();
  // where to send data to login
 var action_url="homepage-login-php.php?login_username="+username+"&login_password="+password;
 // send data to login
 $.get(action_url,function(response){
    
     if(response=="false"){
        $("#login_msg").html("invalid id");
        }
     // if user is valid
     else{
        $("#login_msg").html(response);
         // if citizen logins
       if(response=="citizen"){
           // now to check if user is already  have updated its profile
           var action_url="choose-page-php.php?citizen=";
           $.get(action_url,function(response){
               alert(response);
               // if user already have saved profile
               if(response=="true"){
                   location.href="dash-citizen.php";
               }
               
               else{
                   location.href="profile-citizen-front.php";
               }
           
           });
           
           
       }// for citizen
        // if user is worker
       if(response=="worker"){
              var action_url="choose-page-php.php?worker=";
           $.get(action_url,function(response){
               alert(response);
               // if worker already have saved profile
               if(response=="true"){
                   location.href="dash-worker.php";
               }
               
               else{
                   location.href="Profile-worker-front.php";
               }
           
           });
           
       }     
     }
     
 });// send data to login 
    
});//login with ajax    
    
    
    
});// ready