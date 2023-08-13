<?php if ($_GET['act'] = '') echo 'ab'; ?>
<section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./static/images/slide/slide1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./static/images/slide/slide2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./static/images/slide/slide3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<div class="container mt-5">
    <div class="row">
        <div class="col-9">
            <div class="row bg-white">
                <div class="list px-0 d-flex justify-content-between align-items-center">
                    <div>
                        <div class="list-title_icon d-inline-block">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <h3 class="list-title txt-medium p10 d-inline-block">Truyện kiếm hiệp</h3>
                    </div>
                    <a href="index.php?act=product&category=1" class="text-reset text-decoration-none me-3 fs14">
                        Toàn bộ
                        <i class="fa-solid fa-caret-down"></i>
                    </a>
                </div>
                <?php
                foreach ($products_1 as $product) {
                    $price =number_format($product['price'])."đ";
                    $price_old =number_format($product['price_old'])."đ";
                    $discount_percent = 100 - (round($product['price'] / $product['price_old'], 2) * 100);
                    if($product['category_id']==1)
                    $link_img="./static/images/sach-truyen-kiem-hiep/";
                    else if($product['category_id']==2)
                    $link_img="./static/images/sach-van-hoc/";
                    else $link_img="./static/images/truyen-tranh-comic/";
                    echo '<div class="col-3 mt50">
                            <div class="product-item p10 mb15">
                                <div class="product-img text-center">
                                    <a href="index.php?act=detail&name='.$product['product_name'].'">
                                        <img src="'.$link_img.''.$product['image'].'" title="'.$product['product_name'].'" alt="'.$product['product_name'].'">
                                    </a>
                                </div>
                                <a class="product-title text-reset text-decoration-none fs13 mt10" name="detail" href="index.php?act=detail&name='.$product['product_name'].'" >'.$product['product_name'].'</a>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <p class="fs10 text-decoration-line-through me-2">'.$price_old.'</>
                                        <p class="product-price me-2 text-danger txt-medium">'.$price.'</p>
                                        <p class="discount_percent badge rounded-pill text-bg-danger">'.$discount_percent.'%</p>
                                    </div>
                                    <div class="d-flex align-items-center opacity-75 fs14">
                                        <p class="me-1">'.$product['view'].'</p>
                                        <p>lượt xem</p>
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
                ?>
            </div>
        </div>

        <div class="col-3">
            <div class="bg-white p15">
                <div class="txt-semiBold border-bottom">SẢN PHẨM BÁN CHẠY</div>
                <div>
                    <?php
                        foreach($views_1 as $product_view) {
                            $price =number_format($product_view['price'])."đ";
                            $price_old =number_format($product_view['price_old'])."đ";
                            $discount_percent = 100 - (round($product_view['price'] / $product_view['price_old'], 2) * 100);
                            if($product_view['category_id']==1)
                                $link_img="./static/images/sach-truyen-kiem-hiep/";
                            else if($product_view['category_id']==2)
                                $link_img="./static/images/sach-van-hoc/";
                            else $link_img="./static/images/truyen-tranh-comic/";
                            echo '
                                <div class="mt20 d-flex">
                                    <a href="index.php?act=detail&name='.$product_view['product_name'].'">
                                        <img src="'.$link_img.''.$product_view['image'].'" width="60"></img>
                                    </a>
                                    <div class="ms-3">
                                        <a class="product-title text-reset text-decoration-none fs13" name="detail" href="index.php?act=detail&name='.$product_view['product_name'].'" >'.$product_view['product_name'].'</a>
                                        <div class="d-flex align-items-center opacity-75 fs13">
                                            <p class="me-1 mb-0">'.$product_view['view'].'</p>
                                            <p class="mb-0">lượt xem</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <p class="fs10 text-decoration-line-through me-2">'.$price_old.'</>
                                            <p class="product-price me-2 text-danger txt-medium">'.$price.'</p>
                                            <p class="discount_percent badge rounded-pill text-bg-danger">'.$discount_percent.'%</p>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-9">
            <div class="row bg-white">
                <div class="list px-0 d-flex justify-content-between align-items-center">
                    <div>
                        <div class="list-title_icon d-inline-block">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <h3 class="list-title txt-medium p10 d-inline-block">Sách văn học</h3>
                    </div>
                    <a href="index.php?act=product&category=2" class="text-reset text-decoration-none me-3 fs14">
                        Toàn bộ
                        <i class="fa-solid fa-caret-down"></i>
                    </a>
                </div>
                <?php
                foreach ($products_2 as $product) {
                    $price =number_format($product['price'])."đ";
                    $price_old =number_format($product['price_old'])."đ";
                    $discount_percent = 100 - (round($product['price'] / $product['price_old'], 2) * 100);
                    if($product['category_id']==1)
                    $link_img="./static/images/sach-truyen-kiem-hiep/";
                    else if($product['category_id']==2)
                    $link_img="./static/images/sach-van-hoc/";
                    else $link_img="./static/images/truyen-tranh-comic/";
                    echo '<div class="col-3 mt50">
                            <div class="product-item p10 mb15">
                                <div class="product-img text-center">
                                    <a href="index.php?act=detail&name='.$product['product_name'].'">
                                        <img src="'.$link_img.''.$product['image'].'" title="'.$product['product_name'].'" alt="'.$product['product_name'].'">
                                    </a>
                                </div>
                                <a class="product-title text-reset text-decoration-none fs13 mt10" name="detail" href="index.php?act=detail&name='.$product['product_name'].'" >'.$product['product_name'].'</a>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <p class="fs10 text-decoration-line-through me-2">'.$price_old.'</>
                                        <p class="product-price me-2 text-danger txt-medium">'.$price.'</p>
                                        <p class="discount_percent badge rounded-pill text-bg-danger">'.$discount_percent.'%</p>
                                    </div>
                                    <div class="d-flex align-items-center opacity-75 fs14">
                                        <p class="me-1">'.$product['view'].'</p>
                                        <p>lượt xem</p>
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
                ?>
            </div>
        </div>

        <div class="col-3">
            <div class="bg-white p15">
                <div class="txt-semiBold border-bottom">SẢN PHẨM BÁN CHẠY</div>
                <div>
                    <?php
                        foreach($views_2 as $product_view) {
                            $price =number_format($product_view['price'])."đ";
                            $price_old =number_format($product_view['price_old'])."đ";
                            $discount_percent = 100 - (round($product_view['price'] / $product_view['price_old'], 2) * 100);
                            if($product_view['category_id']==1)
                                $link_img="./static/images/sach-truyen-kiem-hiep/";
                            else if($product_view['category_id']==2)
                                $link_img="./static/images/sach-van-hoc/";
                            else $link_img="./static/images/truyen-tranh-comic/";
                            echo '
                                <div class="mt20 d-flex">
                                    <a href="index.php?act=detail&name='.$product_view['product_name'].'">
                                        <img src="'.$link_img.''.$product_view['image'].'" width="60"></img>
                                    </a>
                                    <div class="ms-3">
                                        <a class="product-title text-reset text-decoration-none fs13" name="detail" href="index.php?act=detail&name='.$product_view['product_name'].'" >'.$product_view['product_name'].'</a>
                                        <div class="d-flex align-items-center opacity-75 fs13">
                                            <p class="me-1 mb-0">'.$product_view['view'].'</p>
                                            <p class="mb-0">lượt xem</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <p class="fs10 text-decoration-line-through me-2">'.$price_old.'</>
                                            <p class="product-price me-2 text-danger txt-medium">'.$price.'</p>
                                            <p class="discount_percent badge rounded-pill text-bg-danger">'.$discount_percent.'%</p>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-9">
            <div class="row bg-white">
                <div class="list px-0 d-flex justify-content-between align-items-center">
                    <div>
                        <div class="list-title_icon d-inline-block">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <h3 class="list-title txt-medium p10 d-inline-block">Truyện tranh - comic</h3>
                    </div>
                    <a href="index.php?act=product&category=3" class="text-reset text-decoration-none me-3 fs14">
                        Toàn bộ
                        <i class="fa-solid fa-caret-down"></i>
                    </a>
                </div>
                <?php
                foreach ($products_3 as $product) {
                    $price =number_format($product['price'])."đ";
                    $price_old =number_format($product['price_old'])."đ";
                    $discount_percent = 100 - (round($product['price'] / $product['price_old'], 2) * 100);
                    if($product['category_id']==1)
                    $link_img="./static/images/sach-truyen-kiem-hiep/";
                    else if($product['category_id']==2)
                    $link_img="./static/images/sach-van-hoc/";
                    else $link_img="./static/images/truyen-tranh-comic/";
                    echo '<div class="col-3 mt50">
                            <div class="product-item p10 mb15">
                                <div class="product-img text-center">
                                    <a href="index.php?act=detail&name='.$product['product_name'].'">
                                        <img src="'.$link_img.''.$product['image'].'" title="'.$product['product_name'].'" alt="'.$product['product_name'].'">
                                    </a>
                                </div>
                                <a class="product-title text-reset text-decoration-none fs13 mt10" name="detail" href="index.php?act=detail&name='.$product['product_name'].'" >'.$product['product_name'].'</a>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <p class="fs10 text-decoration-line-through me-2">'.$price_old.'</>
                                        <p class="product-price me-2 text-danger txt-medium">'.$price.'</p>
                                        <p class="discount_percent badge rounded-pill text-bg-danger">'.$discount_percent.'%</p>
                                    </div>
                                    <div class="d-flex align-items-center opacity-75 fs14">
                                        <p class="me-1">'.$product['view'].'</p>
                                        <p>lượt xem</p>
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
                ?>
            </div>
        </div>

        <div class="col-3">
            <div class="bg-white p15">
                <div class="txt-semiBold border-bottom">SẢN PHẨM BÁN CHẠY</div>
                <div>
                    <?php
                        foreach($views_3 as $product_view) {
                            $price =number_format($product_view['price'])."đ";
                            $price_old =number_format($product_view['price_old'])."đ";
                            $discount_percent = 100 - (round($product_view['price'] / $product_view['price_old'], 2) * 100);
                            if($product_view['category_id']==1)
                                $link_img="./static/images/sach-truyen-kiem-hiep/";
                            else if($product_view['category_id']==2)
                                $link_img="./static/images/sach-van-hoc/";
                            else $link_img="./static/images/truyen-tranh-comic/";
                            echo '
                                <div class="mt20 d-flex">
                                    <a href="index.php?act=detail&name='.$product_view['product_name'].'">
                                        <img src="'.$link_img.''.$product_view['image'].'" width="60"></img>
                                    </a>
                                    <div class="ms-3">
                                        <a class="product-title text-reset text-decoration-none fs13" name="detail" href="index.php?act=detail&name='.$product_view['product_name'].'" >'.$product_view['product_name'].'</a>
                                        <div class="d-flex align-items-center opacity-75 fs13">
                                            <p class="me-1 mb-0">'.$product_view['view'].'</p>
                                            <p class="mb-0">lượt xem</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <p class="fs10 text-decoration-line-through me-2">'.$price_old.'</>
                                            <p class="product-price me-2 text-danger txt-medium">'.$price.'</p>
                                            <p class="discount_percent badge rounded-pill text-bg-danger">'.$discount_percent.'%</p>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
