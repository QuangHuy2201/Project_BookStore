<?php
include "../model/product.php";
$header = 'product';
include "header.php";
session_start();


if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (isset($_POST['buy_now'])) {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = 1;


    //Check product in cart 
    //flag
    $fl = 0;
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][0] == $product_name) {
            $fl = 1;
            $_SESSION['cart'][$i][2] += $quantity;
            break;
        }
    }

    if ($fl == 0) {
        //Add to cart
        $product_cart = [$product_name, $price, $quantity];
        $_SESSION['cart'][] = $product_cart;
    }
}
function show_to_cart()

{
    $total = 0;
    if (!empty($_SESSION['cart'])) {
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            $sum = $_SESSION['cart'][$i][1] * $_SESSION['cart'][$i][2];
            echo ' <div class="row text-center bg-white mlr0 pt10 pb10 mb5 b-radius w-100 d-flex align-items-center">
            <div class="col-1">' . ($i + 1) . '</div>
            <div class="col-4 text-start">' . $_SESSION['cart'][$i][0] . '</div>
            <div class="col-2">' . number_format($_SESSION['cart'][$i][1]) . 'đ</div>
            <div class="col-2">' . $_SESSION['cart'][$i][2] . '</div>
            <div class="col-2">' . number_format($sum) . '</div>
            <div class="col-1">
            <form method="GET">
                <button type="submit" name="delete" value="' . $i . '">Xoá</button>
            </form>
            </div>
            </div>';
            $total += $sum;
        }
    } else echo "<p>Chưa có sản phẩm trong giỏ hàng của bạn.</p>";
    return $total;
}

if (isset($_GET['delete_all'])) unset($_SESSION['cart']);

if (isset($_GET['delete'])) {
    array_splice($_SESSION['cart'], $_GET['delete'], 1);
}

?>

<!-- Cart items details -->
<div class="cart-wrapper bg-gray pb140">
    <div class="container">
        <div class="row pt60">
            <div class="col-8">
                <h2 class="cart-title mt20">Giỏ hàng</h2>
                <div class="row txt-bold text-center bg-white mlr0 pt10 pb10 b-radius w-100 mb20">
                    <div class="col-1">STT</div>
                    <div class="col-4">Tên Sản Phẩm</div>
                    <div class="col-2">Đơn giá</div>
                    <div class="col-2">Số lượng</div>
                    <div class="col-2">Thành tiền</div>
                    <div class="col-1">Xoá</div>
                </div>


                <?php
                $total = show_to_cart();
                ?>
                <div class="row text-center bg-white mlr0 pt10 pb10 mb5 b-radius w-100 d-flex align-items-center">
                    <div class="col-1">1</div>
                    <div class="col-4">Truyện kiếm hiệp</div>
                    <div class="col-2">630,000</div>
                    <div class="col-2">
                        <button type="button" class="b-radius text-center" onclick="this.parentNode.querySelector('[type=number]').stepDown();">
                            -
                        </button>
                        <input type="number" name="number" min="1" max="100" value="1">
                        <button type="button" class="b-radius text-center" onclick="this.parentNode.querySelector('[type=number]').stepUp();">
                            +
                        </button>
                    </div>
                    <div class="col-2">630,000</div>
                    <div class="col-1">
                        <form method="GET">
                            <button type="submit" name="delete" value="'.$i.'" class="del_item b-radius">Xoá</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="row">
                    <div class="col">
                        <h2 class="mt20">Thông tin thanh toán</h2>
                        <div class="bg-white b-radius p30">
                            <div class="price d-flex justify-content-between mb10">
                                <div class="price_heading">Tạm tính</div>
                                <div class="price-value"><?php echo number_format($total); ?>đ</div>
                            </div>
                            <div class="discount d-flex justify-content-between mb10">
                                <div class="discount-heading">Giảm giá</div>
                                <div class="discount-value">0đ</div>
                            </div>
                            <div class="ship-fee d-flex justify-content-between mb10">
                                <div class="ship-fee-heading">Phí giao hàng</div>
                                <div class="ship-fee-value">0đ</div>
                            </div>
                            <div class="total d-flex justify-content-between mt20 txt-semiBold fs20">
                                <div class="total-heading">Tổng thanh toán</div>
                                <div class="total-value"><?php echo number_format($total); ?>đ</div>
                            </div>
                            <form method="GET" class="row d-flex justify-content-between mt10">
                                <button type="submit" name="delete_all" class="col-4 mt10 b-radius">Xoá tất cả</button>
                                <a href="#" class="col-7 order b-radius mt10">Đặt hàng</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $('.btn-minus').on('click', function(e) {
        var input = $(e.target).closest('.form-type-number').find('input');
        input[0]['stepDown']();
    });
    $('.btn-plus').on('click', function(e) {
        var input = $(e.target).closest('.form-type-number').find('input');
        input[0]['stepUp']();
    });
</script>
</body>

</html>