<?php 
 
include "connectDB.php";

function  getAll($table){ 

$conn=connectdb();
$sql = "SELECT   * FROM $table ";

return $query_run = mysqli_query($conn,$sql);
}
function  getLimit($table,$start,$end){ 

    $conn=connectdb();
    $sql = "SELECT   * FROM $table limit $start,$end ";
    
    return $query_run = mysqli_query($conn,$sql);
    }

function  getAll_Price_Desc($table){ 

    $conn=connectdb();
    $sql = "SELECT   * FROM $table ORDER BY price DESC ";
    
    return $query_run = mysqli_query($conn,$sql);
}

function  getAll_Price_ASC($table){ 

    $conn=connectdb();
    $sql = "SELECT   * FROM $table ORDER BY price ASC ";
    
    return $query_run = mysqli_query($conn,$sql);
}


function  getByID($table,$id){ 

    $conn=connectdb();
    $sql = "SELECT   * FROM $table Where product_id='$id'";
    
    return $query_run = mysqli_query($conn,$sql);
}


function  getByCategoryID($table,$category_id){ 

    $conn=connectdb();
    $sql = "SELECT   * FROM $table Where category_id='$category_id'";
    
    return $query_run = mysqli_query($conn,$sql);
}
function  getByCategoryID_Limit($table,$category_id){ 

    $conn=connectdb();
    $sql = "SELECT  * FROM $table Where category_id='$category_id' Limit 3 ";
    
    return $query_run = mysqli_query($conn,$sql);
}


?>