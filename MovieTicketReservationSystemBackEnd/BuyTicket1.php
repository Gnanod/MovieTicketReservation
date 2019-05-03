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
    .dateColumn{
		color:black;
        border: 2px solid black;
        background-color:white;
		text-align:center;
        height:120px;max-width:150px;
		font-size:0px;
    }
    .mouseEnterdateColumn{
        background-color: gainsboro;
        border: 2px solid red;
        
    }
	 .mouseClickColumn{
        background-color: gainsboro;
       
        
    }
    .mouseLeavedateColumn{
        background-color: white;
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
                    <?php
                        $movieName = $_GET['movieName'];
                        
                        $sql = "SELECT MoviePhoto,MovieId  FROM movie where MovieName='$movieName'";
                        $result = $connection->query($sql);
                            if($row=$result->fetch_assoc()){

                        $movieID = $row["MovieId"];
                        $moviePhotoLink= $row["MoviePhoto"];    
                    ?>

<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?php echo $row["MoviePhoto"] ?>');height: 350px">
    
                    <?php
                            }
                    ?>
<div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">

            </div>
        </div>
    </div>
</div>

<div class="main main-raised" id="main" style="background-color:white">
    <div class="contact-content">
        <div class="container">

            <div class="row">

                <div class="col-md-12 ml-auto mr-auto">
                    <div class="tim-typo">
                        <h2 class="title" id="filmName">
                            <?php
                            
                                $movieName = $_GET['movieName'];
                                echo $movieName;
                                
                            ?>
                        </h2>
                     </div>
                </div>
            </div>

					<div class="row" style="margin-left:6px">
						 <?php
							$sql1="select DISTINCT showDate from showtimeDate where movieId='$movieID' && showDate >= (SELECT CURRENT_DATE) order by showDate ASC";
                            /*$sql1 = "select DISTINCT showDate from showtimeDate where movieId='$movieID'";*/
                            $result1 = $connection->query($sql1);
							
                            if($result1->num_rows ){
                        ?>
						
						<div class="col-sm-12">
							<div class="row" id='dateRow'>
							 <?php 
							  
                           
								$idcount=1;
								$idcount1=45;
							
								echo "<script> var whileCount=0; 
											var movieId= $movieID;
                                          
                                        
								</script>";
								$mouseClickClassID = 1;
                                while($row1 = $result1->fetch_assoc()){
									echo "<script>  var mouseClickClassID = $mouseClickClassID;  </script>";
                              ?>
                            <div class="col-sm-1 dateColumn" id="<?php echo $idcount ?>" onmouseenter="ChangeColor(this)" onmouseleave="ChangeLeaveColor(this)" onclick="getDate(this,movieId,mouseClickClassID)">
											
                                    <?php 
										
										
                                        $date1 = $row1["showDate"];
										echo "<script> 
											var orginalDate;
                                            if(parseInt(0)==parseInt(0)){
												
	      
												 SelectOtherDates('$date1');  
												
                                            }
											
                                            
													function SelectOtherDates(date1){
														
                                                        var d1 = new Date(date1);
                                                        var current1 = new Date();

                                                        var ddd = current1.getDate();
                                                        var mmm = current1.getMonth()+parseInt(1);
                                                        var yyy = current1.getFullYear();

                                                        if(parseInt(ddd)<10){
                                                            ddd = '0'+ddd;
                                                        }
                                                        if(parseInt(mmm)<10){
                                                            mmm = '0'+mmm;
                                                        }

                                                        var today1 = yyy+'-'+mmm+'-'+ddd;
                                                     
														
                                                        if(date1>=today1){
															
                                                           
                                                            var day = getDays(d1.getDay());
                                                            var date = d1.getDate();
                                                            var month = getMonths(d1.getMonth()); 
															var newId= parseInt($idcount)-parseInt(1);
															
															
															 
															 
															document.getElementById('$idcount').innerHTML =date1;
															
															var  span = document.createElement('P');
															var  span1 = document.createElement('P');
															var  span2 = document.createElement('P');
															var text = document.createTextNode(day);
															var text1 = document.createTextNode(date);
															var text2 = document.createTextNode(month);
															span.appendChild(text);
															span1.appendChild(text1);
															span2.appendChild(text2);
															document.getElementById('$idcount').appendChild(span);
															document.getElementById('$idcount').appendChild(span1);
															document.getElementById('$idcount').appendChild(span2);
															
															
															
															
															}
                                                     
                                                           
                                                    }
												
                                            function getDays(dayA){

                                                var day;
                                            
                                                switch(dayA){
                                                    case 0: day='Sunday';break;                                                          
                                                    case 1: day='Monday';break;
                                                    case 2: day= 'Tuesday';break;
                                                    case 3: day= 'Wednesday';break;
                                                    case 4: day= 'Thursday';break;
                                                    case 5: day = 'Friday';break;
                                                    case 6: day='Saturday';break;
                                                   
                                                }
                                                return day;
                                            }
                                            
                                            function getMonths(monthA){
                                                
                                                var month;
                                            
                                                switch(monthA){
                                            
                                                    case 0: month='January';break;
                                                    case 1: month='February';break;
                                                    case 2: month= 'March';break;
                                                    case 3: month= 'April';break;
                                                    case 4: month= 'May';break;
                                                    case 5: month = 'June';break;
                                                    case 6: month='July';break;
                                                    case 7: month ='August';break;
                                                    case 8: month = 'September';break;
                                                    case 9: month = 'Octomber';break;
                                                    case 10: month = 'November';break;
                                                    case 11: month = 'December';break;
                                            
                                                }
                                                return month;
                                            }
                                            
                                            </script>";
											
                                      ?> 
									  
                            </div>
                             <?php
							
														 $idcount=$idcount+1;
														 $idcount1=$idcount1+1;;
														 $mouseClickClassID+=1;
								}
								
                            }
                             ?>
												
							</div>
						</div>
						
					</div>

        </div>
			<div class="container " id="cardClass">
				
			</div>
							 
    </div>
</div>






<footer class="footer footer-default" >
    <div class="container">
        <nav class="float-left">
            <ul>
              
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
                    <a href="#" >
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
            <a href="https://www.creative-tim.com/" target="_blank">Mars</a> for a better web.
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
        $(document).ready(function() {
          //init DateTimePickers
          materialKit.initFormExtendedDatetimepickers();
			
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1; //January is 0!
			var yyyy = today.getFullYear();

			if (dd < 10) {
			  dd = '0' + dd;
			}

			if (mm < 10) {
			  mm = '0' + mm;
			}

			today =yyyy+'-'+ mm + '-' + dd ;

			var x =  document.getElementById('dateRow').querySelectorAll(".dateColumn");
			var y = x[0].id;
			var curDate = $("#"+y).text().substr(0,10);
			
			if(today == curDate){
				console.log('dddddddddmovieId'+movieId);
				$.get("BuyTicket1Ajax.php",{operation1:curDate,operation2:movieId},function(result,status){
						
						//console.log('RRRRRr'+result);
						 document.getElementById("cardClass").innerHTML=result;
                    //document.getElementById("tableBody").innerHTML=result;
					
                                        //  console.log("sssggg"+result);
                                        // document.getElementById('pickdate').setAttribute("max",result);
                                       
				});
				$("#"+y ).addClass("mouseEnterdateColumn"); 
			}
        });

        function ChangeColor(divName){

            var idName = divName.id;    
           $("#"+idName).addClass("mouseEnterdateColumn"); 
		
		
              
        }
        function ChangeLeaveColor(divName){

            var idName = divName.id;
            $("#"+idName).removeClass("mouseEnterdateColumn");
            $("#"+idName).addClass("dateColumn");
            
        }
		function getDate(date,curmovieId,mouseClickClassID){
			var i=1;
			 for(i=1;i<=mouseClickClassID;i++){
				 if( $("#"+i).hasClass("mouseClickColumn")){
					  $("#"+i).removeClass("mouseClickColumn"); 
				 }
			 }
			 
	
			

				 var idName = date.id;
				 $("#"+idName).addClass("mouseClickColumn");
			
				var searchDate = $(date).text().substr(0,10);
				
					$.get("BuyTicket1Ajax.php",{operation1:searchDate,operation2:curmovieId},function(result,status){
						 document.getElementById("cardClass").innerHTML=result;                      
					});
				
				
				
			
		}
      </script>



</body>

</html>