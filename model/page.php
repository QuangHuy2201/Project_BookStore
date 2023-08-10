<?php
function paging_to_category($product_page)
{   
    if(isset ($_GET['category']))
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
function paging_to_category_sort($product_page)
{   
    
    
    
    switch($_GET['sort'])
    {
        case 1:
            if(isset ($_GET['category']) && $_GET['category']!=0)
            {   $category_id=$_GET['category'];
                $sort =$_GET['sort'];
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
        
                if(mysqli_num_rows(getAll_View_Desc_to_category('product',$category_id,$conn=connectdb()))%$product_page!=0)
                    $pages = floor(mysqli_num_rows(getAll_View_Desc_to_category('product',$category_id,$conn=connectdb()))/$product_page)+1;
                else $pages = mysqli_num_rows(getAll_View_Desc_to_category('product',$category_id,$conn=connectdb()))/$product_page;
                $page_right = (($page_current+3)>$pages)?$pages:$page_current+3;
                $page_left = ($page_current<4)?1:$page_current-3;
                if($page_current ==1)
                {  
                     $products = getLimit_category_View_Desc('product',$category_id,0,$product_page ,$conn=connectdb());
                }
                else
                {   
                    $product_start=($page_current-1)*$product_page;
                    $products = getLimit_category_View_Desc('product',$category_id,$product_start,$product_page,$conn=connectdb());
                }
            
            }
            else
               {
                $category_id = 0;
                $sort =$_GET['sort'];
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

                if(mysqli_num_rows(getAll_View_Desc('product',$conn=connectdb()))%$product_page!=0)
                    $pages = floor(mysqli_num_rows( getAll_View_Desc('product',$conn=connectdb()))/$product_page)+1;
                else $pages = mysqli_num_rows( getAll_View_Desc('product', $conn=connectdb()))/$product_page;
                $page_right = (($page_current+3)>$pages)?$pages:$page_current+3;
                $page_left = ($page_current<4)?1:$page_current-3;

                if($page_current ==1)
                {
                    $products =  getLimit_View_Desc('product',0,$product_page ,$conn=connectdb());
                }
                else
                {   
                    $product_start=($page_current-1)*$product_page;
                    $products =   getLimit_View_Desc('product',$product_start,$product_page,$conn=connectdb());
                }
            
            }
            return array($page_left,$page_right,$page_current,$products,$pages,$category_id,$sort); 
            break;
        case 2:
            if(isset ($_GET['category']) && $_GET['category']!=0)
            {   $category_id=$_GET['category'];
                $sort =$_GET['sort'];
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
        
                if(mysqli_num_rows(getAll_Price_Desc_to_category('product',$category_id,$conn=connectdb()))%$product_page!=0)
                    $pages = floor(mysqli_num_rows(getAll_Price_Desc_to_category('product',$category_id,$conn=connectdb()))/$product_page)+1;
                else $pages = mysqli_num_rows(getAll_Price_Desc_to_category('product',$category_id,$conn=connectdb()))/$product_page;
                $page_right = (($page_current+3)>$pages)?$pages:$page_current+3;
                $page_left = ($page_current<4)?1:$page_current-3;
                if($page_current ==1)
                {  
                     $products = getLimit_category_Price_Desc('product',$category_id,0,$product_page ,$conn=connectdb());
                }
                else
                {   
                    $product_start=($page_current-1)*$product_page;
                    $products = getLimit_category_Price_Desc('product',$category_id,$product_start,$product_page,$conn=connectdb());
                }
            
            }
            else
               {
                $category_id = 0;
                $sort =$_GET['sort'];
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

                if(mysqli_num_rows(getAll_Price_Desc('product',$conn=connectdb()))%$product_page!=0)
                    $pages = floor(mysqli_num_rows( getAll_Price_Desc('product',$conn=connectdb()))/$product_page)+1;
                else $pages = mysqli_num_rows( getAll_Price_Desc('product', $conn=connectdb()))/$product_page;
                $page_right = (($page_current+3)>$pages)?$pages:$page_current+3;
                $page_left = ($page_current<4)?1:$page_current-3;

                if($page_current ==1)
                {
                    $products =  getLimit_Price_Desc('product',0,$product_page ,$conn=connectdb());
                }
                else
                {   
                    $product_start=($page_current-1)*$product_page;
                    $products =  getLimit_Price_Desc('product',$product_start,$product_page,$conn=connectdb());
                }
            
            }
            return array($page_left,$page_right,$page_current,$products,$pages,$category_id,$sort); 
            break;
        
            case 3:
                if(isset ($_GET['category']) && $_GET['category']!=0)
                {   $category_id=$_GET['category'];
                    $sort =$_GET['sort'];
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
            
                    if(mysqli_num_rows(getAll_Price_ASC_to_category('product',$category_id,$conn=connectdb()))%$product_page!=0)
                        $pages = floor(mysqli_num_rows(getAll_Price_ASC_to_category('product',$category_id,$conn=connectdb()))/$product_page)+1;
                    else $pages = mysqli_num_rows(getAll_Price_ASC_to_category('product',$category_id,$conn=connectdb()))/$product_page;
                    $page_right = (($page_current+3)>$pages)?$pages:$page_current+3;
                    $page_left = ($page_current<4)?1:$page_current-3;
                    if($page_current ==1)
                    {  
                         $products = getLimit_category_Price_ASC('product',$category_id,0,$product_page ,$conn=connectdb());
                    }
                    else
                    {   
                        $product_start=($page_current-1)*$product_page;
                        $products = getLimit_category_Price_ASC('product',$category_id,$product_start,$product_page,$conn=connectdb());
                    }
                
                }
                else
                {   
                    $category_id=0;
                    $sort =$_GET['sort'];
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
    
                    if(mysqli_num_rows(getAll_Price_ASC('product',$conn=connectdb()))%$product_page!=0)
                        $pages = floor(mysqli_num_rows( getAll_Price_ASC('product',$conn=connectdb()))/$product_page)+1;
                    else $pages = mysqli_num_rows( getAll_Price_ASC('product', $conn=connectdb()))/$product_page;
                    $page_right = (($page_current+3)>$pages)?$pages:$page_current+3;
                    $page_left = ($page_current<4)?1:$page_current-3;
    
                    if($page_current ==1)
                    {
                        $products =  getLimit_Price_ASC('product',0,$product_page ,$conn=connectdb());
                    }
                    else
                    {   
                        $product_start=($page_current-1)*$product_page;
                        $products =  getLimit_Price_ASC('product',$product_start,$product_page,$conn=connectdb());
                    }
                
                }
                return array($page_left,$page_right,$page_current,$products,$pages,$category_id,$sort); 
                break;
    

   }
    
}
function paging_search($product_page,$search)

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

    if(mysqli_num_rows(getALL_Search('product',$search,$conn=connectdb()))%$product_page!=0)
        $pages = floor(mysqli_num_rows( getALL_Search('product',$search,$conn=connectdb()))/$product_page)+1;
    else $pages = mysqli_num_rows( getALL_Search('product',$search,$conn=connectdb()))/$product_page;
    $page_right = (($page_current+3)>$pages)?$pages:$page_current+3;
    $page_left = ($page_current<4)?1:$page_current-3;

    if($page_current ==1)
    {
        $products = getLimit_Search('product',$search,0,$product_page ,$conn=connectdb());
    }
    else
    {   
        $product_start=($page_current-1)*$product_page;
        $products = getLimit_Search('product',$search,$product_start,$product_page,$conn=connectdb());
    }
    return array($page_left,$page_right,$page_current,$products,$pages); 
}
function page_bar_search($page_current,$page_left,$page_right,$pages,$search){

        if($page_current!=1 )
        {
            echo' <a href="index.php?act=search&search='.$search.'&page=1" class="btn btn-outline-secondary"><<</a> ';
            if($page_current-3>1)
            echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
        }
        
        for($i=$page_left ;$i<=$page_right;$i++ )
        {   if ($page_current==$i)
            echo' <a href="index.php?act=search&search='.$search.'&page='.$i.'" class="active btn btn-outline-secondary">'.$i.'</a>';
            else
            echo' <a href="index.php?act=search&search='.$search.'&page='.$i.'" class="btn btn-outline-secondary">'.$i.'</a>';
        }
        if($page_current<$pages)
        {
        if($page_current+3<$pages)
        echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
        echo'<a href="index.php?act=search&search='.$search.'&page='.$pages.'" class="btn btn-outline-secondary">>></a> ';
        }
    
    
}   

