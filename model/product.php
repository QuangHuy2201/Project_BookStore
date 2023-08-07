<?php 
 
function  getAll($table,$conn)
{ 

    $sql = "SELECT  * FROM $table ";

    return $query_run = mysqli_query($conn,$sql);
}
function  getLimit($table,$start,$end,$conn){ 

   
    $sql = "SELECT   * FROM $table limit $start,$end ";
    
    return $query_run = mysqli_query($conn,$sql);
    }

function  getAll_Price_Desc($table,$conn){ 

   
    $sql = "SELECT   * FROM $table ORDER BY price DESC ";
    
    return $query_run = mysqli_query($conn,$sql);
}

function  getAll_Price_ASC($table,$conn){ 

    
    $sql = "SELECT   * FROM $table ORDER BY price ASC ";
    
    return $query_run = mysqli_query($conn,$sql);
}


function  getByID($table,$id,$conn){ 

  
    $sql = "SELECT   * FROM $table Where product_id='$id'";
    
    return $query_run = mysqli_query($conn,$sql);
}


function  getByCategoryID($table,$category_id,$conn){ 


    $sql = "SELECT   * FROM $table Where category_id='$category_id'";
    
    return $query_run = mysqli_query($conn,$sql);
}
function  getByCategoryID_Limit($table,$category_id,$conn){ 

  
    $sql = "SELECT  * FROM $table Where category_id='$category_id' Limit 3 ";
    
    return $query_run = mysqli_query($conn,$sql);
}

function show_to_products($products) {
    foreach ($products as $product)  
            {
                $price =number_format($product['price'])."đ";
                $price_old =number_format($product['price_old'])."đ";
                $discount_percent = 100 - (round($product['price'] / $product['price_old'], 2) * 100);
                echo $discount_percent;
                if($product['category_id']==1)
                $link_img="../static/images/sach-truyen-kiem-hiep/";
                else if($product['category_id']==2)
                $link_img="../static/images/sach-van-hoc/";
                else $link_img="../static/images/truyen-tranh-comic/";
            echo '<div class="col-3">
            <div class="product-item">
                <div class="product-img">
                    <img src="'.$link_img.''.$product['image'].'" title="'.$product['product_name'].'" alt="'.$product['product_name'].'">
                </div>
                <h5 class="product-title" title="'.$product['product_name'].'">'.$product['product_name'].'</h5>
                <div class="flex">
                <p class="product-price "style="margin-right:10px;">'.$price.'</p>

                <form action="?act=cart" method="POST">
                <input type="hidden" name="product_name" value="'.$product['product_name'].'" >
                <input type="hidden" name="image" value="'.$product['image'].'" >
                <input type="hidden" name="price" value="'.$product['price'].'" >
                <p type="button" class="btn btn-danger">'.$discount_percent.'%</p>
                <input type="hidden" name="quantity" value="1" >
                <input type="hidden" name="category_id" value="'.$product['category_id'].'" >
                <button type="submit" class="btn btn-danger " name="buy_now" >Mua Ngay</button>

                </form>
                
                </div>
                </div>
                </div>
              ';
            }
}

?>