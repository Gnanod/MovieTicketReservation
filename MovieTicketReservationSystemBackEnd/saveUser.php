<?php

	session_start();
    require 'config.php';
	
	$userName=$_POST["userNames"];
	$userEmail=$_POST["userEmail"];
	$userNic=$_POST["userNic"];
	$userMobile=$_POST["userMobile"];
	$userPassword=$_POST["userPassword"];
	
    $encriptPassword=md5($userPassword);
	
	if(!$connection){
			echo mysqli_connect_error();
	}else{
		$sql="INSERT INTO `customer`(`customerId`, `customerName`, `email`, `password`, `contacNumber`, `nic`) VALUES ('sdsf','$userName','$userEmail','$encriptPassword','$userNic','$userMobile')";
		
		
		$result=mysqli_query($connection,$sql);
		if($result==TRUE){
			 $_SESSION['saveSuccess']='Registered Successfully';
			header("location:login.php");
		}else{
			$_SESSION['saveFail']='Registered Fail';
			header("location:register.php");
		}
		
	}
?>