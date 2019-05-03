<?php
     session_start();
	 require 'config.php';
	
    $movieId=$_GET["movieId"];
	$adults=$_GET["adults"];
	$kids=$_GET["kids"];
	$total=$_GET["total"];
    $movieTime= $_GET["movieTime"];
    $movieDate = $_GET["movieDate"];
    $city=$_GET["city"];
	$seatNumbers=$_GET["seatNumbers"];
	$total= $_GET["total"];
	$theaterId=$_GET["theaterId"];
	$theaterName = $_GET["theaterName"];
	$customerId =$_GET["customerId"];

	$seat=$_GET["seatNumbers"];
	
	$spaceMovieTime=preg_replace('/\s+/','',$movieTime);
	$spaceMovieDate=preg_replace('/\s+/','',$movieDate);
	
	 $myarray = explode(',',$seat);
	 $arraySize = sizeof($myarray);
	
	/* foreach($myarray as $newSeatone){
		 echo $newSeatone;
	 }*/
	    if(!$connection){
			echo mysqli_connect_error();
		}else{
			mysqli_autocommit($connection, false);
			//$sql1='insert into reservation values('','$movieId','$theaterId','$movieDate','$movieTime','$kids','$adults','$customerId')';
			$sql1="INSERT INTO `reservation`(`reservationId`, `movieId`, `theaterId`, `date`, `kidsCount`, `adultsCount`, `customerId`,`movieTime`) VALUES ('','$movieId','$theaterId','$spaceMovieDate','$kids','$adults','$customerId','$spaceMovieTime')";
			//echo $sql1;
			$result2=0;
			$countresult=0;
			$countresult=0;
		
			$result1=mysqli_query($connection,$sql1);
			 if($result1==TRUE){
			echo "kkkkkkkkk";
						$last_id = $connection->insert_id;
					foreach($myarray as $newSeatone){
							 $sql2="INSERT INTO `seatreservation`(`reservationId`, `seatId`) VALUES ('$last_id','$newSeatone')";
							 $result2=mysqli_query($connection,$sql2);	
							 if($result2==TRUE){
								 $countresult++;
							 }
						}
						if ($countresult == $arraySize) {
							mysqli_commit($connection);
							
							header("location:index1.php");
						} else {
							mysqli_rollback($connection);
						}
				
			 }
			mysqli_autocommit($connection, true);
		}
	mysqli_close($connection);
	
	
	
	
?>