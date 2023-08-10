
<div class="container mt-5">
    <div class="row">
        <nav aria-label="breadcrumb" class="">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a class="text-reset text-decoration-none" href="index.php?act=home">Trang chủ</a></li>
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
                <li><a type="submit"  href="index.php?act=product&category=1" name="category1" 
                class="text-decoration-none fs14 <?php if($category_id=='1')echo'txt-medium';?>" >Truyện kiếm hiệp</a></li>
                <li><a type="submit"  href="index.php?act=product&category=2" name="category2" 
                class="text-decoration-none fs14 <?php if($category_id=='2')echo'txt-medium';?>">Sách văn học</a></li>
                <li><a type="submit"  href="index.php?act=product&category=3" name="category3" 
                class="text-decoration-none fs14 <?php if($category_id=='3')echo'txt-medium';?>">Truyện tranh - comic</a></li>
            </ul>
            </form>
        </div>
        <div class="col-9">
            <h3 class="txt-medium ms-3">
                TẤT CẢ SẢN PHẨM
            </h3>
            <?php
            if(isset($_SESSION['search']))
            {
                if ($_SESSION['search']!=0)
                {
                echo'   <h4 class="txt-medium ms-3">
                     Tìm thấy '.$_SESSION['search'].' sách phù hợp.
                    </h4>';
                    unset($_SESSION['search']);
                }
                else {
                    echo'   <h4 class="txt-medium ms-3">
                    Không tìm thấy sách phù hợp.
                    </h4>';
                    unset($_SESSION['search']);
                }
            }

           

            ?>
           
            <div class="filter row ms-3 fs14 mt10 pb10">
                <div class="col-2">Sắp xếp theo</div>
                <div class="col-2 filter-item">
                    <a href="index.php?act=product&category=<?php if(isset($category_id))echo $category_id; else echo 0; ?>&sort=1"
                    class="<?php if($sort=='1')echo'filter-item_a';?>"  >Lượt xem</a>
                </div>
                <div class="col-2 filter-item">
                    <a href="index.php?act=product&category=<?php if(isset($category_id))echo $category_id; else echo 0; ?>&sort=2" 
                    class="<?php if($sort=='2')echo'filter-item_a';?>" >Giá giảm dần</a>
                </div>
                <div class="col-2 filter-item">
                    <a href="index.php?act=product&category=<?php if(isset($category_id))echo $category_id; else echo 0; ?>&sort=3"
                    class="<?php if($sort=='3')echo'filter-item_a';?>">Giá tăng dần</a>
                </div>
            </div>

            <div class="row  ms-3 mt20">
                <?php
                show_to_products($products); 
                ?>
            </div>

            <div class="pagination d-flex justify-content-center mt20">
                <div class="btn-group" role="group" aria-label="First group">
                    <?php 
                    if($page_bar_opt =='1')
                    page_bar_category($page_current,$page_left, $page_right,$pages,$category_id); 
                    else if($page_bar_opt =='2')
                    page_bar_category_sort($page_current,$page_left, $page_right,$pages,$category_id,$sort); 
                    else if($page_bar_opt =='3')
                    page_bar_search($page_current,$page_left,$page_right,$pages,$search); 
                    ?>
                </div>
            </div>
        </div>
    </div>

