<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

<!-- angular-->
<script src="required-files/angular.min.js"></script>
    
<script src="required-files/jquery-3.5.1.min.js"></script>


<script src="required-files/popper.min.js"></script>

<script src="required-files/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="required-files/bootstrap.min.css">


<!-- custom css-->
    <link rel="stylesheet" type="text/css" href="css/worker-search-css.css">

<!-- custom js-->

<script src="js/worker-search-js.js"></script>    
  
<!-- angular code-->
<script>

var module = angular.module("ourmodule", []);
   module.controller("controller", function($scope,$http) {
  $scope.fetch_all=function(){
    //alert();
      // to get city
      $http.get("worker-search-fetch-all-php.php?city=").then(city_data,no_city_data);
      function city_data(response){
          //alert (JSON.stringify(response.data));
          //fill the combo box
        $scope.city_json=response.data;
        
      }
      
      function no_city_data(response){}
      
     // to get category
    $http.get("worker-search-fetch-all-php.php?category=").then(category_data,no_category_data);
      function category_data(response){
          //alert (JSON.stringify(response.data));
          //fill the combo box
        $scope.category_json=response.data;
        
      }
      
      function no_category_data(response){}  
                          
};//fetch_all
 
$scope.show_workers=function(){
    //alert($scope.sel_city.city);
$http.get("worker-search-fecth-worker-php.php?category="+$scope.sel_category.category+"&city="+$scope.sel_city.city).then(workers_data,no_workers_data);
function workers_data(response){
   // alert(JSON.stringify(response.data));
    $scope.avl_worker=response.data;
};
function no_workers_data(response){
    //alert(JSON.stringify(response.data));
};
        
};// show wokers
$scope.fetch_worker=function(worker_uid){
    //alert(worker_uid);
    $http.get("worker-search-fecth-worker-php.php?uid="+worker_uid).then(ok,not_ok);
    
    function ok(response){
        $scope.worker_details=response.data;
    }
    function not_ok(response){}
};    
       
}); // controller
    
</script>           
        
</head>
<body ng-app="ourmodule" ng-controller="controller" ng-init="fetch_all();">


<!--heading and nav bar--> 
 
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dash-citizen.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      </ul>
     Worker Search
  </div>
</nav>
 <br><br>
  <!-- 2 row city and categories-->
  <div class="container">
<div class="row">
   <!-- city-->
    <div class="col-md-6">
     <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text">City</label>
  </div>
  <select ng-model="sel_city" ng-options="obj.city for obj in city_json" class="custom-select" id="inputGroupSelect01">
  </select>
</div>    
  </div>
    <!-- category-->
    <div class="col-md-6">
      <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text">Category</label>
  </div>
  <select ng-model="sel_category" ng-options="obj.category for obj in category_json" class="custom-select" id="inputGroupSelect01">
  </select>
</div>
      
 </div>
 </div><br>
  <!-- 3 row-->
  <div class="row">
      <div class="col-md-12"><center>
          <button type="button" class="btn btn-primary btn-lg" ng-click="show_workers()">Search Worker</button></center>
      </div>
  </div>
  <br><br>
  <!-- 4 row have cards-->
  <br>
  <div class="row">
      <div class="col-md-4" ng-repeat="obj in avl_worker">
          <div class="card" style="width: 18rem;">
  <img src="uploads/{{obj.ppic}}" class="card-img-top" alt="no profile pic">
  <div class="card-body">
      <h5 class="card-title">NAME: {{obj.name}}</h5>
    <p class="card-text">Shop name: {{obj.firmshop}}</p>
    <p class="card-text">Specialization: {{obj.spl}} </p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#full_details" ng-click="fetch_worker(obj.uid);" >Show more</button>
  </div>
</div><br><br>
      </div>
  </div>
  <!-- modal-->
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
          <!-- 1 row-->
           <div class="row">
               <div class="col-md-12">
                   <img src="uploads/{{worker_details[0].ppic}}" width="100">
               </div>
            <div class="row">
               <div class="col-md-12">
                <table width="100%">
<tr><td>NAME:</td><td>{{worker_details[0].name}}</td></tr>
<tr><td>CONTACT:</td><td>{{worker_details[0].contact}}</td></tr>
<tr><td>EMAIL ADDRESS:</td><td>{{worker_details[0].email}}</td></tr>
<tr><td>SHOP NAME:</td><td>{{worker_details[0].firmshop}}</td></tr>
<tr><td>ADDRESS:</td><td>{{worker_details[0].address}}</td></tr>
<tr><td>SPL:</td><td>{{worker_details[0].spl}}</td></tr>
<tr><td>EXP:</td><td>{{worker_details[0].exp}}</td></tr>
<tr><td>INFO:</td><td>{{worker_details[0].otherinfo}}</td></tr>
                </table>
                </div>
            </div>   
           </div>
       </div>
        {{worker_details[0].uid}}
        {{worker_details[0].state}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div> 
  
   <!-- con div-->
    </div>  
</body>
</html>