<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "traininfo";

  $con = mysqli_connect($server, $username, $password,$database);

  if(!$con){
      die("database connection is failed due to " . mysqli_connect_error());
  }
  ?>