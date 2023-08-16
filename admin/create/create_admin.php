<?php
include "../../model/connectdb.php";
include "./model/passwordBcrypt.php";

$user_name = "Admin";
$email = "admin@gmail.com";
$password = "123";
$password = PasswordHash($password);
$user_role = "1";
 
$insert = "INSERT INTO user (user_name,email,password,role_id) VALUES ('$user_name','$email','$password','$user_role')";
$insert_query_run = mysqli_query(connectdb(),$insert);
if($insert_query_run)
echo"Successful";
?>