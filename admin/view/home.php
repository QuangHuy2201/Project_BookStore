<?php
if(isset($_SESSION['message_warning']))
{show_to_warning($_SESSION['message_warning']);unset($_SESSION['message_warning']);}
if(isset($_SESSION['message']))
{show_to_message($_SESSION['message']);unset($_SESSION['message']);}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore - DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/font/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/common.css">
    <link rel="stylesheet" href="../static/css/style_admin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark w-100">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <img src="../static/images/logo/logo1.png" width="50%"></img>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white" aria-current="page">
                                <i class="fa-regular fa-house"></i>
                                Trang chủ
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="fa-regular fa-user"></i>
                                Thành viên
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="fa-regular fa-list"></i>
                                Loại sản phầm
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="fa-regular fa-grid-2"></i>
                                Sản phẩm
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="fa-regular fa-box"></i>
                                Đơn hàng
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                            <strong>mdo</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>