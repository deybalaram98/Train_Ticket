<?php
session_start();
include "db.php";
?>
<p1 position="absolute" color="navy">Available Train<p1>
<table border= 2 bgcolor="yellow" width=100%>
<tr>
         <th>serial.no </th>  
         <th> Train Name</th>
         <th> Boarding Station</th>
         <th>Destination Station</th>
		 <th>Boarding Time</th>
		 <th>Train Number</th>
 </tr>
<?php
      $sql1 = "SELECT * FROM train ;";


      $result1 = mysqli_query($con, $sql1);

     
      while($train = mysqli_fetch_array($result1)) { 

 ?>
        <tr>

          <td><?php echo $train["sr_no"]; ?> </td>
         <td><?php echo $train["train_name"]; ?></td>
         <td><?php echo $train["boarding_station"]; ?></td>
         <td><?php echo $train["destination_station"]; ?></td>
		 <td><?php echo $train["boarding_time"]; ?></td>
		 <td><?php echo $train["tnumber"]; ?></td>
        </tr>

        <?php 
      }
     // $_SESSION['uname']="";
      ?>
      </table>