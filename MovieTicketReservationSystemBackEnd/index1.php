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

    .modal {
        display: none; 
        position: fixed; 
        z-index:500; 
        padding-top: 100px; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4); 
    }

        /* Modal Content  */
         .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        }
        .modal-backdrop {
            /* bug fix - no overlay */    
            display: none;    
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




        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-innera active">
                <div class="carousel-item active">
                    <div class="page-header header-filter" style="background-image: url('assets/img/Aquaman.jpg');">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 text-left" style="margin-left: 150px;">
                                    <h1 class="title">Aquaman - 2D</h1>
                                    <br>
                                    <div class="buttons" style="margin-left: 70px;margin-top: -50px">
                                        <button class="btn btn-warning"  >BuyTicket</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#myModal2" >Watch Trailor</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="carousel-item ">
                    <div class="page-header header-filter" style="background-image: url('assets/img/Transformers.jpg');">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 text-left" style="margin-left: 150px;">
                                    <h1 class="title">Transformers</h1>
                                    <br>
                                    <div class="buttons" style="margin-left: 70px;margin-top: -50px">
                                        <button class="btn btn-warning"  >BuyTicket</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#myModal2" >Watch Trailor</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="carousel-item ">
                    <div class="page-header header-filter" style="background-image: url('assets/img/blackpanther.jpg');">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 text-left" style="margin-left: 150px;">
                                    <h1 class="title">Blackpanther</h1>
                                    <br>
                                    <div class="buttons" style="margin-left: 70px;margin-top: -50px">
                                        <button class="btn btn-warning"  >BuyTicket</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#myModal2" >Watch Trailor</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				

            </div>
			
			
			
			
            
			 <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <i class="material-icons">keyboard_arrow_left</i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <i class="material-icons">keyboard_arrow_right</i>
            <span class="sr-only">Next</span>
          </a>
        </div>
		
		
        

<div class="main main-raised" id="main" style="background-color: whitesmoke">
    <div class="contact-content">
        <div class="container">
            <h2 class="title">Now Shownig Movies....</h2>

            <?php

$sql = "SELECT MovieId,MoviePhoto,MovieName,MovieTrailor FROM movie where MovieStatus='NowShowing'";
$result = $connection->query($sql);

if($result->num_rows )
{
   
    $count =0;
        
?>
                <div class="row">

           
                <?php
                            while($row=$result->fetch_assoc()){
                                if($count!=3){

                ?>
                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-header card-header-image">
                                <a href="#pablo">
                                    <img src="<?php echo  $row["MoviePhoto"]?>" alt="">
                                </a>
                            </div>
                            <div class="card-body ">
                                <h4 class="card-category text-info card-title" style="text-align: center"><?php echo $row["MovieName"]?></h4>
                                <?php
                                $sendName= $row["MovieName"];
                                
                                ?>
                                <a href='BuyTicket1.php?movieName=<?php echo $sendName?>'>
                                    <button class="btn btn-warning" >BuyTicket</button>
                                </a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $row["MovieId"];?>" >Watch Trailor</button>
                                <a href="MoviePage.php?movieName=<?php echo $row["MovieName"]?>">
                                    <button class="btn btn-success" style="margin-left: 60px">More info.</button>
                                </a>

                            </div>
                        </div>
                    </div>

                    <?php
                                }
                            $count++;
                        
                    ?>

                    <div id="<?php echo $row["MovieId"];?>" class="modal">

                    <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header" >
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="material-icons">clear</i>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-video">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="560" height="315" src="<?php echo $row["MovieTrailor"]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                    </div>
                    <?php
                        }
                    }
                    ?>
                   
                       
                    
                </div>



            <!--&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-->
           

            </div>
			
			<div class="container">
            <h2 class="title">Up Comming Movies....</h2>
            
            <?php

                $sql = "SELECT MovieId,MoviePhoto,MovieName,MovieTrailor FROM movie where MovieStatus='UpComming'";
                $result = $connection->query($sql);

                if($result->num_rows )
                {
                
                    $count =0;
        
            ?>

            <div class="row">
				<?php
                            while($row=$result->fetch_assoc()){
                                if($count!=3){

                ?>
					<div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-header card-header-image">
                                <a href="#pablo">
                                    <img src="<?php echo  $row["MoviePhoto"]?>" alt="">
                                </a>
                            </div>
                            <div class="card-body ">
                                <h4 class="card-category text-info card-title" style="text-align: center"><?php echo $row["MovieName"]?></h4>
                                <button class="btn btn-warning" >BuyTicket</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $row["MovieId"];?>" >Watch Trailor</button>
                                <a href="MoviePage.html">
                                    <button class="btn btn-success" style="margin-left: 60px">More info.</button>
                                </a>

                            </div>
                        </div>
					</div>
					 <?php
                                }
                            $count++;
                        
                    ?>
					<div id="<?php echo $row["MovieId"];?>" class="modal">

                    <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header" >
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="material-icons">clear</i>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-video">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="560" height="315" src="<?php echo $row["MovieTrailor"]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                    </div>
					<?php
                        }
                    }
                    ?>

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
// Get the modal
// var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
// btn.onclick = function() {
//   modal.style.display = "block";
// }

// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }
</script>
</body>

</html>