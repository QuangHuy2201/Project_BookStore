<?php 

include "./model/cart.php";
include "./model/connectDB.php";
include "./model/product.php";
include "./model/page.php";
include "./model/user.php";
include "./model/passwordBcrypt.php";
$product_page =12;


//Header
$header ='';

include_once "./view/header.php";

if(isset($_GET['act']))
    {   
        switch($_GET['act'])
        {   
            case 'home':
                $products_1=getByCategoryID_Limit('product',1,$conn=connectdb());
                $products_2=getByCategoryID_Limit('product',2,$conn=connectdb());
                $products_3=getByCategoryID_Limit('product',3,$conn=connectdb());
                include "./view/home.php";
                break;
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
               //Update cart 
                if(isset($_GET['add']))
                {
                    $index =$_GET['add'];
                    $_SESSION['cart'][$index]['quantity']++;
                    header('Location: index.php?act=cart');
                }
                if(isset($_GET['sub']))
                {
                    $index =$_GET['sub'];
                    if($_SESSION['cart'][$index]['quantity']-1==0)
                    array_splice($_SESSION['cart'],$index,1);
                    else $_SESSION['cart'][$index]['quantity']--;
                    header('Location: index.php?act=cart');
                }

                include "./view/cart.php";
                break;
            case 'login':
               
                if(isset($_POST['btn-login']))
                {
                    login();
                    check_info();
                }
                include "./view/login.php";
                break;
            case 'logout':
                unset($_SESSION['auth_user']);
                header('Location: index.php?act=login');
                break;
            case 'register':
                
                if(isset($_POST['btn-register']))
                {
                    register();
                    
                }
                
                include "./view/register.php";
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