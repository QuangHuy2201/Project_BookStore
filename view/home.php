<?php if($_GET['act']='') echo'ab';?>
<div class="container mt-5">

    <div class="row product-lists">
        <?php 
        foreach ($products_1 as $product)  
        {
            $price =number_format($product['price'])."đ";
        echo '<div class="col-4">
        <div class="product-item">
            <div class="product-img">
                <img src="./static/images/sach-truyen-kiem-hiep/'.$product['image'].'" alt="'.$product['product_name'].'">
            </div>
            <h5 class="product-title">'.$product['product_name'].'</h5>
            <p class="product-price">'.$price.'</p>
            </div>
        </div>  ';
                }
        
        ?>
        
    </div>
</div>           

<div class="container">

    <div class="row product-lists">
        <?php 
        foreach ($products_2 as $product)  
        {
            $price =number_format($product['price'])."đ";
        echo '<div class="col-4">
                <div class="product-item">
                    <div class="product-img">
                        <img src="./static/images/sach-van-hoc/'.$product['image'].'" alt="'.$product['product_name'].'">
                    </div>
                    <h5 class="product-title">'.$product['product_name'].'</h4>
                    <p class="product-price">'.$price.'</p>
                </div>
            </div>  ';
                }
        ?>
        
    </div>
</div>

<div class="container">

    <div class="row product-lists">
        <?php 
        foreach ($products_3 as $product)  
        {
            $price =number_format($product['price'])."đ";
        echo '<div class="col-4">
                <div class="product-item">
                    <div class="product-img">
                        <img src="./static/images/truyen-tranh-comic/'.$product['image'].'" alt="'.$product['product_name'].'">
                    </div>
                    <h5 class="product-title">'.$product['product_name'].'</h4>
                    <p class="product-price">'.$price.'</p>
                </div>
            </div>  ';
        }
        ?>
        
    </div>
</div>



</body>
</html>