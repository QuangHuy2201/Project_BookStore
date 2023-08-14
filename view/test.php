<?php
function get_AUTO_INCREMENT($table)
{
    $sql = "SELECT `AUTO_INCREMENT`
            FROM  INFORMATION_SCHEMA.TABLES
            WHERE TABLE_SCHEMA = 'bookstore'
            AND   TABLE_NAME   = '$table'";

    return $query_run = mysqli_query($conn,$sql);
}
$a =  get_AUTO_INCREMENT('user');
echo $a;
?>