<?php
function add_cart()
{   
   
   $product_name=$_POST['product_name'];
   $price=$_POST['price'];
   $quantity=$_POST['quantity'];;
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
header('Location: index.php?act=cart');
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
            <div class="col-4 text-start">'.$_SESSION['cart'][$i]['product_name'].'</div>
            <div class="col-2">'.number_format($_SESSION['cart'][$i]['price']).'đ</div>
            
            <div class="col-2">
                <button type="button" class="b-radius text-center" onclick="this.parentNode.getElementsByClassName("count_quantity").stepDown();">
                    -
                </button>
                <input disabled class="count_quantity" type="number" name="quantity" min="1" max="100" value="'.$_SESSION['cart'][$i]['quantity'].'">
                <button type="button" class="b-radius text-center" onclick="this.parentNode.getElementsByClassName("count_quantity").stepUp();">
                    +
                </button>
            </div>
            <div class="col-2">'.number_format($sum).'</div>
            <div class="col-1">
            <form  method="GET">
                <a type="submit" name="delete"class=" btn btn-outline-danger " href="index.php?act=cart&delete='.$i.'">Xóa</a>
            </form>
            </div>
            </div>';
            $total+=$sum;
            }
    }
    else echo"<p>Chưa có sản phẩm trong giỏ hàng của bạn.</p>";
    return $total;
    
  

}
function delete_cart()
{

 //Delete
 if(isset($_GET['delete_all']))
 {
    unset($_SESSION['cart']); 
    //header('Location: index.php?act=cart');
 }
 

 if(isset($_GET['delete']))
 {   
     
    array_splice($_SESSION['cart'],$_GET['delete'],1);
     
   // header('Location: index.php?act=cart');
 }

}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $('.btn-minus').on('click', function (e) {
        var input = $(e.target).closest('.form-type-number').find('input');
        input[0]['stepDown']();
    });
    $('.btn-plus').on('click', function (e) {
        var input = $(e.target).closest('.form-type-number').find('input');
        input[0]['stepUp']();
    });
</script>