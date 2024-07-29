<?php
session_start();

if(isset($_POST['btn'])){
include("db.php");

  //echo "success connecting to the db";
  $name = $_POST['name'];
  $password = $_POST['password'];

$sql1 = "SELECT * FROM `traininfo`.`reg` WHERE `username`='".$name."' AND  `password`='".$password."'";
$result1 = $con->query($sql1);
if ($result1->num_rows > 0) {
	echo "<script>alert('Already registered');</script>"; 
	echo "<script>window.location.href = 'reg.php';</script>";
	$con->close();
	exit;
} 

  $sql = "INSERT INTO `traininfo`.`reg` (`username`, `password`) VALUES ('".$name."','".$password."');";
  //echo $sql;

  if($con->query($sql)== true){
     //echo "<script>alert('registered');</script>";
	 header('Location: login.php');
	echo "<script>window.location.href = 'login.php';</script>";
     exit;
  }
  else {
	header('Location: reg.php');
	exit;
      //echo "ERROR: $sql <br> $con->error";
  }
  $con->close();
}
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
  <div class="container">
      <div class="header">
	    <h2> NEW USER </h2>
	  </div>
	  <form class="form"  method="POST" id="form" onsubmit="return validate()">
	     <div class="form-control">
		    <label> user name</label> 
			<input type="text" name="name" id="name" placeholder="Enter user name" required autofocus >
		 </div>
         <div class="form-control">
		    <label> Password</label> 
			<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off"  required>	
		 </div>
		 <div class="form-control">
		    <label> Confirm password</label> 
			<input type="password" name="cpassword" id="cpassword" placeholder="Enter your confirm password" autocomplete="off" onkeyup="check(this)"  required>
			<error id="alert"></error>
		 </div>
		 <a href="login.php" style="text-decoration: none";><input type="submit" value="Submit" class="btn" name="btn"></a>
	  </form>
   </div>
  
   </body>
   <!-- registration validation          ******************  start-->
   <script type="text/javascript">
   var password=document.getElementById('password');
   var flag=1;// mean no error
   function check(conpas){
     if (conpas.value.length>0) {
		 if (conpas.value != password.value) {
			 document.getElementById('alert').innerText = "Confirm password doesnot match";
			 flage=1;
		 } else {
			document.getElementById('alert').innerText = "";
		 }
	 }
	else{
		document.getElementById('alert').innerText = "please Enter the Confirm password";
		flage=1;
	}
   }
   function validate() {
	   if(flage==1){
		   return true;
	   }else{
		   return false;
	   }
   }
   </script>
   <!-- registration validation          ******************  complete-->
</html>