<?php 
include "./model/cart.php";
include "./model/connectDB.php";
include "./model/product.php";
include "./model/page.php";
include "./model/user.php";
include "./model/passwordBcrypt.php";



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
                if(!isset($_GET['sort']))
                {
                    $page_bar_opt ='1';
                list($page_left,$page_right,$page_current,$products,$pages,$category_id)= paging_to_category(12);

                }
                else
                {    $page_bar_opt ='2';
                    list($page_left,$page_right,$page_current,$products,$pages,$category_id,$sort)= paging_to_category_sort(12);
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
                header('Location: index.php?act=home');
                break;
            case 'register':
                
                if(isset($_POST['btn-register']))
                {
                    register();
                    
                }
                
                include "./view/register.php";
                break;

            case'detail':
                if(isset($_GET['name'])) {
                    $product_name = $_GET['name'];
                    $product = getByName('product', $product_name, connectdb());
                    foreach ($product as $product) {
                        $price = number_format($product['price'])."đ";
                        $price_old = number_format($product['price_old'])."đ";
                        $discount = number_format($product['price_old'] - $product['price'])."đ";
                        $discount_percent = 100 - (round($product['price'] / $product['price_old'], 2) * 100);
                        $view = $product['view'] + 1;
                        $product_id = $product['product_id'];
                        addView('product', $view, $product_id, connectdb());
                        if($product['category_id'] == 1) {
                            $link_img = "./static/images/sach-truyen-kiem-hiep/";
                            $category = "Truyện kiếm hiệp";
                        }
                        else if($product['category_id']==2) {
                            $link_img = "./static/images/sach-van-hoc/";
                            $category = "Sách văn học";
                        }
                        else  {
                            $link_img = "./static/images/truyen-tranh-comic/";
                            $category = "Truyện tranh manga-comic";
                        }
                    }
                }
                include "./view/product_detail.php";
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