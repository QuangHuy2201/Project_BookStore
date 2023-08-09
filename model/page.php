<?php
function paging($product_page)
{   
    if(isset ($_GET['category']) && $_GET['category']!=0 )
    {   $category_id=$_GET['category'];
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

        if(mysqli_num_rows(getAll_category('product',$category_id,$conn=connectdb()))%$product_page!=0)
            $pages = floor(mysqli_num_rows( getAll_category('product',$category_id,$conn=connectdb()))/$product_page)+1;
        else $pages = mysqli_num_rows( getAll_category('product',$category_id,$conn=connectdb()))/$product_page;
        $page_right = (($page_current+3)>$pages)?$pages:$page_current+3;
        $page_left = ($page_current<4)?1:$page_current-3;
        if($page_current ==1)
        {  
             $products = getLimit_category('product',$category_id,0,$product_page ,$conn=connectdb());
        }
        else
        {   
            $product_start=($page_current-1)*$product_page;
            $products = getLimit_category('product',$category_id,$product_start,$product_page,$conn=connectdb());
        }
    }
    else
    {   
        $category_id=0;
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

        if(mysqli_num_rows(getAll('product',$conn=connectdb()))%$product_page!=0)
            $pages = floor(mysqli_num_rows( getAll('product',$conn=connectdb()))/$product_page)+1;
        else $pages = mysqli_num_rows( getAll('product', $conn=connectdb()))/$product_page;
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
       
    }

    
    return array($page_left,$page_right,$page_current,$products,$pages,$category_id);     
     
     
}
function page_bar($page_current,$page_left,$page_right,$pages,$category_id){

    if($category_id!=0)
    {
        if($page_current!=1)
        {
            echo' <a href="index.php?act=product&category='.$category_id.'&page=1" class="btn btn-outline-secondary"><<</a> ';
            if($page_current-3>1)
            echo' <a href="index.php?act=product&page=" class=" disabled btn btn-outline-secondary">...</a> ';
        }
        
        for($i=$page_left ;$i<=$page_right;$i++ )
        {   if ($page_current==$i)
            echo' <a href="index.php?act=product&category='.$category_id.'&page='.$i.'" class="active btn btn-outline-secondary">'.$i.'</a>';
            else
            echo' <a href="index.php?act=product&category='.$category_id.'&page='.$i.'" class="btn btn-outline-secondary">'.$i.'</a>';
        }
        if($page_current<$pages)
        {
        if($page_current+3<$pages)
        echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
        echo'<a href="index.php?act=product&category='.$category_id.'&page='.$pages.'" class="btn btn-outline-secondary">>></a> ';
        }
    }
    else
    {
        if($page_current!=1)
    {
        echo' <a href="index.php?act=product&page=1" class="btn btn-outline-secondary"><<</a> ';
        if($page_current-3>1)
        echo' <a href="index.php?act=product&page=" class=" disabled btn btn-outline-secondary">...</a> ';
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
}          
?>