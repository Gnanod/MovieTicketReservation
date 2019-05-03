<?php
    session_start();
    
    if(isset($_SESSION["loggingSession"])){
        //header("Location:addUserHtml.php");
    }
    require 'config.php';
?>

<!doctype html>
<html lang="en">

<head>
  <title>MovieTicketReservationSystem</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-kit.min1036.css?v=2.0.5" rel="stylesheet" />
  <style>


    .pad{
      padding: 10px;
    }

body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}

#myImg{
		round:50%;
		height:50px;
		width:150px;
	}
	#forgetPassword{
       margin-left: 170px;
       color: purple;
    }
    #acuntYet{
        margin-left: 0px;
        margin-top: -10px;
    }
  </style>
</head>

<body>


<nav class="navbar navbar-color-on-scroll bg-white navbar-transparent fixed-top  navbar-expand-lg  " color-on-scroll="100" id="sectionsNav">

    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
               </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item pad">
                    <a href="index1.php" class="nav-link" >
                        <i class="material-icons">home</i> Home
                    </a>
                </li>

                <li class="nav-item pad">
                    <a href="Movies.php" class="nav-link" >
                        <i class="material-icons">business_center</i> Movies
                    </a>
                </li>
                <li class="nav-item pad">
                    <a href="#" class="nav-link" >
                        <i class="material-icons">business_center</i> BuyTickets
                    </a>
                </li>
                <li class="nav-item pad">
                    <a href="#" class="nav-link" >
                        <i class="material-icons">business_center</i> ShowTimes
                    </a>
                </li>

                <form class="form-inline ml-auto pad">
                    <div class="form-group has-gray">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
                        <i class="material-icons">search</i>
                    </button>
                </form>
				
				 <?php
                              if(!isset($_SESSION["loggingSession"])){
                        ?>
                <li class="button-container nav-item iframe-extern pad" style="right: 100px;">
                    <a href="login.php" target="_blank" class="btn  btn-rose   btn-round btn-block" >
                        <i class="material-icons">fingerprint</i> LOGIN
                    </a>
                </li>
				<?php
							  }else{
				?>
                <li class="dropdown nav-item">
                    <a href="#pablo" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="profile-photo-small">
                            <img src="assets/img/myPhoto.jpg" alt="Circle Image" class="rounded-circle img-fluid" id="myImg">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left">

                        <a href="#pablo" class="dropdown-item">ViewProfile</a>
                        <a href="#pablo" class="dropdown-item">EditProfile</a>
                        <a href="logout.php" class="dropdown-item">LogOut</a>
                    </div>
                </li>
				
				<?php
							  }
				?>

            </ul>
        </div>
    </div>
</nav>
		<?php
					if (!empty($_SESSION['saveSuccess'])) {

                        $message = $_SESSION['saveSuccess'];
                      
               
                    echo "<script type='text/javascript'> alert('$message');</script>";
					unset($_SESSION['saveSuccess']);
                    }
					
					if (!empty($_SESSION['saveFail'])) {

                        $message = $_SESSION['saveFail'];
                      
               
                    echo "<script type='text/javascript'> alert('$message');</script>";
					unset($_SESSION['saveFail']);
                    }

                    if (!empty($_SESSION['LoginError'])) {

                        $message = $_SESSION['LoginError'];
                      
               
                    echo "<script type='text/javascript'> alert('$message');</script>";
										unset($_SESSION['LoginError']);
                    }
        ?>

<div class="page-header header-filter" style="background-image: url('assets/img/bg7.jpg'); background-size: cover; background-position: top center; height:600px">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
          <form class="form"  action="loginSearch.php" method="post">
            <div class="card card-login card-hidden" style="margin-top:150px">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Login</h4>
              </div>
              <div class="card-body " >

              <span class="bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">email</i>
                      </span>
                    </div>
                    <input type="email" name='userNames'class="form-control" placeholder="Email...">
                  </div>
                </span>
              <span class="bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" name='password' class="form-control" placeholder="Password...">
                  </div>
              </span>
			  <a href="examples/login-page.html" class="btn btn-link btn-primary " target="_blank" id="forgetPassword">Forget Password ?</a>

			  <div class="card-footer justify-content-center">

              <!--<a href="#pablo" class="btn btn-rose btn-link btn-lg">Lets Go</a>-->
              <a href="#pablo"  >
			  
			  <input type="submit" value="LOGIN" class="btn btn-primary btn-round" style="width: 200px; margin-top: -10px">

            </div>
            <div class="tim-typo" id="acuntYet">
              <h6 >
               Have not account yet?</h6>
            </div>
            <a href="register.php" class="btn btn-link btn-primary " target="_blank" style="margin-top: -50px;margin-left:100px">REGISTER</a>
			  
			   
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
  </div>

<footer class="footer footer-default" >
    <div class="container">
        <nav class="float-left">
            <ul>
                <!--<li>-->
                <!--<a href=" ">-->
                <!--<img src="images/mars Logo.png" alt="Raised Image" class="img-raised rounded img-fluid" style="height:72px;width:200px;margin-top: -20px; "></a>-->
                <!--</a>-->
                <!--</li>-->
                <li >
                    <a href="#" >
                        ABOUT US
                    </a>
                </li>
                <li >
                    <a href="#" >
                        CONTACT US
                    </a>
                </li>
                <li >
                    <a href="#" >
                        FAQ
                    </a>
                </li>
                <li >
                    <a href="register.php" >
                        Register
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com/" target="_blank">JavaTech</a> 
            <div style=" margin-left: -750px">
                <button class="btn btn-just-icon btn-twitter" >
                    <i class="fa fa-twitter"></i>
                </button>
                <button class="btn btn-just-icon  btn-facebook">
                    <i class="fa fa-facebook"> </i>
                </button>

                <button class="btn btn-just-icon  btn-google">
                    <i class="fa fa-google"> </i>
                </button>

                <button class="btn btn-just-icon  btn-linkedin">
                    <i class="fa fa-linkedin"></i>
                </button>
            </div>


        </div>
    </div>
</footer>


<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>

<!--&lt;!&ndash; Place this tag in your head or just before your close body tag. &ndash;&gt;-->
<!--<script async defer src="assets/js/plugins/buttons.github.io/buttons.js"></script>-->

<!--	Plugin for Sharrre btn -->
<script src="assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
<!--	Plugin for Small Gallery in Product Page -->
<script src="assets/js/plugins/jquery.flexisel.js" type="text/javascript"></script>

<!-- Plugins for presentation and navigation  -->
<script src="assets/demo/modernizr.js" type="text/javascript"></script>
<script src="assets/demo/vertical-nav.js" type="text/javascript"></script>

<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-kit.min1036.js?v=2.1.1" type="text/javascript"></script>

<script>

<script>

</script>

</body>

</html>