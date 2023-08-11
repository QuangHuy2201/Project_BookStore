<div class="container">
    <!-- breadcrumb -->
    <div class="row bg-white p10 bd1 mt20 mb20 fs14">   
        <nav aria-label="breadcrumb" class="d-flex align-items-center">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-reset text-decoration-none" href="index.php?act=home">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-reset text-decoration-none" href="index.php?act=product">Sách</a></li>
                <?php 
                    echo '<li class="breadcrumb-item" aria-current="page"><a class="text-reset text-decoration-none" href="index.php?act=product&category='.$product['category_id'].'">'.$category.'</a></li>';
                    echo '<li class="breadcrumb-item active" aria-current="page">'.$product['product_name'].'</li>';
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
                        <div class="d-flex align-items-center opacity-75 fs14">
                            <p class="me-1">'.$product['view'].'</p>
                            <p>lượt xem</p>
                        </div>
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
            <div class="bg-white mt10 d-flex p10">

            <?php
                echo '  <form action="?act=cart" method="POST">
                            <input type="hidden" name="product_name" value="'.$product['product_name'].'" >
                            <input type="hidden" name="image" value="'.$product['image'].'" >
                            <input type="hidden" name="price" value="'.$product['price'].'" >
                            <input type="hidden" name="quantity" value="1" >
                            <input type="hidden" name="category_id" value="'.$product['category_id'].'" >
                            <button type="submit" name="add_cart" class="ms-5 p-3 bg-danger-subtle txt-medium text-danger text-decoration-none border border-danger b-radius" href="#">
                                <i class="fa-regular fa-cart-plus me-1"></i>
                                Thêm vào giỏ hàng
                            </button>
                        </form>';
                ?>
               
                <?php
                echo '  <form action="?act=cart" method="POST">
                            <input type="hidden" name="product_name" value="'.$product['product_name'].'" >
                            <input type="hidden" name="image" value="'.$product['image'].'" >
                            <input type="hidden" name="price" value="'.$product['price'].'" >
                            <input type="hidden" name="quantity" value="1" >
                            <input type="hidden" name="category_id" value="'.$product['category_id'].'" >
                            <button type="submit" name="buy_now" class="ms-5 p-3 bg-danger txt-medium text-white text-decoration-none border border-danger b-radius" >Mua ngay</button>
                        </form>';
                ?>
               
                
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