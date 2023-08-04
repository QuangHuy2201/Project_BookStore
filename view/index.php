<?php 
include "../model/product.php";
$products_1=getByCategoryID_Limit('product',1);
$products_2=getByCategoryID_Limit('product',2);
$products_3=getByCategoryID_Limit('product',3);
$header='home';
include "header.php";
?>

    <div class="container mt-5">

        <div class="row">
            <div class="col">
                <h3 class="category-title">
                    Truyện kiếm hiệp
                </h3>
            </div>
        </div>
        
        <div class="row product-lists">
            <?php 
            foreach ($products_1 as $product)  
            {
                $price =number_format($product['price'])."đ";
            echo '<div class="col-4">
            <div class="product-item">
                <div class="product-img">
                    <img src="../static/images/sach-truyen-kiem-hiep/'.$product['image'].'" alt="'.$product['product_name'].'">
                </div>
                <h5 class="product-title">'.$product['product_name'].'</h5>
                <p class="product-price">'.$price.'</p>
            </div>
        </div>  ';
                    }
            
                    ?>
            
        </div>

        </div>
        </div>           

        <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="category-title">
                    Sách văn học
                </h3>
            </div>
        </div>
        
        <div class="row product-lists">
            <?php 
            foreach ($products_2 as $product)  
            {
                $price =number_format($product['price'])."đ";
            echo '<div class="col-4">
            <div class="product-item">
                <div class="product-img">
                    <img src="../static/images/sach-van-hoc/'.$product['image'].'" alt="'.$product['product_name'].'">
                </div>
                <h5 class="product-title">'.$product['product_name'].'</h4>
                <p class="product-price">'.$price.'</p>
            </div>
        </div>  ';
                    }
            
                    ?>
            
        </div>

        </div>
        </div>
        
        <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="category-title">
                Truyện tranh - Comic
                </h3>
            </div>
        </div>
        
        <div class="row product-lists">
            <?php 
            foreach ($products_3 as $product)  
            {
                $price =number_format($product['price'])."đ";
            echo '<div class="col-4">
            <div class="product-item">
                <div class="product-img">
                    <img src="../static/images/truyen-tranh-comic/'.$product['image'].'" alt="'.$product['product_name'].'">
                </div>
                <h5 class="product-title">'.$product['product_name'].'</h4>
                <p class="product-price">'.$price.'</p>
            </div>
        </div>  ';
                    }
            
                    ?>
            
        </div>

        </div>
        </div>


   
</body>
</html>
<?php
include "footer.php";
?>