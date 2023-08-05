<?php
function add_cart()
{   
   
   $product_name=$_POST['product_name'];
   $price=$_POST['price'];
   $quantity=1;
   $image=$_POST['image'];
   $category_id=$_POST['category_id'];
   
    
    //Check product in cart 
    //flag
    $fl=0;
    for($i=0;$i<sizeof($_SESSION['cart']);$i++ )
    {
        if($_SESSION['cart'][$i]['product_name']==$product_name)
        {   
            $fl=1;
            $_SESSION['cart'][$i]['quantity']+= $quantity;
            break;
        }
    }

    if($fl==0)
    {
        //Add to cart
        $product_cart =[
         'product_name' =>   $product_name,
          'price' => $price,
         'quantity' =>  $quantity,
         'image' =>   $image,
          'category_id' => $category_id];
        $_SESSION['cart'][]=$product_cart;
        

    }
header('Location: ../view/cart.php');
}
    
function show_to_cart()

{  
    $total=0;
    if( !empty($_SESSION['cart']) )
    {   
        for($i=0;$i<sizeof($_SESSION['cart']);$i++ ){
            $sum=$_SESSION['cart'][$i]['price']*$_SESSION['cart'][$i]['quantity'];
            echo ' <div class="row text-center bg-white mlr0 pt10 pb10 mb5 b-radius w-100">
            <div class="col-1">'.($i+1).'</div>
            <div class="col-3 text-start">'.$_SESSION['cart'][$i]['product_name'].'</div>
            <div class="col-2">'.number_format($_SESSION['cart'][$i]['price']).'đ</div>
            <div class="col-1">'.$_SESSION['cart'][$i]['quantity'].'</div>
            <div class="col-2">'.number_format($sum).'</div>
            <div class="col-1">
            <form method="GET">
                <button type="submit" name="delete" value="'.$i.'">Xoá</button>
            </form>
            </div>
            </div>';
            $total+=$sum;
            }
    }
    else echo"<p>Chưa có sản phẩm trong giỏ hàng của bạn.</p>";
    return $total;
    
    //Delete
    if(isset($_GET['delete_all'])) unset($_SESSION['cart']);

    if(isset($_GET['delete']))
    {
        array_splice($_SESSION['cart'],$_GET['delete'],1);

    }
}
?>