function page_bar_category($page_current,$page_left,$page_right,$pages,$category_id){

    if($category_id!=0)
    {
        if($page_current!=1)
        {
            echo' <a href="index.php?act=product&category='.$category_id.'&page=1" class="btn btn-outline-secondary"><<</a> ';
            if($page_current-3>1)
            echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
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
}          

function page_bar_category_sort($page_current,$page_left,$page_right,$pages,$category_id,$sort){

    if($category_id!=0)
    {
        if($page_current!=1)
        {
            echo' <a href="index.php?act=product&category='.$category_id.'&sort='.$sort.'&page=1" class="btn btn-outline-secondary"><<</a> ';
            if($page_current-3>1)
            echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
        }
        
        for($i=$page_left ;$i<=$page_right;$i++ )
        {   if ($page_current==$i)
            echo' <a href="index.php?act=product&category='.$category_id.'&sort='.$sort.'&page='.$i.'" class="active btn btn-outline-secondary">'.$i.'</a>';
            else
            echo' <a href="index.php?act=product&category='.$category_id.'&sort='.$sort.'&page='.$i.'" class="btn btn-outline-secondary">'.$i.'</a>';
        }
        if($page_current<$pages)
        {
        if($page_current+3<$pages)
        echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
        echo'<a href="index.php?act=product&category='.$category_id.'&sort='.$sort.'&page='.$pages.'" class="btn btn-outline-secondary">>></a> ';
        }
    }
    else
    {
        if($page_current!=1)
    {
        echo' <a href="index.php?act=product&category='.$category_id.'&sort='.$sort.'&page=1" class="btn btn-outline-secondary"><<</a> ';
        if($page_current-3>1)
        echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
    }
    
    for($i=$page_left ;$i<=$page_right;$i++ )
    {   if ($page_current==$i)
        echo' <a href="index.php?act=product&category='.$category_id.'&sort='.$sort.'&page='.$i.'" class="active btn btn-outline-secondary">'.$i.'</a>';
        else
        echo' <a href="index.php?act=product&category='.$category_id.'&sort='.$sort.'&page='.$i.'" class="btn btn-outline-secondary">'.$i.'</a>';
    }
    if($page_current<$pages)
    {
    if($page_current+3<$pages)
    echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
    echo'<a href="index.php?act=product&category='.$category_id.'&sort='.$sort.'&page='.$pages.'" class="btn btn-outline-secondary">>></a> ';
    }
    }
}          
?>