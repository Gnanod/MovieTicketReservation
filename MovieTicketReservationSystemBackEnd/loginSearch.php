<?php
session_start();
require 'config.php';

 $useremail = $_POST["userNames"];
 $password = $_POST["password"];

echo $password ;

    if(!$connection){
        echo mysqli_connect_error();
    }else{
        $sql = "Select * from customer where email='$useremail'";
      
        $result = mysqli_query($connection,$sql);

        $row = $result->fetch_assoc();

            
        if(md5($password) == $row['password']){

        }else{
            $_SESSION['LoginError']="Password Is Incorrect please enter Valid Password = $password"; 
        }

        if($useremail == $row['email']){

        }else{

            $_SESSION['LoginError']="UserName Is Incorrect please enter Valid UserName = $useremail"; 
        }



        if(md5($password) === $row['password'] && $useremail === $row['email']){
            
            $_SESSION["loggingSession"] = "logged";
           
            $_SESSION['ID'] = $row['AdminId'];
            $_SESSION['LoginError']=NULL;
			 header("Location:  index1.php");
         
          
        }else{
				
           header("Location:login.php");

           

        }
    }

?>