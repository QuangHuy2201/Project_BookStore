<?php ?>
<div class="container mt-5">
    <div class="row">
        <nav aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sách</li>
            </ol>
        </nav>
    </div>

    <div class="row mb20">
        <div class="col-3 category">
            <div class="category-title_icon d-inline-block">
                <i class="fa fa-th"></i>
            </div>
            <h3 class="category-title txt-medium p10 d-inline-block">Danh mục</h3>
            <form  method="GET">
            <ul class="category-list list-unstyled mt50 ms-3">
                <li><a type="submit"  href="index.php?act=product&category=1" name="category1"  class="text-decoration-none fs14" >Truyện kiếm hiệp</a></li>
                <li><a type="submit"  href="index.php?act=product&category=2" name="category2" class="text-decoration-none fs14">Sách văn học</a></li>
                <li><a type="submit"  href="index.php?act=product&category=3" name="category3" class="text-decoration-none fs14">Truyện tranh - comic</a></li>
            </ul>
            </form>
        </div>
        <div class="col-9">
            <h3 class="txt-medium ms-3">
                TẤT CẢ SẢN PHẨM
            </h3>
            <div class="filter row ms-3 fs14 mt10 pb10">
                <div class="col-2">Sắp xếp theo</div>
                <div class="col-2 filter-item">
                    <a href="">Bán chạy</a>
                </div>
                <div class="col-2 filter-item">
                    <a href="index.php?act=product&category=<?php echo $category_id ?>&sort=1">Giá thấp nhất</a>
                </div>
                <div class="col-2 filter-item">
                    <a href="">Giá cao nhất</a>
                </div>
            </div>

            <div class="row  ms-3 mt20">
                <?php
                show_to_products($products); 
                ?>
            </div>

            <div class="pagination d-flex justify-content-center mt20">
                <div class="btn-group" role="group" aria-label="First group">
                    <?php page_bar($page_current,$page_left, $page_right,$pages,$category_id); ?>
                </div>
            </div>
        </div>
    </div>

