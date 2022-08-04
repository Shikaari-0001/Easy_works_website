$(document).ready(function(){
  
function add_options_combo(){

// add options in state combo box
var states = ["Andhra Pradesh","Arunachal Pradesh","Assam","Bihar","Chhattisgarh","Goa","Gujarat","Haryana","Himachal Pradesh","Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Odisha","Punjab","Rajasthan","Sikkim","Tamil Nadu","Telangana","Tripura","Uttar Pradesh","Uttarakhand","West Bengal","Andaman and Nicobar Islands","Chandigarh","Dadra & Nagar Haveli and Daman & Diu","Delhi","Jammu and Kashmir","Lakshadweep","Puducherry","Ladakh"];    

var combo_state=document.getElementById("state");    
var add_state;

for(i=0;i<states.length;i++){
    add_state=document.createElement("option");
    add_state.text=states[i];
    add_state.value=states[i];
    combo_state.add(add_state);
}    
 
var category=["Appliance Services/Repair","AC Service & Repair","Chimney Servicing & repair","Geyser Water tank Cleaning","Service & repair","Refrigerator Repair","TV Repair","Washing Machine Service & repair","Water Purifier Repair","Carpenter","Cleaning","Car Cleaning","Carpet cleaning","House cleaning","Pest Control","Sofa Cleaning","Water tank Cleaning","Electrician","Mason","Contractor","Painters","Plumber","Tiler"];  
var combo_category=document.getElementById("category");    
var add_category;  
 for(i=0;i<category.length;i++){
    add_category=document.createElement("option");
    add_category.innerHTML=category[i];
    add_category.value=category[i];
    combo_category.appendChild(add_category); 
 }
var combo_experience=document.getElementById("experience");    
var add_experience;    
 
for(i=0;i<50;i++){
    add_experience=document.createElement("option");
    add_experience.text=i+" Years";
    add_experience.value=i;
    combo_experience.appendChild(add_experience); 
 }
    
}// combo options
 
add_options_combo();    
    
// to fetch profile with json   // to be done 
//$("#fetch_profile").click(function(){
 (function fetch_profile(){   
 var uid=$("#active_user").val();
  $("#username").val(uid);
 var action_url="Profile-worker-front-fetch-php.php?uid="+uid;//from where to fetch data
 $.getJSON(action_url,function(json_ary){
    if(json_ary.length==1){
     // set json data to fields
     alert(json_ary);   
    $("#email").val(json_ary[0].email);    
    $("#worker_name").val(json_ary[0].name);    
    $("#contact").val(json_ary[0].contact);    
    $("#shop_name").val(json_ary[0].firmshop);    
    $("#city").val(json_ary[0].city);    
    $("#address").val(json_ary[0].address);    
    $("#state").val(json_ary[0].state);    
    $("#category").val(json_ary[0].category);    
    $("#specialization").val(json_ary[0].spl);    
    $("#experience").val(json_ary[0].exp);    
    $("#other_info").val(json_ary[0].otherinfo);    
    
        var apic=document.getElementById("preview_aadhar_card_pic");
       
        apic.setAttribute("src","uploads/"+json_ary[0].apic);  
        var ppic=document.getElementById("preview_profile_pic");
        
      ppic.setAttribute("src","uploads/"+json_ary[0].ppic);
   
    // set data in hidden field
     $("#h_field_aadhar_org_name").val(json_ary[0].apic);   
     $("#h_field_profile_pic_org_name").val(json_ary[0].ppic);   
       
    } 
 
     else
         alert("no profile found");
       
  var btn_to_show=$("#btn_to_show").val()
  alert(btn_to_show);
     
  if(btn_to_show=="save"){
      document.getElementById("worker_update").setAttribute("class","hidde-field")
  }
 if(btn_to_show=="update"){
      document.getElementById("worker_save").setAttribute("class","hidde-field") }    
      
        //$("#user_error").html("invalid id.");
     
 });// get json
 })();
    
    
//});// to fetch profile with json 
    
});// ready