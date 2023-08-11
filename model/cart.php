<?php
function add_cart()
{

    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];;
    $image = $_POST['image'];
    $category_id = $_POST['category_id'];
    //Check product in cart 
    //flag
    $fl = 0;
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i]['product_name'] == $product_name) {
            $fl = 1;
            $_SESSION['cart'][$i]['quantity'] += $quantity;
            break;
        }
    }

    if ($fl == 0) {
        //Add to cart
        $product_cart = [
            'product_name' =>   $product_name,
            'price' => $price,
            'quantity' =>  $quantity,
            'image' =>   $image,
            'category_id' => $category_id
        ];
        $_SESSION['cart'][] = $product_cart;
    }
    header('Location: index.php?act=cart');
}

function show_to_cart()

{
    $total = 0;
    if (!empty($_SESSION['cart'])) {

        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            $link_img = '';
            if ($_SESSION['cart'][$i]['category_id'] == '1') {
                $link_img = './static/images/sach-truyen-kiem-hiep/' . $_SESSION['cart'][$i]['image'];
            } else if ($_SESSION['cart'][$i]['category_id'] == '2') {
                $link_img = './static/images/sach-van-hoc/' . $_SESSION['cart'][$i]['image'];
            } else $link_img = './static/images/truyen-tranh-comic/' . $_SESSION['cart'][$i]['image'];



            $sum = $_SESSION['cart'][$i]['price'] * $_SESSION['cart'][$i]['quantity'];
            echo ' <div class="row text-center bg-white mlr0 pt10 pb10 mb5 b-radius w-100">
            <div class="col-1 my-auto">' . ($i + 1) . '</div>
            <div class="col-4 my-auto text-start d-flex">
                <a href="index.php?act=detail&name='.$_SESSION['cart'][$i]['product_name'].'">
                <img src="' . $link_img . '" class="mx-2" width=50 atr="'.$_SESSION['cart'][$i]['product_name'].'"></img>
                </a>
                <a href="index.php?act=detail&name='.$_SESSION['cart'][$i]['product_name'].'" class="text-decoration-none  text-reset">
                <p>' . $_SESSION['cart'][$i]['product_name'] . '</p>
                </a>
            </div>
            <div class="col-2 my-auto">'.number_format($_SESSION['cart'][$i]['price']).'đ</div>
            
            <div class="col-2 my-auto">
            <form method="GET">
                <a class="btn quantity-arrow-minus" type="submit"  name="sub" href="index.php?act=cart&sub='.$i.'"> - </a>
                <input disabled class="quantity-num" type="number" value="'.$_SESSION['cart'][$i]['quantity'].'"></input>
                <a class="btn quantity-arrow-plus" name="add" type="submit" href="index.php?act=cart&add='.$i.'"> + </a>
            </form>
            </div>
            <div class="col-2 my-auto">'.number_format($sum).'đ</div>
            <div class="col-1 my-auto">
            <form  method="GET">
                <a type="submit" name="delete"class="btn btn-outline-danger fs14" href="index.php?act=cart&delete=' . $i . '">Xóa</a>
            </form>
            </div>
            </div>';
            $total += $sum;
        }
    } else echo "<p>Chưa có sản phẩm trong giỏ hàng của bạn.</p>";
   
    return $total;

}

  
    

