<?php
    session_start();
    require 'config.php';

	$movieTimes=$_GET["movieTime"];
    $movieId=$_GET["movieId"];
    $movieTime= $_GET["movieTime"];
    $movieDate = $_GET["movieDate"];

     $theaterName=$_GET["theaterName"] ;
     $city=$_GET["city"];
	 $theaterId=$_GET["theaterId"];
	 $kidsPrice=$_GET['kidsPrice'];
	 $adultsPrice=$_GET['adultPrice'];
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

      .defaultSeatClass{
          background-color: #B2FF66 ;height: 30px;width:100px;padding-right: 35px;color: white;
      }
      .mouseEnter{
          background-color: green ;height: 30px;width:30px;padding-right: 35px;color: white;
      }
      .reservedSeat{
          background-color: red;height: 30px;width:30px;padding-right: 35px;color: white;
      }
      .seatClickClass{
	  
          background-color: blue;height: 30px;width:30px;padding-right: 35px;color: white;

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
                    <h2 class="title" style="text-align: center">Seat Arrangements</h2>

					<?php  
							 if(!$connection){
								echo mysqli_connect_error();
							}else{
								$sql="select numberOfSeats from theater where theaterId='$theaterId'";
								$result  = mysqli_query($connection,$sql);
									if ($result->num_rows > 0) {
										$row = $result->fetch_assoc();
										
										$databaseSeatCount=$row["numberOfSeats"];
										
									}
							}
								
							$rowCount = $databaseSeatCount/12;
							$estimateRowCount = round($rowCount)+1;
							$columnCount=0;
							echo $databaseSeatCount;
							for($i=0;$i<$estimateRowCount;$i++){
							
								?>
								
								<div class="row" >
								
								
									  <div class="col-md-6 ml-auto mr-auto" >
										<div class="row">
											<?php
											
												for($j=1;$j<=6;$j++){
													
													if($databaseSeatCount!=$columnCount){
														
														$sql2="select seatId from seatreservation s,reservation r where s.reservationId=r.reservationId && r.date='$movieDate' && r.movieId='$movieId'&& r.theaterId='$theaterId' && r.movieTime='$movieTime'";
														
														
														$result2  = mysqli_query($connection,$sql2);
														
															$notReservedSeatCount=1;
															$booleanValue=TRUE;
																					
											?>
																	<div class="col-md-1 ml-auto mr-auto defaultSeatClass" Id="<?php  echo (12*$i)+$j?>" onmouseenter="ChangeColor(this)" onmouseleave="ChangeColorMouseLeave(this)" onclick="SeatClick(this)">
																	<?php 
																	
																		echo 'G'.((12*$i)+$j); 
																		$columnCount++;
																		$booleanValue=false;
																	?>
																	
																	</div>	
											<?php
																
																		if($result2->num_rows > 0){
																			while($row2 = $result2->fetch_assoc()){
																				$getId =((12*$i)+$j);
																		
																				if($row2["seatId"]=='G'.((12*$i)+$j)){
																					
																					echo "<script> $('#'+$getId).addClass('reservedSeat'); </script>";
																					
																				}
																			}
																		}			
											?>							
															
																	
																	
															
															
											<?php				
														
													}else{
														
											?>
											
											<div class="col-md-1 ml-auto mr-auto "  > </div>

											<?php
													}
													
												}
											?>
										</div>
									  </div>
									  
									  
								  
									  
									  <div class="col-md-6 ml-auto mr-auto" >
										<div class="row">
											<?php
											
												for($j=7;$j<=12;$j++){
													
													if($databaseSeatCount!=$columnCount){
														
														$sql2="select seatId from seatreservation s,reservation r where s.reservationId=r.reservationId && r.date='$movieDate' && r.movieTime='$movieTime'&& r.movieId='$movieId'&& r.theaterId='$theaterId'";
														
														$result2  = mysqli_query($connection,$sql2);
														
															$notReservedSeatCount=1;
															$booleanValue=TRUE;
																					
											?>
																	<div class="col-md-1 ml-auto mr-auto defaultSeatClass" Id="<?php  echo (12*$i)+$j?>" onmouseenter="ChangeColor(this)" onmouseleave="ChangeColorMouseLeave(this)" onclick="SeatClick(this)">
																	<?php 
																	
																		echo 'G'.((12*$i)+$j); 
																		$columnCount++;
																		$booleanValue=false;
																	?>
																	
																	</div>	
											<?php
																
																		if($result2->num_rows > 0){
																			while($row2 = $result2->fetch_assoc()){
																				$getId =((12*$i)+$j);
																		
																				if($row2["seatId"]=='G'.((12*$i)+$j)){
																				 echo "<script> $('#'+$getId).addClass('reservedSeat'); </script>";
																				
																				}
																			}
																		}			
											?>							
															
																	
																	
															
															
											<?php				
														
													}else{
														
											?>
											
											<div class="col-md-1 ml-auto mr-auto "  > </div>

											<?php
													}
													
												}
											?>
										</div>
									  </div>
									  
							
								</div>
								<br>
							<?php	
							}
							?>
							
							
							
				
                    
                      
		
                    <br>

                  

                    <div class="row" style="margin-left: 100px">

                        <div class="col-md-4 ml-auto mr-auto">
                            <label style="background-color: Blue ;height: 50px;width:50px;"></label> <p>Selected </p>
                        </div>
                        <div class="col-md-4 ml-auto mr-auto">
                            <label style="background-color: green ;height: 50px;width:50px;"></label> <p>Available</p>
                        </div>
                        <div class="col-md-4 ml-auto mr-auto btn-raised">
                            <label  style="background-color:red ;height: 50px;width:50px;"></label> <p>Reserved</p>
                        </div>
                    </div>

                    <h3 class="title" style="text-align: center"><span id="NumberOFTickets"> 0 &nbsp;</span>Tickets are Selected</h3>


                    <div>
                        <span class="title" style="margin-left: 230px">Adults</span>
                        <div class="btn-group " style="margin-left: -70px;">
                            <button class="btn btn-round btn-info btn-sm" id="adultMinus" style="height: 40px;margin-top: 20px;margin-left: 100px" onclick="CountMinus()"> <i class="material-icons">remove</i> </button>
                            <h3 id="adultCount">&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;</h3>
                            <button class="btn btn-round btn-info btn-sm" id="adultPlus" style="height:40px;margin-top: 20px"> <i class="material-icons" onclick="CountFun()">add</i> </button>
                        </div>
                    </div>
                    <div>
                        <span class="title" style="margin-left: 230px">Kids</span>
                        <div class="btn-group " style="margin-left: -50px;">
                            <button class="btn btn-round btn-info btn-sm" id="kidMinus" style="height: 40px;margin-top: 20px;margin-left: 100px" onclick="MinusCountKid()"> <i class="material-icons">remove</i> </button>
                            <h3 id="kidCount">&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;</h3>
                            <button class="btn btn-round btn-info btn-sm" id="kidPlus" style="height: 40px;margin-top: 20px" onclick="CountFunKids()"> <i class="material-icons">add</i> </button>
                        </div>
                    </div>


                </div>

                <div class="col-md-4 ml-auto mr-auto " >
					
                        <img  class="img-raised" src="<?php echo  $moviePhotoLink ?>" style="height: 250px;width: 375px;margin-top: 50px">
                        <h4 class="title" style="text-align: left">Film Name : <p><?php echo $movieName ?> </p></h4>
                        <h4 class="title" style="text-align: left">Date : <span><?php echo $movieDate ?> </span></h4>
                        <h4 class="title" style="text-align: left">Time :   <span id="movieHiddenTime"><?php echo $movieTime;?></span></h4>
                        <h4 class="title" style="text-align: left">Theatre : <span><?php echo $theaterName;?></span></h4>
                        <h4 class="title" style="text-align: left">City    : <span><?php echo $city;?></span></h4>

                        <h4 class="title" style="text-align: left">Seat Type <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adults : <span> 2</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span>Kids : <span> 2</span> </span></h4>
                        <h4 class="title" style="text-align: left; " >Seat Numbers : <span id="seatNumbers"></span></h4>
						<input type="hidden" name="seatNumbers" id="hidenSeatNumbers">
						<input type="hidden" name="adult" >
						<input type="hidden" name="children" >
                        <h4 class="title" style="text-align: left; ">Total :&nbsp;&nbsp; <span id="total"></span></h4>
						<input type="hidden" name="Total" >
						<!--<a class="btn btn-danger" style="margin-left: 300px" href="ConfirmBooking.php?movieId=<?php echo $movieId ?> & movieTime= <?php echo $showTime ?>& movieDate= <?php echo $date?> & theaterName = <?php echo $theaterName?> & city=<?php echo $city ?> & theaterId= <?php echo $theaterId ?>">

               $.get("BuyTicket1Ajax.php",{operation1:searchDate,operation2:curmovieId},function(result,status){
						 document.getElementById("cardClass").innerHTML=result;                      
					});
						</a>
						
						<a type="submit" class="btn btn-danger" style="margin-left: 300px" href="ConfirmBooking.php?movieId=<?php echo $movieId ?>&movieTime= <?php echo $movieTime ?> & movieDate= <?php echo $movieDate?> & theatername=<?php echo $theaterName ?> & city=<?php echo $city ?> & theaterId= <?php echo $theaterId ?> & seatNumbers=<?php echo $_GET["seatNumbers"]?>">
							Payment
						</a>-->
					   <form action="" method="get">
							
							<input type="hidden" name="movieName" id="hiddenfilmName" value="<?php echo $movieName ?>">
							<input type="hidden" name="theater" id="hiddentheater" value="<?php echo $theaterName ?>">
							<input type="hidden" name="theaterId" id="hiddentheaterId" value="<?php echo $theaterId ?>">
							<input type="hidden" name="movieId" id="hiddenmovieId" value="<?php echo $movieId ?>">
							<input type="hidden" name="city" id="hiddencity" value="<?php echo $city ?>">
							<input type="hidden" name="date" id="hiddendate" value="<?php echo $movieDate ?>">
							<input type="hidden" name="time" id="hiddentime" value="<?php echo $movieTime ?>">
							<input type="hidden" name="adults" id="hiddenadults" >
							<input type="hidden" name="kids" id="hiddenkids">
							<input type="hidden" name="seatNumbers" id="hiddenseatNumbers" >
							<input type="hidden" name="total" id="hiddentotal"  value="RS : 2000">
							<input type="hidden" name="photoLink" id="hiddenphotoLink" value="<?php echo $moviePhotoLink ?>">
							
							
							<table style="display:none" id="seatTable" >
								  <tr>
									<th></th>
								  </tr>
								  
								</table>
							
					   </form>
					   							<button class="btn btn-danger" style="margin-left: 300px" id="btnPayment" onclick="sendArray();"> Payment </button>

						
						
						
						
				 
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

// -------------Date Time Picker----------
$('.datetimepicker').datetimepicker({

            format: 'DD/MM/YYYY',

            icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
}
});
</script>

