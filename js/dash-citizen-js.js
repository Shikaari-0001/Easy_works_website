
$(document).ready(function(){
// post work on click 
$("#post_work").click(function(){ 
 var uid=$("#active_user").val(); 
  //  alert(uid);
 var problem=$("#problem").val();   
 var category=$("#category").val();   
 var location=$("#location").val();   
 var city=$("#city").val();
// url to send data 

 var action_url="dash-citizen-php.php?uid="+uid+"&problem="+problem+"&category="+category+"&location="+location+"&city="+city;   
 // ajax for post work
$.get(action_url,function(response){

if(response=="true")
    alert("work posted");

else
    alert("not posted");
    
});// ajax
      
});// post work on click    

// to add options in category
function add_options(){ 
var category=["Appliance Services/Repair","AC Service & Repair","Chimney Servicing & repair","Geyser Water tank Cleaning","Service & repair","Refrigerator Repair","TV Repair","Washing Machine Service & repair","Water Purifier Repair","Carpenter","Cleaning","Car Cleaning","Carpet cleaning","House cleaning","Pest Control","Sofa Cleaning","Water tank Cleaning","Electrician","Mason","Contractor","Painters","Plumber","Tiler"];  
var combo_category=document.getElementById("category");    
var add_category;  
 for(i=0;i<category.length;i++){
    add_category=document.createElement("option");
    add_category.setAttribute("class","modal-select-options")
    add_category.innerHTML=category[i];
    add_category.value=category[i];
    combo_category.appendChild(add_category); 
 }    
}// to add options
    
add_options(); 
    // to logout
        

});// ready