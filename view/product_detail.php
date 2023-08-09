<?php
    // echo $product_name;
    foreach ($product as $product) {
        $price = number_format($product['price'])."đ";
        $price_old = number_format($product['price_old'])."đ";
        $discount = number_format($product['price_old'] - $product['price'])."đ";
        $discount_percent = 100 - (round($product['price'] / $product['price_old'], 2) * 100);
        if($product['category_id'] == 1) {
            $link_img = "./static/images/sach-truyen-kiem-hiep/";
            $category = "Sách truyện kiếm hiệp";
        }
        else if($product['category_id']==2) {
            $link_img = "./static/images/sach-van-hoc/";
            $category = "Sách Sách văn học";
        }
        else {
            $link_img = "./static/images/truyen-tranh-comic/";
        }
    }
?>

<div class="container">
    <!-- breadcrumb -->
    <div class="row bg-white p10 bd1 mt20 mb20 fs14">   
        <nav aria-label="breadcrumb" class="d-flex align-items-center">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-reset text-decoration-none" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-reset text-decoration-none" href="#">Sách</a></li>
                <?php 
                    echo '<li class="breadcrumb-item" aria-current="page"><a class="text-reset text-decoration-none" href="#">'.$category.'</a></li>';
                    echo '<li class="breadcrumb-item" aria-current="page">'.$product['product_name'].'</li>';
                ?>
                
            </ol>
        </nav>
    </div>
    <!-- content -->
    <div class="row">

        <!-- img -->
        <div class="col-3 detail_img bg-white pt30 plr50 pb30">
            <?php echo '<img src="' .$link_img.$product['image'].'" width="100%" alt="truyen">';?>
        </div>

        <!-- product detail -->
        <div class="col-6">
            <div class="detail-content bg-white p15">
                <?php
                    echo '
                        <h3 class="fs18 txt-semiBold">'.$product['product_name'].'</h3>
                        <p class="fs14">Danh mục
                            <a href="#">'.$category.'</a>
                        </p>
                        <p class="fs14">
                            Chưa có đánh giá | 52 đã bán
                        </p>
                        <div class="fs14">'.$product['description'].'</div>
                        <p class="fs13 text-decoration-line-through d-inline">'.$price_old.'</p>
                        <p class="d-inline text-danger fs20 txt-semiBold">'.$price.'</p>
                        <p class="fs14">
                            Tiết kiệm:
                            <span class="txt-semiBold">'.$discount.' ('.$discount_percent.'%)</span>
                        </p>
                    ';
                ?>
            </div>
            <div class="voucher bg-white p15">
                <p>
                    <i class="fa-solid fa-tags"></i>
                    Mã giảm giá
                </p>
                <div class="voucher-item d-inline-block fs14">
                    Giảm 20k
                </div>
                <div class="voucher-item d-inline-block fs14">
                    Giảm 10k
                </div>
            </div>
            <div class="promotion mt20">
                <h3 class="fs14">THÔNG TIN & KHUYẾN MÃI</h3>
                <div class="bg-white p15 fs14">
                    <p>
                        <i class="fa-solid fa-square-check" style="color: #1dc920;"></i>
                        Được kiểm tra hàng và Thanh toán khi nhận hàng.
                    </p>
                    <p>
                        <i class="fa-solid fa-square-check" style="color: #1dc920;"></i>
                        Giao hàng trên Toàn Quốc
                    </p>
                    <p>
                        <i class="fa-solid fa-square-check" style="color: #1dc920;"></i>
                        Đặt online hoặc gọi ngay <span class="text-danger txt-medium">0909354135</span>
                    </p>
                    <p>
                        <i class="fa-solid fa-square-check" style="color: #1dc920;"></i>
                        Chiết khấu cao cho các đại lý và khách đặt sỉ
                    </p>
                </div>
            </div>
        </div>

        <!-- sale -->
        <div class="col-3">
            <div class="sale">
                <div class="sale-title plr20 pt20 pb20 d-flex">
                    <i class="fa-regular fa-truck-fast me-3 ms-2 fs30" style="color: #ffffff;"></i>
                    <h3 class="fs14 text-white mb-0">
                        Sale Bạt Ngàn, Đón Hè Sang Với Nhiều Ưu Đãi Hấp Dẫn
                    </h3>
                </div>
                <div class="sale-content bg-white p10">
                    <div class="d-flex align-items-center mb10">
                        <span>
                            <i class="location fa-solid fa-location-dot text-white d-flex justify-content-center align-items-center me-3"></i>
                        </span>
                        <p class="fs14 mb-0">Giao hàng bởi Công Ty TNHH Trực Tuyến <span class="txt-semiBold">BOOKSTORE</span></p>
                    </div>

                    <div class="d-flex align-items-center mb10">
                        <span>
                            <i class="fa-solid fa-truck text-white d-flex justify-content-center align-items-center me-3"></i>
                        </span>
                        <p class="fs14 mb-0">Giao hàng trên toàn Quốc</p>
                    </div>

                    <div class="d-flex align-items-center mb10">
                        <span>
                            <i class="fa-solid fa-credit-card text-white d-flex justify-content-center align-items-center me-3"></i>
                        </span>
                        <p class="fs14 mb-0">Nhận hàng rồi mới thanh toán tiền ( COD )</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb30">
        <div class="col detail-main bg-white mt20 p20">
            <div class="mb30">
                <h3>Mô tả sản phẩm</h3>
            </div>
            <p>Đang cập nhật</p>
        </div>
    </div>
</div>