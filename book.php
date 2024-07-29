<?php
if(isset($_POST['name'])){
  $server = "localhost";
  $username = "root";
  $password = "";

  $con = mysqli_connect($server, $username, $password);

  if(!$con){
      die("database connection is failed due to " . mysqli_connect_error());
  }
  //echo "success connecting to the db";
  $name = $_POST['name'];
  $password = $_POST['password'];
  $sql = "INSERT INTO `traininfo`.`reg` (`username`, `password`) VALUES ('$name','$password');";
  echo $sql;

  if($con->query($sql)== true){
      echo "success";
  }
  else {
      //echo "ERROR: $sql <br> $con->error";
  }
  $con->close();
}