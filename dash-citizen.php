<?php session_start(); 

if(isset($_SESSION["active_user"])==false)
   {
       header("location:homepage.php");
   }
  
  

?>
<html>
<head>
    <meta>
    <title></title>
 
  

<script src="required-files/angular.min.js"></script>
<script src="required-files/jquery-3.5.1.min.js"></script>


<script src="required-files/popper.min.js"></script>
<!-- custom js-->

<script src="js/dash-citizen-js.js"></script> 

<script src="required-files/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="required-files/bootstrap.min.css">
<!-- font awsome--> 
 <link rel="stylesheet" href="required-files/font-awesome-4.7.0/css/font-awesome.min.css">
<!-- custom css-->
    <link rel="stylesheet" type="text/css" href="css/dash-citizen-css.css">


<!-- angular code-->
<script>
    var module=angular.module("ourmodule",[]);
    module.controller("controller",function($scope,$http){
       // alert();
    $scope.all_req_json;
        // for work posted by citizen
    $scope.show_all_req=function(){
       var active_user=document.getElementById("active_user").value;
       // alert(active_user);
    $http.get("dash-citizen-manage-req-php.php?uid="+active_user+"&fetch=").then(ok,not_ok);
    function ok(response){
        alert (JSON.stringify(response.data));
        $scope.all_req_json=response.data;
        // to hide no work posted
         document.getElementById("no_work_posted").classList.add("hidden-field");
        
        if(response.data.length==0){
            $scope.all_req_json=response.data;
      document.getElementById("no_work_posted").classList.remove("hidden-field");
        }
    }
    function not_ok(response){
        alert();
    }    
    }; //show all req function   
     
    $scope.delete_req=function( rid ){
        //alert(rid);
         var active_user=document.getElementById("active_user").value;
    $http.get("dash-citizen-manage-req-php.php?rid="+rid+"&uid="+active_user).then(ok,not_ok);    
      function ok(updated_response){
          alert (JSON.stringify(updated_response.data));
          if(updated_response.data!=""){ 
          $scope.all_req_json=updated_response.data;
              document.getElementById("no_work_posted").classList.add("hidden-field");
          }
          else{
           $scope.all_req_json=updated_response.data; document.getElementById("no_work_posted").classList.remove("hidden-field"); 
          }
      }
      function not_ok(updated_response){
          
          alert("no");
      }    
        
    };    
     // to fetch rating req 
    $scope.fetch_rating_req=function(){
        //alert($scope.rate_uid_citizen)
        var active_user=document.getElementById("active_user").value;
        alert(active_user);
        $http.get("dash-citizen-fetch-rating-req-php.php?fetch_rating_req=&uid="+active_user).then(ok,not_ok);
        function ok(response){
           
            $scope.rating_req_json=response.data;
             alert (JSON.stringify($scope.rating_req_json));
            if(response.data.length==0)
                {
                    alert("no rating requests");
                }
        }
        function not_ok(response){
            alert();
        }
    };    
     // rate the worker
    $scope.rate_worker=function(index){
      //alert(index);
        $scope.rated_index=document.getElementById("index").value;
        $scope.rating=document.getElementById("rating").value;
        // to make hiiden fiels empty again
        if($scope.rated_index!="" && $scope.rating!="")
        document.getElementById("rating").value="";
        document.getElementById("index").value="";
        // to check user is clicking on right done button
        if($scope.rated_index==index && $scope.rating!=""){
       
      $scope.worker_uid=$scope.rating_req_json[index].workeruid;
      $scope.citizen_uid=$scope.rating_req_json[index].citizenuid;
    //alert( $scope.worker_rated);
    $http.get("dash-citizen-fetch-rating-req-php.php?rate="+$scope.rating+"&worker_uid="+$scope.worker_uid+"&citizen_uid="+$scope.citizen_uid).then(ok,not_ok);
    function ok(response){
        alert (JSON.stringify(response.data));
        $scope.rating_req_json=response.data;
    }    
    function not_ok(){}    
    }// checking index
    
    else{
    alert("please select rating first");
    var all_stars=document.querySelectorAll(".fa");
        // to make stars blank again if user click  on wrong done button or rating in empty
        for(i=0;i<all_stars.length;i++){
            all_stars[i].setAttribute("class","fa fa-star-o")
        }
    }
    };    
     
    $scope.click_star=function(index,star_num){
       // alert(star_num);
        //alert(index);
       var all_stars=document.querySelectorAll(".fa");
        //to clear all previous stars
         alert(parseInt(all_stars.length));
        for(i=0;i<all_stars.length;i++){
            all_stars[i].setAttribute("class","fa fa-star-o")
        }
         
        alert(parseInt(all_stars.length));
        var star_row=index;
       //alert(star_row);
        var starting_star=star_row*5;
       // alert(starting_star);
        var star_no;
       for(i=0;i<parseInt(star_num);i++){
           //alert((starting_star+i)+"start"+(star_num));
           star_no=parseInt(starting_star)+i;
         all_stars[star_no].setAttribute("class","fa fa-star");
       }
         document.getElementById("rating").value=star_num; 
         document.getElementById("index").value=index; 
        
    };    
        
    });//controller
    
