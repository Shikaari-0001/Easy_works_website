<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    
<script src="required-files/angular.min.js"></script>
<script src="required-files/jquery-3.5.1.min.js"></script>


<script src="required-files/popper.min.js"></script>

<script src="required-files/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="required-files/bootstrap.min.css">
<!-- line awsome-->
<link rel="stylesheet" href="-">

<!-- custom css-->
    <link rel="stylesheet" type="text/css" href="css/citizen-search-by-woker-css.css">

<!-- custom js-->

<script src=""></script>
<script>
var module=angular.module("ourmodule",[]);
module.controller("controller",function($scope,$http){
  $scope.fetch_all=function(){
    //alert();
    // get city
    $http.get("citizen-search-by-worker-php.php?city=").then(city_data,no_city_data);
      function city_data(response){
          //alert (JSON.stringify(response.data));
          //fill the combo box
        $scope.city_json=response.data;
        
      }
      
      function no_city_data(response){}
      
     // to get category
    $http.get("citizen-search-by-worker-php.php?category=").then(category_data,no_category_data);
      function category_data(response){
          //alert (JSON.stringify(response.data));
          //fill the combo box
        $scope.category_json=response.data;
        
      }
      
      function no_category_data(response){} 
};// fetch all    
   
$scope.citizen_work=function(){
    
    $http.get("citizen-search-by-worker-fetch-work-php.php?category="+$scope.sel_category.category+"&city="+$scope.sel_city.city).then(workers_data,no_workers_data);
function workers_data(response){
    alert(JSON.stringify(response.data));
    $scope.avl_work=response.data;
};
function no_workers_data(response){
    //alert(JSON.stringify(response.data));
};
    
}; //citizen work 

$scope.fetch_cust=function(uid,index){
   // alert(index);
    $scope.avl_work_detail=$scope.avl_work[index];
    //alert($scope.avl_work_detail.problem);
 $http.get("citizen-search-by-worker-fetch-work-php.php?uid="+uid).then(ok,not_ok)
    
function ok(response){
    alert(JSON.stringify(response.data));
    $scope.cust_details=response.data;
} 

function not_ok(response){}    
    
};// fetch cust
    
});//cont    

</script>   
    
</head>
<body ng-app="ourmodule" ng-controller="controller" ng-init="fetch_all();" >
<!-- nav bar-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dash-worker.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      </ul>
     Work search
  </div>
</nav>
<br><br>
<div class="container">
  <!-- 1 row-->
    <div class="row">
        <div class="col-md-6">
            <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text">City</label>
  </div>
  <select ng-model="sel_city" ng-options="obj.city for obj in city_json" class="custom-select" id="">
  </select>
</div>    
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text">Category</label>
  </div>
  <select ng-model="sel_category" ng-options="obj.category for obj in category_json" class="custom-select" id="">
  </select>
</div>    
        </div>
    </div>
    <!-- 3 row have search-->
    <div class="row">
        <div class="col-md-12"><center>
            <button class="btn btn-primary" ng-click="citizen_work()" >Search Work</button></center>
        </div>
    </div>
    <br>
    <!-- 4 row--->
    <div class="row">
        <div class="col-md-4" ng-repeat="obj in avl_work">
               <div class="card" style="width: 18rem;">
 <img src="uploads/{{obj.pic}}" class="card-img-top" alt="no profile pic">
  <div class="card-body">
    <h5 class="card-title"><span class="cust-text">NAME:</span> {{obj.name}}</h5>
    <p class="card-text"><span class="cust-text">CATEGORY:</span> {{obj.category}} </p>
    <button type="button" class="btn btn-primary cust-card-btn" data-toggle="modal" data-target="#full_details" ng-click="fetch_cust(obj.cust_uid,$index);" >Show more</button>
  </div>
</div>
            
        </div>
    </div>
    <!-- model-->
    
    <div class="modal fade" id="full_details" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <img src="uploads/{{cust_details[0].pic}" alt="">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- table to show details-->
<table>
<tr><td>NAME:</td><td>{{cust_details[0].name}}</td></tr>    
<tr><td>CONTACT:</td><td>{{cust_details[0].contact}}</td></tr>    
<tr><td>EMAIL ADDRESS:</td><td>{{cust_details[0].email}}</td></tr>    
<tr><td>PROBLEM:</td><td>{{avl_work_detail.problem}}</td></tr>    
<tr><td>LOCATION:</td><td>{{avl_work_detail.location}}</td></tr>    
<tr><td>DATE OF POSTING:</td><td>{{avl_work_detail.dop}}</td></tr>        
</table>                    
                </div>
            </div>
        </div>
        {{cust_details[0].email}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

</div><!--con-->  
    
        
</body>
</html>    