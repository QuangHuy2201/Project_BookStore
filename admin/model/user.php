<?php
    
function  getAllUser($table,$conn)
{ 

    $sql = "SELECT * FROM $table where role_id = 2";

    return $query_run = mysqli_query($conn,$sql);
}

?>