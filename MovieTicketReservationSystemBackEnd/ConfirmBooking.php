<?php
    session_start();
    require 'config.php';
//echo  $_GET["operation1"];
    $movieId=$_GET["movieId"];
    $movieTime= $_GET["time"];
    $movieDate = $_GET["date"];
    $adults = $_GET["adults"];
	$kids=$_GET["kids"];
    $city=$_GET["city"];
	$total= $_GET["total"];
	$theaterId=$_GET["theaterId"];
	$theaterName = $_GET["theater"];
	
	$seat=array($_GET["seatNumbers"]);
	

  if(!$connection){
        echo mysqli_connect_error();
    }else{
        $sql="select MovieName,MoviePhoto from movie where MovieId='$movieId'";
        $result  = mysqli_query($connection,$sql);
			if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $movieName = $row["MovieName"];
                $moviePhotoLink= $row["MoviePhoto"];
                
            }
    }

	//echo $_SESSION["seatArraySession"];
?>


<!doctype html>
<html lang="en">

<head>
  <title>MovieTicketReservationSystem</title>

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

      #myImg{
		round:50%;
		height:50px;
		width:150px;
	}

  </style>
</head>

<body>

<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/moment.min.js"></script>

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


<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?php echo  $moviePhotoLink ?>');height: 350px">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">

            </div>
        </div>
    </div>
</div>

<div class="main main-raised" id="main" >
    <div class="contact-content">
        <div class="container">
            <div class="row" >
                <div class="col-md-8 ml-auto mr-auto" style="margin-left: -40px">
                    <h2 class="title" style="text-align: center">Confirm Booking</h2>
					 <div class="row">
							<div class="labels col-md-4 " ><h4 class="title">Film Name  :</h4></div>
							<div class="labels col-md-6" ><h5 class="title"><?php  echo $movieName ?>  </h5> </div>
					</div>
					<div class="row">
							<div class="labels col-md-4" ><h4 class="title">Theater  :</h4></div>
							<div class="labels col-md-6" ><h5 class="title"><?php  echo $theaterName ?> </h5></div>
					</div>
					<div class="row">
							<div class="labels col-sm-4"><h4 class="title">City  :</h4></div>
							<div class="labels col-sm-6" ><h5 class="title"><?php  echo $city ?> </h5></div>
					</div>
					<div class="row">
							<div class="labels col-md-4" ><h4 class="title">Time  :</h4></div>
							<div class="labels col-md-6" ><h5 class="title"><?php  echo $movieTime ?> </h5></div>
					</div>
					<div class="row">
							<div class="labels col-md-4" ><h4 class="title">Date  :</h4></div>
							<div class="labels col-md-6" ><h5 class="title"><?php  echo $movieDate ?> </h5></div>
					</div>
					<div class="row">
							<div class="labels col-md-4"><h4 class="title">Seat Type  :</h4></div>
							<div class="labels col-md-4" ><h4 class="title">Adults  : <?php echo $adults?></h4></div>
							<div class="labels col-md-4" ><h4 class="title">Kids  :<?php echo $kids?></h4></div>
					</div>
					<div class="row">
							<div class="labels col-md-4" ><h4 class="title">Seat Numbers  :</h4></div>
							<div class="labels col-md-4" ><h5 class="title"><?php echo $_GET["seatNumbers"]?> </h5></div>
							
					</div>
					<div class="row">
							<div class="labels col-md-4" ><h4 class="title">Total  :</h4></div>
							<div class="labels col-md-4" ><h5 class="title"> <?php echo $total ?></h5></div>
							
					</div>
					<div class="row">
						<!-- <form action="ConfirmBooking.php" action="post">
								<!--<div class="labels col-md-4" ><button name="btnPayment" class="btn btn-danger" style="margin-left: 300px">Payment</button></div>
								<input type='submit' class="btn btn-danger" style="margin-left: 300px">
				        </form> -->
				
						
						<!--	<a class="btn btn-danger"  href="reservation.php?movieId=<?php echo $movieId ?> &customerId=1 &adults=<?php echo  $adults ?>&kids=<?php echo $kids ?>& total=<?php echo $total ?> & movieTime= <?php echo  $movieTime ?>& movieDate= <?php echo $movieDate?>&seatNumbers=<?php echo $seat?> & theaterName = <?php echo $theaterName?> & city=<?php echo  $city ?> & theaterId= <?php echo $theaterId?> & theaterName=<?php echo $theaterName?>">
																ShowTime 
							</a>-->
							
							<a class="btn btn-danger confirmation" href="reservation.php ?movieId=<?php echo $movieId ?>&customerId=1 &adults=<?php echo  $adults ?>&kids=<?php echo $kids ?>& total=<?php echo $total ?>  & movieTime= <?php echo  $movieTime ?> & movieDate= <?php echo $movieDate?>& theaterName = <?php echo $theaterName?>& city=<?php echo  $city ?> & theaterId= <?php echo $theaterId?> & theaterName=<?php echo $theaterName?> & seatNumbers=<?php echo $_GET["seatNumbers"]?>">
									Confirm  
							</a>
											

							<script type="text/javascript">
								var elems = document.getElementsByClassName('confirmation');
								var confirmIt = function (e) {
									if (!confirm('Are you sure to confirm ?')) e.preventDefault();
								};
								for (var i = 0, l = elems.length; i < l; i++) {
									elems[i].addEventListener('click', confirmIt, false);
								}
							</script>											
					</div>
					
                </div>

                <div class="col-md-4 ml-auto mr-auto " >
                        <img  class="img-raised" src="<?php echo  $moviePhotoLink ?>" style="height: 250px;width: 375px;margin-top: 50px">
                       

                </div>

            </div>
        </div>
    </div>
</div>


<?php
if ( isset( $_POST['Submit1'] ) ) { 


}
?>



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




	
</body>

</html>