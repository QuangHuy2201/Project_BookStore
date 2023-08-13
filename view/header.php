<?php
session_start();
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'product':
            $header = 'product';
            break;
        case 'cart':
            $header = 'cart';
            break;
        case 'login':
            $header = 'login';
            break;
        case 'register':
            $header = 'login';
            break;
        case 'detail':
            $header = 'detail';
            break;
        default:
            $header = 'home';
            break;
    }
} else $header = 'home';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./static/font/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="./static/css/normalize.css">
    <link rel="stylesheet" href="./static/css/cart.css">
    <link rel="stylesheet" href="./static/css/common.css">
    <link rel="stylesheet" href="./static/css/Style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>
    <header class="p-3 bg-blue text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <!-- <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg> -->
                    <img src="./static/images/logo/logo1.png" width="80" height="35" alt="logo">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-3 text-white active">Trang chủ</a></li>
                    <li>
                        <a class="nav-link px-3 text-white dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu fs14">
                            <li><a class="dropdown-item" href="index.php?act=product">Tất cả</a></li>
                            <li><a class="dropdown-item" href="index.php?act=product&category=1">Sách văn học</a></li>
                            <li><a class="dropdown-item" href="index.php?act=product&category=2">Truyện kiếm hiệp</a></li>
                            <li><a class="dropdown-item" href="index.php?act=product&category=3">Truyện tranh Manga - Comic</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php?act=about" class="nav-link px-3 text-white">Về chúng tôi</a></li>
                    <li><a href="#" class="nav-link px-3 text-white">Liên hệ</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="index.php" method="GET">
                    <input type="hidden" name ="act"value="search"/>
                    <input type="text" name="search"class="form-control form-control-dark fs14" placeholder="Tìm kiếm..." aria-label="Search" 
                        value="<?php if(isset($_GET['search'])) echo $_GET['search'];?>">
                </form>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <a href="index.php?act=cart" class="btn btn-outline-light me-2 fs14">
                        <i class="fa-light fa-cart-shopping"></i>
                        Giỏ hàng
                    </a>
                </form>

                <?php
                    if (isset($_SESSION['auth_user'])) {
                ?>
                    <div class="text-end">
                        <a type="button" role="button" data-bs-toggle="dropdown" class="text-white me-2 text-decoration-none fs14 dropdown-toggle">Xin chào, <?php echo $_SESSION['auth_user']['name'];?></a>
                        <ul class="dropdown-menu fs14">
                            <li><a class="dropdown-item" href="index.php?act=account">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="index.php?act=logout">Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <div class="text-end">
                        <a href="index.php?act=login" type="button" class="btn btn-outline-light me-2 fs14">Đăng nhập</a>
                    </div>
                <?php }
                ?>

                

                
            </div>
        </div>
    </header>