<script>
	
	var seatArray=[];
	
	////////////////////////hidden values//////////////////////
	
	 var movieAdults;
	 var movieKids;
	 var movieTotal=parseInt(2000);
	 var total;
///    var movieDatehidden = $_GET["date"];
 //   var adultshidden = $_GET["adults"];
//	var kidshidden=$_GET["kids"];
//    var cityhidden=$_GET["city"];
//	var seatNumbershidden=$_GET["seatNumbers"];
//	var totalhidden= $_GET["total"];
//	var theaterIdhidden=$_GET["theaterId"];
//	var theaterNamehidden = $_GET["theater"];
    $(document).ready(function() {
        var minus = document.getElementById("adultCount").textContent;
        var kidMinus = document.getElementById("kidCount").textContent
        if(minus == 0 || kidMinus==0){
            document.getElementById("adultMinus").disabled = true;
            document.getElementById("kidMinus").disabled = true;

        }
		
		document.getElementById("btnPayment").disabled = true;

    });



    //////////////////////// plus and mins function for kids and adult ////////////////////////////////////
    function CountFun(){
        var ticketCount= document.getElementById("NumberOFTickets").textContent;
        var count=0;
        var plus = document.getElementById("adultCount").textContent;
        var kidCount = document.getElementById("kidCount").textContent;
        if(parseInt(plus)+parseInt(kidCount)!=parseInt(ticketCount)){

            if(parseInt(plus) < parseInt(ticketCount) ){

                if(plus !=0 || plus ==0 ){
                    document.getElementById("adultMinus").disabled = false;
                    count=parseInt(plus)+parseInt(1);
                    var divData= document.getElementById("adultCount");
                    divData.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+count+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";//this part has been edited

                    ticketCount= document.getElementById("NumberOFTickets").textContent;
                    plus = document.getElementById("adultCount").textContent;

                    if(parseInt(plus)==parseInt(ticketCount) || parseInt(plus)+parseInt(kidCount)==parseInt(ticketCount) ){
                        console.log("GGG");
                        document.getElementById("kidPlus").disabled = true;
                        document.getElementById("adultPlus").disabled =true;
						
						document.getElementById("seatNumbers").innerHTML=seatArray;
						
						document.getElementById("hiddenseatNumbers").value=seatArray;
						<?php $_SESSION["seatArraySession"]="seatArray" 
							
						?>
						
						var kidsPrice = <?php echo $kidsPrice?>;
						var adultPrice =<?php echo $adultsPrice ?>;
						
						var total=kidsPrice * parseInt(kidCount)+adultPrice*parseInt(plus);
						
						document.getElementById("total").innerHTML=parseInt(total);
						document.getElementById("hiddenadults").value=parseInt(plus);
						document.getElementById("hiddenkids").value=parseInt(kidCount);
						movieAdults=parseInt(adultCount);
						movieKids=parseInt(kidCount);
						document.getElementById("btnPayment").disabled = false;
						
						
						  var tab = document.getElementById("seatTable");
						  for (row = 0; row < seatArray.length; row++){
							var	tr = document.createElement('tr');
							var trdata = document.createTextNode(seatArray[row]);
							tr.appendChild(trdata);
							
							tab.appendChild(tr);
						  }
                    }else{
						document.getElementById("btnPayment").disabled = true;
					}
                }
            }
        }
    }

    function CountMinus(){
        var minus = document.getElementById("adultCount").textContent;
        if(minus != 0){
            var minusCount = parseInt(minus)-parseInt(1);
            var minusDiv = document.getElementById("adultCount");
            if(minusCount==0){
                document.getElementById("adultMinus").disabled = true;
            }
            minusDiv.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ minusCount +"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

           var ticketCount= document.getElementById("NumberOFTickets").textContent;
            var adultCount = document.getElementById("adultCount").textContent;
           var  kidCount =  document.getElementById("kidCount").textContent;

           if(parseInt(adultCount)+parseInt(kidCount) < parseInt(ticketCount)){
               document.getElementById("kidPlus").disabled = false;
               document.getElementById("adultPlus").disabled =false;
			   document.getElementById("btnPayment").disabled = true;
           }

        }else{
            document.getElementById("adultMinus").disabled = true;

        }

    }

    function CountFunKids(){

        var ticketCount= document.getElementById("NumberOFTickets").textContent;
        var count=0;
        var adultCount= document.getElementById("adultCount").textContent;
        var kidCount  = document.getElementById("kidCount").textContent;

        if(parseInt(adultCount)+ parseInt(kidCount)!=parseInt(ticketCount)){

            console.log("KidCount" +kidCount);
            console.log("adultCount" +adultCount);
            console.log("ticketCount" +ticketCount);

            if(parseInt(kidCount) < parseInt(ticketCount) ){

                if(kidCount !=0 || kidCount ==0 ){

                    document.getElementById("kidMinus").disabled = false;
                    count=parseInt(kidCount)+parseInt(1);
                    var divData= document.getElementById("kidCount");
                    divData.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+count+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";//this part has been edited

                    ticketCount= document.getElementById("NumberOFTickets").textContent;
                    adultCount = document.getElementById("adultCount").textContent;
                    kidCount =  document.getElementById("kidCount").textContent;

                    if(parseInt(kidCount)==parseInt(ticketCount) || parseInt(adultCount)+parseInt(kidCount)==parseInt(ticketCount) ){

                        document.getElementById("kidPlus").disabled = true;
                        document.getElementById("adultPlus").disabled =true;
						document.getElementById("seatNumbers").innerHTML=seatArray;
						document.getElementById("hiddenseatNumbers").valus=seatArray;
						
						document.getElementById("hiddenadults").value=parseInt(adultCount);
						movieAdults=parseInt(adultCount);
						movieKids=parseInt(kidCount);
						document.getElementById("hiddenkids").value=parseInt(kidCount);
						document.getElementById("btnPayment").disabled = false;
						
						var kidsPrice = <?php echo $kidsPrice?>;
						var adultPrice =<?php echo $adultsPrice ?>;
						
						 total=kidsPrice * parseInt(kidCount)+adultPrice*parseInt(adultCount);
						document.getElementById("total").innerHTML=parseInt(total);
						console.log('Lengthsssssss'+seatArray.length);
						console.log('Lengthsssssss000000'+seatArray[0]);
						console.log('Lengthsssssss111111'+seatArray[1]);
						 var tab = document.getElementById("seatTable");
						  for (row = 0; row < seatArray.length; row++){
							var	tr = document.createElement('tr');
							var trdata = document.createTextNode(seatArray[row]);
							tr.appendChild(trdata);
							
							tab.appendChild(tr);
						  }
                    }else{
						document.getElementById("btnPayment").disabled = true;
					}
                }
            }
        }

    }

    function MinusCountKid(){
        var minus = document.getElementById("kidCount").textContent;
        if(minus != 0){
            var minusCount = parseInt(minus)-parseInt(1);
            var minusDiv = document.getElementById("kidCount");
            if(minusCount==0){
                document.getElementById("kidMinus").disabled = true;
            }
            minusDiv.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ minusCount +"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

            var ticketCount= document.getElementById("NumberOFTickets").textContent;
            var adultCount = document.getElementById("adultCount").textContent;
            var  kidCount =  document.getElementById("kidCount").textContent;

            if(parseInt(adultCount)+parseInt(kidCount) < parseInt(ticketCount)){
                document.getElementById("kidPlus").disabled = false;
                document.getElementById("adultPlus").disabled =false;
				document.getElementById("btnPayment").disabled = true;
            }
        }else{
            document.getElementById("kidMinus").disabled = true;

        }
    }
	
	function SendFunction(){
		
	}


    ////////////////////////////////////////End of function//////////////////////////


    ////////////////////////////////////////////Mouse enter and leave Function ///////////////

    function ChangeColor(divName){
        var idName = divName.id;
        /*if($("#"+idName).hasClass("defaultSeatClass")){
            $("#"+idName).addClass("mouseEnter");
            $("#"+idName).removeClass("defaultSeatClass");
        //}*/
		 if($(divName).hasClass("defaultSeatClass")){
            $(divName).addClass("mouseEnter");
            $(divName).removeClass("defaultSeatClass");
        }
    }

    function ChangeColorMouseLeave(divName1){
        var idName2 = divName1.id;
        /*if($("#"+idName2).hasClass("mouseEnter")){
            console.log('ddddddds');
            $("#"+idName2).removeClass("mouseEnter");
			$("#"+idName2).addClass("defaultSeatClass");
        }*/
		if($(divName1).hasClass("mouseEnter")){
            console.log('ddddddds');
            $(divName1).removeClass("mouseEnter");
			$(divName1).addClass("defaultSeatClass");
        }
    }

    function SeatClick(divName2) {
        var idName = divName2.id;

        if($(divName2).hasClass("seatClickClass") ){

            $(divName2).removeClass("seatClickClass");
            var count= document.getElementById("NumberOFTickets").textContent;
            count=parseInt(count)-parseInt(1);
            var divData= document.getElementById("NumberOFTickets");
            divData.innerHTML=count+"&nbsp;&nbsp;&nbsp;";
			
			
			console.log('OLdArray');
			console.log(seatArray);
			console.log("idName"+idName);
			var index1 = seatArray.indexOf("G"+idName);
			if (index1 > -1) {
				seatArray.splice(index1);
			}
			console.log('NewArray');
			console.log(seatArray);
			
        }else if($(divName2).hasClass("reservedSeat")){

        }
        else{
            var idName = divName2.id;
            $(divName2).addClass("seatClickClass");
            var count= document.getElementById("NumberOFTickets").textContent;
            count=parseInt(count)+parseInt(1);
			seatArray.push('G'+idName);
			console.log(seatArray);

            var divData= document.getElementById("NumberOFTickets");
            divData.innerHTML=count+"&nbsp;&nbsp;&nbsp;";
        }


    }
	
	function sendArray(){
		
		
		//var moviePhotoLink=<?php echo $moviePhotoLink ?>;
		var movieDate="<?php echo $movieDate ?>" ;
		var movieTime = document.getElementById("movieHiddenTime").textContent;
		console.log('ddddddddddggggggg'+movieTime);
		var moviId="<?php echo $movieId ?>";
		var theaterId="<?php echo $theaterId ?>";
		var theaterName="<?php echo $theaterName ?>";
		var city="<?php echo $city ?>";
		//var movieDate=<?php echo $movieDate ?>;
		//var movieTimes =<?php echo $movieTime ?>;
			   var jsonString = JSON.stringify(seatArray);
			   console.log('sddddddddd'+jsonString);
			   
				$.ajax({ 
					   type: "POST", 
					   url: "reservation.php", 
					   data: {array: seatArray}, 
					  
				});
		
	//var url = "ConfirmBookings.php?$movieId="+moviId+ ";
	var url = "ConfirmBooking.php?movieId=" +moviId+"&time="+movieTime+"&date="+movieDate+"&adults="+movieAdults+"&kids="+movieKids+"&city="+city+"&total="+total+"&theaterId="+theaterId+"&theater="+theaterName+"&seatNumbers="+seatArray;
	//var url="ConfirmBooking.php?movieId=" +moviId;
	window.location.href = url;
	$.ajax({ 
					   type: "POST", 
					   url: "ConfirmBooking.php", 
					   data: { kvcArray : seatArray}, 
					  
				});
//	var url = "ConfirmBooking.php?$movieId=" + mymonth + "&time=" + myday + "&date=" + myyear+"&adults="++"&kids="++"&city="++"&seatNumbers="++"&total="++"&theaterId="++"&theater="++"&seatArrays="+seatArray+;
      //   window.location.href = url;
		
		

	}



</script>
</body>

</html>