</script>
</head>
<body class="" ng-app="ourmodule" ng-controller="controller">
 
                
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <a href="logout.php">
    <button class="btn btn-primary btn-nav-custom">
    <!--    <i class="fa fa-sign-out icon-nav" aria-hidden="true"></i>-->
        Logout
    </button>
   </a>

  </div>
</nav>
            
<br><br>
     <div class="container">
<!-- 1 row have 3 cards-->
    <div class="row">
        <div class="col-md-4 col-sm-6">
          <!-- 1 card profile update-->
          
        <div class="card-group ">
  <div class="card "><center>
    <img src="images/Capture.PNG" class="card-img-top card-pic"  alt="...">
    </center>
    <div class="card-body">
      <h5 class="card-title">Update Profile</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p><center>
      <a href="profile-citizen-front.php">
      <button class="btn cust-btn-card" >Update</button></a></center>
    </div>     
    </div>   
    </div>   
      </div>
      <br><br>
<!- 2 card post work -->
<div class="col-md-4 col-sm-6 ">
          <!-- post  work -->   
        <div class="card-group">
      <div class="card"><center>
    <img src="images/Capture.PNG" class="card-img-top card-pic"  alt="...">
    </center>
         <div class="card-body">
      <h5 class="card-title">Find Worker</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div><center> <a href="worker-search.php">   
      <button class="btn cust-btn-card" data-toggle="modal" data-target="#post_work_modal" >Find Worker</button></a></center> 
      </div>   
    </div>
    </div><br><br>
   <!-- 3 card have manage work-->
  <div class="col-md-4 col-sm-6">
    <div class="card-group">
      <div class="card"><center>
    <img src="images/Capture.PNG" class="card-img-top card-pic"  alt="...">
    </center>
         <div class="card-body">
      <h5 class="card-title">Post Work</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
         <center>
           <button class="btn cust-btn-card" data-toggle="modal" data-target="#post_work_modal">Post Work</button></center>
          </div>     
      </div>   
    </div>
  </div><br><br>
   
   </div>
<!-- 3 row-->

 <div class="row">
     <!-- 2 row 1 card reqments manger-->
     <div class="col-md-4 col-sm-6 ">
         <div class="card-group">
      <div class="card"><center>
    <img src="images/Capture.PNG" class="card-img-top card-pic"  alt="...">
    </center>
         <div class="card-body">
      <h5 class="card-title">Requirements Manager</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
         
         <center><button type="button" class="btn cust-btn-card" data-toggle="modal" data-target="#staticBackdrop" ng-click="show_all_req()">See all Posts</button>  </center>
          </div>
             
<!--      <button data-toggle="modal" data-target="#post_work_modal" >Update</button>-->
      </div>   
    </div>     
     </div><br><br>
     
     <!-- 2 row 2 card rate the worker-->
      <div class="col-md-4 col-sm-6">
             <div class="card-group">
      <div class="card"><center>
    <img src="images/Capture.PNG" class="card-img-top card-pic"  alt="...">
    </center>
         <div class="card-body">
      <h5 class="card-title">Rate the worker</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
         
         <center> <button class="btn cust-btn-card" data-toggle="modal" data-target="#rate_worker" ng-click="fetch_rating_req();" >Rate the worker</button></center>
          </div>     
     
      </div>   
    </div>
          
          
      </div><br><br>
  </div> 
<!-- modals-->
<!-- post work modal-->
               
<div class="modal fade" id="post_work_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog cust-modal">
    <div class="modal-content cust-modal">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Post Work</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="modal-cross">&times;</span>
        </button>
      </div>
      <div class="modal-body erase-line">   
    <!--problem-->
      <div class="form-group">
    <label for="exampleFormControlTextarea1" class="modal-input-lable">What is your Problem/fault</label>
    <textarea class="form-control modal-input" id="problem" name="problem" rows="3"></textarea>
  </div>
       
       <!-- category-->
       <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text modal-select-lable" for="inputGroupSelect01">Category:</label>
  </div>
  <select class="custom-select modal-select" id="category" name="category">
  </select>
