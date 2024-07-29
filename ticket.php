<?php
session_start();
include "db.php";

if($_SESSION['usernames'] == "" || !isset($_SESSION['usernames'])) 
       {
          ?>
  <script>
     window.location.href="http://localhost/phpprograms/login.php";
  </script>
  <?php  
       }

?>
<h9 position="absolute" style="color: white;">Available Train<h9>
<table border= 2 bgcolor="OldLace" width=100% >
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
     
      ?>
      </table>



<?php
$user=$_SESSION['usernames'];



if(isset($_POST['btn3'])){
include("db.php");
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
 $tnum = $_POST['tnum'];
 $jdate = $_POST['jdate'];
 $start = $_POST['start'];
 $finish = $_POST['finish'];
 //$btime = $_POST['btime'];
 $bp = $_POST['bp'];
  $sql2 = "INSERT INTO `traininfo`.`book` (`fname`, `lname`, `age`,`gender`, `tnum`, `jdate`, `startf`, `finish`, `username`, `bp`) VALUES ('".$fname."','".$lname."','".$age."','".$gender."','".$tnum."','".$jdate."','".$start."','".$finish."','".$user."','".$bp."');";

  //if($con->query($sql2)== true){
     // echo "success";
 // }
  //next page
  if($con->query($sql2)== true){
	//$_SESSION['tnum']=$tnum;
	echo "<script>alert('registered');</script>";
  echo "<script>window.location.href ='showticket.php';</script>";
  exit;
 }
 $con->close();
 
}
//html code//
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <title>GoRail.com</title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <link rel="stylesheet" type="text/css" href="reg_form.css">
  </head>
 <body> 
  <div class="contain">
      <div class="heade">
	    <h2> BOOK TICKET <?php echo $user;?></h2>
	  </div>
	  <form class="form" action="ticket.php" method="post" id="form">
	     <div class="form-control">
		    <label> First name</label> 
			<input type="text" name="fname" id="fname" placeholder="Enter first name" required autofocus>
		 </div>
		 <div class="form-control">
		    <label> Last name</label> 
			<input type="text" name="lname" id="lname" placeholder="Enter lirst name" required>
		 </div>
		 
		 <div class="form-control">
		    <label> Age </label> 
			<input type="number" name="age" id="age" placeholder="Enter Age" required>
		 </div>
		 <div class="form-control">
		    <label> Gender</label> 
			<!--<input type="text" name="gender" id="gender" placeholder="Enter gender" required>-->
			<select name="gender" id="gender" required>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
           </select>
		 </div>
		 <div class="form-control">
		    <label> Train Number</label> 
			<!--<input type="text" name="tnum" id="tnum" placeholder="Enter Train Number" required>-->
			<select name="tnum" id="tnum" required>
               <option value="12378">12378(Padatik Express)</option>
               <option value="12346">12345(Saraighat Express)</option>
			   <option value="13142">11142(Teesta Torsha Expres)</option>
			   <option value="13148">13147(Uttar Banga Express)</option>
           </select>
		 </div>
		 <div class="form-control">
		    <label> Date of Journey</label> 
			<input type="date" name="jdate" id="jdate"  autocomplete="off" required>
		 </div>
		 <div class="form-control">
		    <label> Boarding station</label> 
			<!--<input type="text" name="start" id="start" placeholder="Enter Boarding station" required>-->
			<select name="start" id="start" required>
               <option value="New Coochbehar">New Coochbehar</option>
               <option value="Sealdah">Sealdah</option>
           </select>
		 </div>
		 <div class="form-control">
		    <label> Destination Station</label> 
			<!--<input type="text" name="finish" id="finish" placeholder="Enter Destination Station" required>-->
			<select name="finish" id="finish" required>
               <option value="New Coochbehar">New Coochbehar</option>
               <option value="Sealdah">Sealdah</option>
           </select>
		 </div>
		 <div class="form-control">
		    <label>Berth Preference </label> 
			<select name="bp" id="bp" required>
               <option value="Lower">Lower</option>
               <option value="Middle">Middle</option>
			   <option value="Upper">Upper</option>
			   <option value="Side Lower">Side Lower</option>
			   <option value="Side Upper">Side Upper</option>
           </select>
		 </div>
		 <a href="showticket.php" style="text-decoration: none";><input type="submit" value="Submit" class="btn3" name="btn3"></a>
	  </form>
	  <!-- <a href="showticket.php"><input type="submit" value="Submit" class="btn" name="btn"></a>-->
   </div>
   <!--INSERT INTO `book` (`sno`, `fname`, `lname`, `age`, `tnum`, `jdate`, `start`, `finish`) VALUES ('1', 'balaram', 'dey', '35', '2574', '2021-08-13', 'coochbehar', 'kolkata');-->
   </body>
   <script type="text/javascript">




   </script>
</html>