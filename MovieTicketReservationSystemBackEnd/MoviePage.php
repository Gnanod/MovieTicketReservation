<?php
    session_start();
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
#myImg{
		round:50%;
		height:50px;
		width:150px;
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

<div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/banner.jpg');height: 350px">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">

            </div>
        </div>
    </div>
</div>

                    <?php
                        $movieName = $_GET['movieName'];
                        
                        $sql = "SELECT MoviePhoto,MovieType,Duration,IMDB,DirecterName,Description,Actross,ProducerName,WriterName,WriterName,MusicianName,MovieTrailor  FROM movie where MovieName='$movieName'";
                        $result = $connection->query($sql);
                        if($row=$result->fetch_assoc()){
                                
                            
                    ?>

<div class="main main-raised" id="main" style="background-color: whitesmoke">
    <div class="contact-content">
        <div class="container">

            <div class="row">
                <div class="col-md-2 ml-auto mr-auto">
                    <img class="img-raised" src="<?php echo $row["MoviePhoto"]?>" alt="" style="height: 250px;width:300px; margin-top: 30px">

                </div>
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="tim-typo">
                        <h4 class="title">
                            Movie Name : <?php echo $movieName ; ?>
                        </h4>
                     </div>

                    <div class="tim-typo">
                        <h4 class="title">
                            IMDB Rate : <?php echo $row["IMDB"] ; ?>
                        </h4>
                    </div>

                    <div class="tim-typo">
                        <h4 class="title">
                            Duration : <?php echo $row["Duration"] ; ?>
                        </h4>
                    </div>

                    <div class="tim-typo">
                        <h4 class="title">
                            Genres :<?php echo $row["MovieType"] ; ?>
                        </h4>
                    </div>

                </div>
                <div class="col-md-2 ml-auto mr-auto">
				
				<a href='BuyTicket1.php?movieName=<?php echo $movieName?>'>
                        <button class="btn btn-danger" style="margin-top: 230px">Buy Ticket</button>
                                </a>
                  

                </div>
            </div>
            <div class="row">

                <div class="col-md-12 ml-auto mr-auto">
                    <h4 class="title">
                        Description
                    </h4>
					<span>  <?php echo $row["Description"] ; ?>  </span>
                   


                </div>
                <div class="col-md-12 ml-auto mr-auto">
                    <h4 class="title">
                        Actros
                    </h4>

					<span>
                    <?php echo $row["Actross"] ; ?>
					</span>

                </div>
				
				<div class="col-md-12 ml-auto mr-auto">
                    <h4 class="title">
                        Directed by :
                    </h4>

					<span>
                    <?php echo $row["DirecterName"] ; ?>
					</span>

                </div>
				
				<div class="col-md-12 ml-auto mr-auto">
                    <h4 class="title">
                        Produced by :
                    </h4>

					<span>
                    <?php echo $row["ProducerName"] ; ?>
					</span>

                </div>
				
				<div class="col-md-12 ml-auto mr-auto">
                    <h4 class="title">
                        Written by :
                    </h4>

					<span>
                    <?php echo $row["ProducerName"] ; ?>
					</span>

                </div>

				<div class="col-md-12 ml-auto mr-auto">
                    <h4 class="title">
                        Music by :
                    </h4>

					<span>
                    <?php echo $row["MusicianName"] ; }?>
					</span>

                </div>
				
				
                
            </div>
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
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGat1sgDZ-3y6fFe6HD7QUziVC6jlJNog"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="../../buttons.github.io/buttons.js"></script>
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
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="../../buttons.github.io/buttons.js"></script>
<!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
<script src="assets/demo/demo.js" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-kit.min1036.js?v=2.1.1" type="text/javascript"></script>
</body>

</html>