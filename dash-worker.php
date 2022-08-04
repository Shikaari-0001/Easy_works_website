<?php session_start();

if(isset($_SESSION["active_user"])==false)
   {
       header("location:homepage.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<script src="required-files/jquery-3.5.1.min.js"></script>


<script src="required-files/popper.min.js"></script>

<script src="required-files/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="required-files/bootstrap.min.css">
<!-- line awsome-->
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<!-- custom css-->
<link rel="stylesheet" type="text/css" href="css/dash-worker-css.css">

<!-- custom js-->

<script src="js/dash-worker-js.js"></script>
<body>
  <!-- NAV BAR-->
  
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
      <!--1 row have cards  worker profile and  request rating-->
      <div class="row">
          <div class="col-md-4 col-sm-6">
              <!-- card-->
              
        <div class="card-group">
          <div class="card"><center>
             <img src="images/Capture.PNG" class="card-img-top card-pic"  alt="...">
               </center>
                <div class="card-body">
                   <h5 class="card-title">Update Profile</h5>
                 <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                 <center><a href="Profile-worker-front.php">
              <button type="button" class="btn btn-primary cust-btn-card">Update Profile</button></a>
               </center>
           </div>     
    </div>   
    </div>     
    </div>
    
    <!-- 3 card-->
          <div class="col-md-4 col-sm-6">
              <!-- card for search work-->
        <div class="card-group">
          <div class="card"><center>
             <img src="images/Capture.PNG" class="card-img-top card-pic"  alt="...">
               </center>
                <div class="card-body">
                   <h5 class="card-title">Find Work</h5>
                 <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p><center>
                 <a href="citizen-search-by-worker.php">
              <button type="button" class="btn btn-primary cust-btn-card">Find Work</button></a>
               </center>
               </div>         
        </div>   
       </div>
          </div>
    
    <div class="col-md-4 col-sm-6">
        <!-- card  for request rating-->
        
        <div class="card-group">
          <div class="card"><center>
             <img src="images/Capture.PNG" class="card-img-top card-pic"  alt="...">
               </center>
                <div class="card-body">
                   <h5 class="card-title">Request/Get Rating</h5>
                 <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p><center>
              <button type="button" class="btn btn-primary cust-btn-card" data-toggle="modal" data-target="#get_rating_modal">Get Rating</button>
               </center>
               </div>         
        </div>   
       </div>     
        </div>
         
    </div> <!--2 row-->
       

   
</div><!--container-->
<!-- modals-->
<!-- 1 modal get ratings-->
  <div class="modal fade" id="get_rating_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
   <form>
    <div class="modal-content cust-modal">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Request Ratings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- citizen uid-->
        <div class="form-group">
    <label class="modal-input-lable">Citizen Uid</label>
    <input type="text" class="form-control modal-input" id="citizen_uid" aria-describedby="emailHelp">
    </div>
       <!--worker uid--><!--
        <div class="form-group">
    <label >Worker Uid</label>
    <input type="text" class="form-control" id="worker_uid" aria-describedby="emailHelp">
    </div>-->
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary cust-btn" id="send_request" name="send_request">Send Request</button>
      </div>
    </div>
  </form>
   </div>   
</div>
<!-- hidden fields-->
<input type="text" class="hidden-field" id="star_rating" >      
<input type="text" class="hidden-field" id="active_user" value="<?php echo $_SESSION["active_user"]?>">      

  
      
</body>
</html>