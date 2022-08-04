<?php
session_start();
?>
<html>
<head></head>
   
<script src="required-files/jquery-3.5.1.min.js"></script>

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->

<link rel="stylesheet" type="text/css" href="required-files/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> 
<!-- font awsome--> 
 <link rel="stylesheet" href="required-files/font-awesome-4.7.0/css/font-awesome.min.css">
 <!-- custom css-->
<link rel="stylesheet" type="text/css" href="css/homepage-cs.css">     
<!-- custom js--> 
<script src="js/homepage-js.js"></script>         

<body>

<!---->
    <!-- 1 row have navbar-->
    <div class="contanair">
    <div class="row">
      <div class="col-md-12">
        
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Logo Here</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      
      
    </ul>
    <button type="button" class="btn btn-primary btn-nav-custom" data-toggle="modal" data-target="#sign_up_modal">
    <i class="fa fa-user-plus icon-nav" aria-hidden="true"></i>&nbsp;
  Sign Up
</button>
 <!-- login-->
 &emsp;&emsp;
 <button type="button" class="btn btn-primary btn-nav-custom" data-toggle="modal" data-target="#login_modal">
 <i class="fa fa-sign-in icon-nav" aria-hidden="true"></i>&nbsp;
  Login
</button>
 &emsp;&emsp;
  </div>
</nav>
              
      </div>     
    </div>
    </div>

<!-- Sign up modal -->

<div class="modal fade" id="sign_up_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <form>
 
  <div class="modal-dialog">
   
    <div class="modal-content">
     
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <!--action="homepage-php.php" method="post"-->
      <!-- Email Address-->   
         <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="sign_up_username" name="sign_up_username" aria-describedby="emailHelp">
    
  </div>  
   <!-- password -->
   <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" id="sign_up_password" name="sign_up_password">
    </div>
      
     <!-- Mobile -->
   <div class="form-group">
    <label for="exampleInputEmail1">Mobile</label>
    <input type="text" class="form-control" id="sign_up_mobile" name="sign_up_mobile">
    </div> 
     
      <!-- Catogray -->
  <div class="form-group">
      <label for="txtcat" id="">Category</label>
      <br>
      <input type="radio" class="form-control radio" name="sign_up_category"
      value="worker" id="sign_up_worker">Worker
      
      <input type="radio" class="form-control radio" name="sign_up_category"
      value="citizen" id="sign_up_citizen">Citizen
  </div>
                                                                                                 

      <!-- sign up-->
      <div class="modal-footer">
       <span id="sign_up_msg"></span>
        <button type="button" class="btn btn-primary" id="sign_up_button">Sign Up</button>
        </div>  
    </div>
   </div>
   </div>
   </form>     
</div>


<!-- Login Modal -->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <form>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       <!-- login email-->
     <div class="form-group">
    <label>Username</label>
    <input type="email" class="form-control" id="login_username" name="login_username">      
        </div> 
       <!-- login password-->
     <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" id="login_password" name="login_password">
    </div>   
       
       
       
      </div>
      <div class="modal-footer">
       <span id="login_msg"></span>
        <button type="button" class="btn btn-primary" id="login_button">Login</button>
      </div>
    </div>
  </div>
</form>
</div> 

<!-- carousal-->
<div class="row"><div class="col-md-12">
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/c-1.jpg" class="d-block w-100" alt="..."  width="600" height="600">
    </div>
    <div class="carousel-item">
      <img src="images/c-2.jpg" class="d-block w-100" alt="..." width="600" height="600">
    </div>
    <div class="carousel-item">
      <img src="images/c-3.png" class="d-block w-100" alt="..."  width="600" height="600">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div></div></div>
<div class="row" class="card-row"><div class="col-md-12">
<div class="full_heading"><center>Our Services</center></div>
</div></div>
 <div class="contanair">
 <div class="row card-row">
 <!-- 1 card worker search-->
  <div class="col-md-3">
      <div class="card" style="width: 18rem;">
  <img src="images/edit-profile.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Worker Search</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
  </div>
  <div class="col-md-3">
      <div class="card" style="width: 18rem;">
  <img src="images/edit-profile.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Get Work</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
  </div>
  <div class="col-md-3">
      <div class="card" style="width: 18rem;">
  <img src="images/edit-profile.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Post work</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
  </div>
  <div class="col-md-3">
      <div class="card" style="width: 18rem;">
  <img src="images/edit-profile.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Rate worker</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
  </div>
 </div>
  <!-- row for devpor-->
  <div class="row" class="card-row"><div class="col-md-12">
<div class="full_heading"><center>Meet the developers</center></div>
</div></div>
  
  <div class="row">
      <div class="col-md-6">
          <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="..." class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
          <h5 class="card-title">Sukhman singh</h5>
       
           <table border="1" cellpadding="5" width="100%">
            <tr><td>College</td><td>Thapar</td></tr>
            <tr><td>Year</td><td>2nd Year</td></tr>
            <tr><td></td><td></td></tr>
            <tr><td></td><td></td></tr>
        </table>
            
      </div>
    </div>
  </div>
</div>
      </div>
      
      <div class="col-md-6">
          <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="images/sir.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Rajesh K. Bansal</h5>
        <table border="1" cellpadding="5">
            <tr><td>Training & Development Head at</td><td>Banglore Computer Education And Sun-Soft Technologies</td></tr>
            <tr><td>Author Of</td><td>Real Java</td></tr>
            <tr><td>Founder Of</td><td><a href="https://www.realjavaonline.com/">www.realJavaOnline.com</a></td></tr>
        </table>
      </div>
    </div>
  </div>
</div>
      </div>
  </div>
   
   <div class="row" class="card-row"><div class="col-md-12">
<div class="full_heading"><center>Reach Us</center></div>
</div></div>
   
    <!-- reach us-->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-7">
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d950.222932485866!2d74.95240937588956!3d30.211724339221092!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4a0d6293513f98ce!2sBanglore%20Computer%20Education%20(C%20C%2B%2B%20Android%20J2EE%20PHP%20Python%20AngularJs%20Spring%20Java%20Training%20Institute)!5e0!3m2!1sen!2sin!4v1594724216399!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            
        </div>
        <div class="col-md-2"></div>
    </div>
    
    
</div><!-- con-->   
</body>      
</html>