<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <script src="required-files/angular.min.js"></script>
<script src="required-files/jquery-3.5.1.min.js"></script>


<script src="required-files/popper.min.js"></script>

<script src="required-files/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="required-files/bootstrap.min.css">


<!-- custom css-->
    <link rel="stylesheet" type="text/css" href="css/admin-dash-css.css">

<!-- custom js-->

<script src=""></script>
<!-- angular-->
<script>
var module=angular.module("ourmodule",[]);
module.controller("controller",function($scope,$http){
    //alert();
    
    //$scope.sel_category=$scope.sel_category.data[0];
    
   $scope.fetch_all=function(){
    $http.get("user-manager-php.php?get_user="+$scope.sel_category).then(ok,not_ok)
       
    function ok(response){
        $scope.all_users=response.data;
        alert(JSON.stringify($scope.all_users));
        
       
    }   
    function not_ok(response){
        alert();
    }
    
   };// fetch all
// to block user
$scope.block_user=function(uid){
    $http.get("user-manager-php.php?block=&uid="+uid).then(ok,not_ok);
    
    function ok(response){
        if(response.data=="blocked")
        alert(response.data);    
    }
    function not_ok(response){}
};  // block  

    // unblock
  $scope.unblock_user=function(uid){
    $http.get("user-manager-php.php?unblock=&uid="+uid).then(ok,not_ok);
    
    function ok(response){
        if(response.data=="unblocked")
        alert(response.data);    
    }
    function not_ok(response){}
};  // block 
    
    $scope.remove_user=function(uid){
    $http.get("user-manager-php.php?remove=&uid="+uid).then(ok,not_ok);
    
    function ok(response){
        if(response.data=="removed")
        alert(response.data);    
    }
    function not_ok(response){}
}; 
    
});//con
    
</script>    

</head>
<body ng-app="ourmodule" ng-controller="controller">
<div class="container">
   <!-- 1 row-->
    <div class="row">
        <div class="col-md-12">
            mps.com
        </div>
    </div>
    <!-- 2 row-->
    <div class="row">
        <div class="col-md-9">
            <!--select category-->
            <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Options</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01" ng-model="sel_category">
    <option value="all">All</option>
    <option value="worker">worker</option>
    <option value="citizen">Citizen</option>
  </select>
</div>
            
            
        </div>
        <div class="col-md-3">
          <button class="btn btn-danger" ng-click="fetch_all()">Fetch all users</button>  
        </div>
    </div>
    <!-- 3 row-->
    <div class="row" >
        <div class="col-md-12">
           
            <table>
               <tr ng-repeat="obj in all_users">
                   <td>{{obj.uid}}</td>
                   <td>
                  <button ng-click="block_user(obj.uid)">block</button>
                   </td>
                   <td>
                       <button ng-click="unblock_user(obj.uid)">Unblock</button>
                   </td>
                   <td>
                      <button ng-click="remove_user(obj.uid)">Remove</button> 
                   </td>
               </tr>
                
            </table>
              
        </div>
    </div>
    
    
</div><!-- con-->   

      
</body>
</html>