
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
                <p class="product-price "style="margin-right:10px;">'.$price.'</p>

                <form action="?act=cart" method="POST">
                <input type="hidden" name="product_name" value="'.$product['product_name'].'" >
                <input type="hidden" name="image" value="'.$product['image'].'" >
                <input type="hidden" name="price" value="'.$product['price'].'" >
                <input type="hidden" name="quantity" value="1" >
                <input type="hidden" name="category_id" value="'.$product['category_id'].'" >
                <button type="submit" class="btn btn-danger " name="buy_now" >Mua Ngay</button>
                </form>
                
                </div>
                </div>
                </div>
              ';
            }
          
            
        ?>
            

            
            
        </div>
        <div class="btn-group" role="group" aria-label="First group">
            
        <?php paging($page_current,$page_left,$page_right,$pages); ?>    
        </div>