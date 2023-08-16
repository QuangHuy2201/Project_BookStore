<?php
    
function  getAllUser($table,$conn)
{ 

    $sql = "SELECT * FROM $table ";

    return $query_run = mysqli_query($conn,$sql);
}
function  updateUser($table, $full_name, $phone, $user_id, $conn){ 

    $sql = "UPDATE $table SET full_name = '$full_name', phone = '$phone' WHERE (user_id = '$user_id')";
    
    return $query_run = mysqli_query($conn,$sql);
}

function  deleteUser($table, $user_id, $conn){ 

    $sql = "DELETE FROM $table WHERE (user_id = $user_id);";
    
    return $query_run = mysqli_query($conn,$sql);
}



?>