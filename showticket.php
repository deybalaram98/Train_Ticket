<?php
session_start();

if($_SESSION['usernames'] == "" || !isset($_SESSION['usernames'])) 
       {
          ?>
  <script>
     window.location.href="http://localhost/phpprograms/login.php";
  </script>
  <?php  
       }

include "db.php";



if($_SESSION['usernames'] == "" || !isset($_SESSION['usernames'])) 
       {
          ?>
  <script>  
    alert("<?php  echo $_SESSION['usernames'];     ?>")
    window.location.href="http://localhost/phpprograms/login.php";
  </script>
  <?php  
       }




$user=$_SESSION['usernames'];
//$tnum1=$_SESSION['tnum'];

?>
 <p1 > ticket details</p1>
<table border= 2 width= 100% bgcolor="yellow">
<tr>
        <th> Ticket Number </th>
          <th> First Name  </th>
          <th>Last Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Train Number</th>
          <th> Date of Journey</th>
          <th>Boarding Station</th>
          <th>Destination Station</th>
          <th>Boarding Time</th>
          <th>Seat Number</th>
          <th>Berth Preference</th>
      </tr>
<?php
      $sql1 = "SELECT train.*,book.* FROM train,book where username='$user' AND train.tnumber=book.tnum;";
      

      $result1 = mysqli_query($con, $sql1);
      
     
      while($train = mysqli_fetch_array($result1)) { 

        ?>
        
        <tr>
        <td><?php echo $train["sno"]; ?> </td>
          <td><?php echo $train["fname"]; ?> </td>
          <td><?php echo $train["lname"]; ?></td>
          <td><?php echo $train["age"]; ?></td>
          <td><?php echo $train["gender"]; ?></td>
          <td><?php echo $train["tnum"]; ?></td>
          <td><?php echo $train["jdate"]; ?></td>
          <td><?php echo $train["startf"]; ?></td>
          <td><?php echo $train["finish"]; ?></td>
          
          <td><?php echo $train["boarding_time"]; ?></td>
          <td><?php echo $train["sno"]; ?></td>
          <td><?php echo $train["bp"]; ?></td>
        </tr>
        

        <?php  
      }
      exit;
      $_SESSION['usernames']="";
      ?>
      </table>
