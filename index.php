<?php 

include "./model/cart.php";
include "./model/connectDB.php";
include "./model/product.php";
include "./model/page.php";
$product_page =12;


//Header
$header ='';
include_once "./view/header.php";

if(isset($_GET['act']))
    {   
        switch($_GET['act'])
        {
            case'product':
                $header ='product';
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

                if(mysqli_num_rows(getAll('product',$conn=connectdb()))/$product_page!=0)
                    $pages = floor(mysqli_num_rows( getAll('product',$conn=connectdb()))/$product_page)+1;
                else $pages = mysqli_num_rows( getAll('product', $conn=connectdb()))/$product_page;
                $page_right = (($page_current+3)>$pages)?$pages:$page_current+3;
                $page_left = ($page_current<4)?1:$page_current-3;

                if($page_current ==1)
                {
                    $products = getLimit('product',1,$product_page ,$conn=connectdb());
                }
                else
                {   
                    $product_start=($page_current-1)*$product_page;
                    $products = getLimit('product',$product_start,$product_page,$conn=connectdb());
                }
               

                include "./view/product.php";
                break;

            case'cart':
                session_start();

                if(!isset($_SESSION['cart']))$_SESSION['cart']=[];
                if(isset($_POST['buy_now']))
                {   
                    add_cart();
                }
                //Delete item in cart
                if(isset($_GET['delete']))
                {   
                    array_splice($_SESSION['cart'],$_GET['delete'],1);
                    
                header('Location: index.php?act=cart');
                }
                 //Delete all items in cart
                if(isset($_GET['delete_all']))
                {
                    unset($_SESSION['cart']); 
                    header('Location: index.php?act=cart');
                }
                include "./view/cart.php";
                break;
           

        }
    }
else {
    // Get products home page
    $products_1=getByCategoryID_Limit('product',1,$conn=connectdb());
    $products_2=getByCategoryID_Limit('product',2,$conn=connectdb());
    $products_3=getByCategoryID_Limit('product',3,$conn=connectdb());
    include "./view/home.php";
   
}
//Footer
include_once "./view/footer.php";
?>