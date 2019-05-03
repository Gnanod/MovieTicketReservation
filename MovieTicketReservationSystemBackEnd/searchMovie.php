<?php
    session_start();
    require 'config.php';
    $operation1 = $_GET["operation1"];
    $operation2 = $_GET["operation2"];
    echo $operation2;
    echo "<script> console.log("<?php echo $operation2?>"); </script>"
    if(!$connection){

        echo mysqli_connect_error();
    }else{

        $sql = "select showTime from showtimedate where showDate=' $operation1' && movieId='$operation2'";
        // $sql="select s.startdate ,s.startime from movie m,showtime s where s.movieid= m.id && s.movieid ='$operation'";
        
        // $result  = mysqli_query($connection,$sql);
        // $sql1 = "SELECT `name` FROM `movie` WHERE id='$operation'";
        // $result1  = mysqli_query($connection,$sql1);
        // $row = $result1->fetch_assoc();

        // $name = $row['name'];

        // //echo $sql;
         
        //  if ($result->num_rows > 0) {
           
        //         // $rowData=mysqli_fetch_row($result);   <?php echo $row['startime'] 
        //         //echo $rowData[1];
        //         while($row = $result->fetch_assoc()){
        //             $startdate = $row['startdate'] ;
        //             $starttime =  $row['startime'] ;
        //         echo "
        //             <tr> 
        //               <td> $startdate</td>
        //              <td>  $starttime</td>
        //              <td><a href='ajax_request.php?startDate=$startdate&starttime=$starttime&name=$name'>Next</a></td>
        //              </tr>
        //         ";
        //     }
               
        //  }else{
        //    //  echo "";
        //  }
        mysqli_close($connection);
    }
?>
