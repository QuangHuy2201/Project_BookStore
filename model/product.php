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

function  getByName($table,$product_name,$conn){ 

  
    $sql = "SELECT   * FROM $table Where product_name='$product_name'";
    
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
                if($product['category_id']==1)
                $link_img="./static/images/sach-truyen-kiem-hiep/";
                else if($product['category_id']==2)
                $link_img="./static/images/sach-van-hoc/";
                else $link_img="./static/images/truyen-tranh-comic/";
            echo '<div class="col-3">
                    <div class="product-item p10 mb15">
                        <div class="product-img text-center">
                            <img src="'.$link_img.''.$product['image'].'" title="'.$product['product_name'].'" alt="'.$product['product_name'].'">
                        </div>
                        <a class="product-title text-reset text-decoration-none fs13 mt10" name="detail" href="index.php?act=detail&name='.$product['product_name'].'" >'.$product['product_name'].'</a>
                        <div>
                            <div class="d-flex align-items-center">
                                <p class="fs10 text-decoration-line-through me-2">'.$price_old.'</>
                                <p class="product-price me-2 text-danger txt-medium">'.$price.'</p>
                                <p class="discount_percent badge rounded-pill text-bg-danger">'.$discount_percent.'%</p>
                            </div>

                            <form action="?act=cart" method="POST">
                                <input type="hidden" name="product_name" value="'.$product['product_name'].'" >
                                <input type="hidden" name="image" value="'.$product['image'].'" >
                                <input type="hidden" name="price" value="'.$product['price'].'" >
                                <input type="hidden" name="quantity" value="1" >
                                <input type="hidden" name="category_id" value="'.$product['category_id'].'" >
                                <button type="submit" class="buy-btn btn btn-danger mb-2 w-100 fs14" name="buy_now">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    Mua Ngay
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
              ';
            }
}

?>