<?php
 
function  getAll($table,$conn)
{ 

    $sql = "SELECT  * FROM $table ";

    return $query_run = mysqli_query($conn,$sql);
}

function  getLimit($table,$start,$end,$conn){ 

   
    $sql = "SELECT   * FROM $table limit $start,$end ";
    
    return $query_run = mysqli_query($conn,$sql);
}

function paging($product_page)

{   
    if(isset($_GET['page']))
    {
        if($_GET['page'])
        {
            $page_current = $_GET['page'];
        }
        else
        {
            $page_current = 1;
        }
    }
    else $page_current = 1;

    if(mysqli_num_rows(getALL('product',$conn=connectdb()))%$product_page!=0)
        $pages = floor(mysqli_num_rows( getALL('product',$conn=connectdb()))/$product_page)+1;
    else $pages = mysqli_num_rows( getALL('product',$conn=connectdb()))/$product_page;
    $page_right = (($page_current+3)>$pages)?$pages:$page_current+3;
    $page_left = ($page_current<4)?1:$page_current-3;

    if($page_current ==1)
    {
        $products = getLimit('product',0,$product_page ,$conn=connectdb());
    }
    else
    {   
        $product_start=($page_current-1)*$product_page;
        $products = getLimit('product',$product_start,$product_page,$conn=connectdb());
    }
    return array($page_left,$page_right,$page_current,$products,$pages); 
}

function page_bar($page_current,$page_left,$page_right,$pages)
{
    if($page_current!=1 )
    {
        echo' <a href="index.php?act=product&page=1" class="btn btn-outline-secondary"><<</a> ';
        if($page_current-3>1)
        echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
    }
    
    for($i=$page_left ;$i<=$page_right;$i++ )
    {   if ($page_current==$i)
        echo' <a href="index.php?act=product&page='.$i.'" class="active btn btn-outline-secondary">'.$i.'</a>';
        else
        echo' <a href="index.php?act=product&page='.$i.'" class="btn btn-outline-secondary">'.$i.'</a>';
    }
    if($page_current<$pages)
    {
    if($page_current+3<$pages)
    echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
    echo'<a href="index.php?act=product&page='.$pages.'" class="btn btn-outline-secondary">>></a> ';
    }
}   


function  updateCategory($table, $category_name, $category_id, $conn){ 

    $sql = "UPDATE $table SET category_name = '$category_name' WHERE (category_id = '$category_id')";
    
    return $query_run = mysqli_query($conn,$sql);
}

function  deleteCategory($table, $category_id, $conn){ 

    $sql = "DELETE FROM $table WHERE (category_id = $category_id);";
    
    return $query_run = mysqli_query($conn,$sql);
}

function  addCategory($table, $category_name, $conn){ 

    $sql = "INSERT INTO $table (category_name) VALUES ('$category_name')";
    
    $query_run = mysqli_query($conn,$sql);

    if($query_run)
    { 
        $_SESSION['message-ad'] = 'Thêm danh mục thành công!';
    }
    else
    {  
        $_SESSION['message_warning-ad'] = 'Đã xảy ra lỗi.';
    }
}

?>