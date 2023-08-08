<?php 

function PasswordHash($password)
{

    $opts = [ "cost" => 10 ];
    $hashp = password_hash($password, PASSWORD_BCRYPT, $opts);
    return $hashp; 
}
function PasswordVerify($password, $hashed_password)
{
    $result = password_verify($password,$hashed_password);
    return $result ;
}
?>