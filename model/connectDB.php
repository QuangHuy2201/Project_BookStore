<?php

function connectdb(){

  $servername="localhost";
  $username="root";
  $password="231077";
  $dbname = "bookstore";


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully  <br>";
  return $conn ;
}

?>