$(document).ready(function(){
// ajax send request in rating table
$("#send_request").click(function(){
var citizen_uid=$("#citizen_uid").val();
var worker_uid=$("#active_user").val();
// where to send data
var action_url="dash-worker-php.php?citizen_uid="+citizen_uid+"&worker_uid="+worker_uid;
    //alert(action_url);

$.get(action_url,function(response){
    if(response=="true")
        alert("request send");
    
    else if(response=="sended")
       alert("can't send request again");
    
    else
        alert("request not send");
    
}); // ajax   
    
});// ajax send request in rating table    
    
});// ready