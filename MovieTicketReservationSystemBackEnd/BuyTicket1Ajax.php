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
</head>

<body></body>

</html>

<?php
	session_start();
    require 'config.php';
	 $date = $_GET["operation1"];
	 $movieId = $_GET["operation2"];


	
	    if(!$connection){
        echo mysqli_connect_error();
    }else{

       // $sql="select showTime from showtimedate where showDate='$date' && movieId='$movieId'";
	   
	   $sql ="select DISTINCT t.theaterName,t.theaterId ,t.city from showtimedate s ,theatermovie tm,theater t where s.movieId= tm.movieId && tm.theaterId=t.theaterId && showDate='$date' && s.movieId='$movieId'";
        
		$result  = mysqli_query($connection,$sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
						
						$theaterName= $row["theaterName"];
						$theaterId = $row["theaterId"];
					    $city = $row['city']  ; 
							   $sql2 ="select DISTINCT s.showTime,t.theaterName from showtimedate s ,theatermovie tm,theater t where s.movieId= tm.movieId && tm.theaterId=t.theaterId && showDate='$date' && t.theaterId='$theaterId'";
							   	$sql3="SELECT `adultPrice`, `kidsPrice` FROM `ticket` WHERE `movieId`='$movieId'";
								$result2  = mysqli_query($connection,$sql2);
								$result3  = mysqli_query($connection,$sql3);
								$row3 =$result3->fetch_assoc();
								$kidsPrice=$row3['kidsPrice'];
								$adultPrice=$row3['adultPrice'];
								if ($result2->num_rows > 0) {
										echo "
												<div class='row'>
													<div class='col-lg-6 col-md-6'>
														<div class='card bg-info'>
															<div class='card-body'>
													
																<h3 class='card-title'>
																	<a href='#pablo'>$theaterName - $city</a>
																</h3>";
																 
																	
																	while($row2 = $result2->fetch_assoc()){
																	
																		$showTime = $row2['showTime'];
																
																
																	  if(isset($_SESSION["loggingSession"])){
																	
															echo"	
															<a href='BuyTicket211Version1.php?movieId=$movieId & movieTime=$showTime & movieDate=$date & theaterName=$theaterName & city=$city & theaterId=$theaterId & kidsPrice=$kidsPrice & adultPrice=$adultPrice'>
																<button class='btn'> $showTime </button> 
															</a>
															
															
															";    
																	
																	  }else{
															echo"	
															<a href='login.php'>
																<button class='btn'> $showTime </button> 
															</a>
															
															
															"; 		  
																	  }
																		  
																												;
															
																	 } 
																	
										echo"					</div>
															<h3 style='margin-left:30px'>Adults Price : $adultPrice</h3>
															<h3 style='margin-left:30px;margin-top:-15px'> Kids Price&nbsp&nbsp&nbsp :$kidsPrice</h3>
														</div>
													</div>
												</div>
											";
								}
				/*		echo "
                    <div class='row'>
					<div class='col-lg-6 col-md-6'>
						<div class='card bg-info'>
						  <div class='card-body'>
						
							<h3 class='card-title'>
							  <a href='#pablo'>$FilmHAll And Address</a>
							</h3>
							
							 <button class='btn'>$MovieTime;</button>
							 
							 
						  </div>
						 
						</div>
					</div>
				</div>
                ";*/
						
				}	
			}
		
	}
?>