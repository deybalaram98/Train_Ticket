<!--php code***************                   start-->
<?php
session_start();

if(isset($_POST['btns'])){
include("db.php");





  //echo "success connecting to the db";
  $name = $_POST['name1'];
  $password = $_POST['password1'];

$sql1 = "SELECT * FROM `traininfo`.`reg` WHERE `username`='".$name."' AND  `password`='".$password."'";
$result1 = $con->query($sql1);
if ($result1->num_rows > 0) {
	//echo "<script>alert('Successful');</script>";
	$_SESSION['usernames']=$name; 
	echo "<script>window.location.href = 'ticket.php';</script>";
	$con->close();
	exit;

} 
else{
	
	echo "<script>alert('invalid username and password');</script>"; 
	echo "<script>window.location.href = 'login.php';</script>";
	$con->close();
	exit;	
}
}
?>
<!--php code***************                   complete-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <title>GoRail.com</title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <link rel="stylesheet" type="text/css" href="reg_form.css">
	 
	 <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
h6 {
  background-color: none;
  color: yellow;
}
h6 {
  position: absolute;
  left: 29%;
  top: 100px;
}
</style>
	</head>
 <body>

	 <!--      navigation bar********start-->
	 <ul>
  <li><a class="active" href="login.php">Home</a></li>
  <li><a href="about.php">ABOUT US</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="tnews.php">AVAILABLE TRAIN</a></li>
</ul>
<div  class="heading">
<h6 style="font-size:70px;" >Welcome in GoRail</h6>
</div>	 
<!--      navigation bar********finish-->

  <div class="container">
      <div class="header">
	    <h2> LOG IN</h2>
	  </div>
	  <form class="form" method="POST" id="form" onsubmit="return validate()">
	     <div class="form-control">
		    <!--<label> user name</label> -->
			<input type="text" name="name1" id="name1" placeholder="Enter user name" required autofocus>
		 </div>
         <div class="form-control">
		    <!-- <label> Password</label>--> 
			<input type="password" name="password1" id="password1" placeholder="Enter your password" autocomplete="off" required >
		 </div>
		<input type="submit" value="Submit" class="btn" name="btns" id="btn">
	  </form>
	  <a href="reg.php" style="text-decoration: none;"><input type="button"  value="New Registration" class="btn1" name="" id="btn1"></a>
   </div>
   </body>
   <script type="text/javascript">
   var name=document.getElementById('name1');
   var password1=document.getElementById('password1');
   function validate() {
	   if(name.value.length>0 && password1.value.length>0){
		   return true;
	   }else{
		   return false;
	   }
   }
   </script>
</html>