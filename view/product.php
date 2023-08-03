<?php
include "../model/product.php";
$header='product';
include "header.php";

$product_page =12;


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

$pages = (mysqli_num_rows( getAll('product'))/$product_page!=0)?floor(mysqli_num_rows( getAll('product'))/$product_page)+1:mysqli_num_rows( getAll('product'))/$product_page;

if($page_current ==1)
{
    $products = getLimit('product',1,$product_page );
}
else
{   
    $product_start=($page_current-1)*$product_page;
    
    $products = getLimit('product',$product_start,$product_page);
}

$page_right = (($page_current+3)>$pages)?$pages:$page_current+3;
$page_left = ($page_current<4)?1:$page_current-3;
?>
<div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3 class="category-title">
                    TẤT CẢ SẢN PHẨM
                </h3>
            </div>
        </div>
        
        <div class="row product-lists">

        <?php 
            foreach ($products as $product)  
            {
                $price =number_format($product['price'])."đ";
                if($product['category_id']==1)
                $link_img="../static/images/sach-truyen-kiem-hiep/";
                else if($product['category_id']==2)
                $link_img="../static/images/sach-van-hoc/";
                else $link_img="../static/images/truyen-tranh-comic/";
            echo '<div class="col-3">
            <div class="product-item">
                <div class="product-img">
                    <img src="'.$link_img.''.$product['image'].'" alt="'.$product['product_name'].'">
                </div>
                <h5 class="product-title">'.$product['product_name'].'</h5>
                <div class="flex">
                <p class="product-price "style="margin-right:40px;">'.$price.'</p>
                <form action="cart.php" method="POST">
                <button type="submit" class="btn btn-danger " name="buy_now" >Mua Ngay</button>
                <input type="hidden" name="product_name" value="'.$product['product_name'].'" >
                <input type="hidden" name="price" value="'.$product['price'].'" >
                <input type="hidden" name="quantity" value="1" >
                </form>
                </div>
            </div>
        </div>  ';
            }
            
                    ?>
            

            
            
        </div>
        <div class="btn-group" role="group" aria-label="First group">

      
            <?php
            if($page_current!=1)
            {
                

                echo' <a href="?page=1" class="btn btn-outline-secondary"><<</a> ';
                if($page_current-3>1)
                echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
            }
          
            for($i=$page_left ;$i<=$page_right;$i++ )
            {   if ($page_current==$i)
                echo' <a href="?page='.$i.'" class="active btn btn-outline-secondary">'.$i.'</a>';
                else
                echo' <a href="?page='.$i.'" class="btn btn-outline-secondary">'.$i.'</a>';
            }
            if($page_current<$pages)
           {
           
            if($page_current+3<$pages)
            echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
            echo'<a href="?page='.$pages.'" class="btn btn-outline-secondary">>></a> ';
           }
            
            ?>
  
  
        
  </div>