</div>        
       <!-- location-->
       <div class="form-group">
    <label class="modal-input-lable">Location Of Task</label>
    <input type="text" class="form-control modal-input" id="location" name="location" aria-describedby="emailHelp">
  </div>    
   <!-- city-->
      <div class="form-group">
    <label class="modal-input-lable">City</label>
    <input type="text" class="form-control modal-input" id="city" name="city" aria-describedby="emailHelp">
  </div>    
                                   
      </div>
      <div class="modal-footer">

    <button type="button" class="btn btn-primary cust-btn" id="post_work">Post Work</button>        
      </div>
    </div>
  </div>
</div>                                             
 <!-- post work modal end-->
 
  <!-- requirments modal start -->
  <div class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl" style="width:1250px;">
    <div class="modal-content cust-modal">
      <div class="modal-header"><center>
        <h4 class="modal-title" id="staticBackdropLabel">Work Posted</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="modal-cross" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
           <!-- 1 row--><!--
            <div class="row">
             <div class="col-md-12">
              <div class="form-group">
      <label for="exampleInputPassword1">User Id</label>
      <input type="text" class="form-control">
          </div>  
           </div>
            </div>
           <!-- 2 row
         <div class="row">
             <div class="col-md-12">
                 <button class="btn btn-primary" ng-click="show_all_req()">fetch all</button>
             </div>
         </div>--> 
         <div class="row">
          <div class="col-md-12">  
        <table width="100%" class="req-manger">
           <!-- for table heading-->
           <tr>
               <th class="modal-table-heading">Date Of Posting</th>
               <th class="modal-table-heading">Category</th>
               <th class="modal-table-heading">Problem</th>
               <th class="modal-table-heading">Location</th>
               <th class="modal-table-heading">Manage Post</th>
           </tr>
           
            <tr ng-repeat="obj in all_req_json">
               <td class="modal-table-cell" ng-model="rid">{{obj.dop}}</td>
               <td class="modal-table-cell">{{obj.category}}</td>
               <td class="modal-table-cell">{{obj.problem}}</td>
               <td class="modal-table-cell">{{obj.location}}</td>
               <td class="modal-table-cell"><button class="btn btn-primary cust-btn" ng-click="delete_req(obj.rid);">Delete</button> </td>
            </tr>
            
        </table>
        </div>
        </div>
        <!-- to show when their user have not posted work-->
        <div class="row hidden-field" id="no_work_posted">
            <div class="col-md-12">
                <h4> no work posted </h4>
            </div>
        </div>
        
        </div><!--con of modal requirements-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>                                 
 <!-- requirments modal end-->                         
 <!-- rate the worker modal-->
    <div class="modal fade" id="rate_worker" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="contanaer">
            <!-- 2 row in modal rating-->
            <div class="row">
                <div class="col-md-12">
                    <table width="100%" border="1">
                        <tr ng-repeat="obj_rate in rating_req_json">
                            <td>{{obj_rate.workeruid}}</td>
                            <td class="star-box">
                          <!-- <input type="number" class="rating-box" ng-model="worker_rated">-->
                       <i class="fa fa-star-o" ng-click="click_star($index,'1')" aria-hidden="true"></i>
                       <i class="fa fa-star-o" ng-click="click_star($index,'2')"  aria-hidden="true"></i>
                       <i class="fa fa-star-o" ng-click="click_star($index,'3')"  aria-hidden="true"></i>
                       <i class="fa fa-star-o" ng-click="click_star($index,'4')"  aria-hidden="true"></i>
                       <i class="fa fa-star-o" ng-click="click_star($index,'5')"  aria-hidden="true"></i>
                            </td>
                            <td><button ng-click="rate_worker($index)">done</button></td>
                        </tr>
                        
                    </table>
                    
                </div>
            </div>
            
        </div><!-- modal con-->
        
      </div><!-- modal body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>                                                                                                           
                     
 <!-- hideen fields-->
 <input class="hidden-field" type="text" id="rating">           
 <input class="hidden-field" type="text" id="index">           
 <input class="hidden-field" type="text" id="active_user" value="<?php echo $_SESSION["active_user"]?>">           
           
</div> <!-- con-->   
</body>
</html>