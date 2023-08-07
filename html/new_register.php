<?php
include "../view/header.php";
?>

<section class="myform-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-area login-form">
                    <div class="form-content">
                        <img src="../static/images/logo/login_img.jpg" alt="logging" >
                    </div>
                    <div class="form-input">
                        <h2>Đăng Ký</h2>
                        <form>
                            <div class="form-group">
                                <input type="email" id="" name="email" required>
                                <label>Email</label>
                            </div>
                            <div class="form-group">
                                <input type="password" id="" name="password" required>
                                <label>Mật khẩu</label>
                            </div>
                            <div class="form-group">
                                <input type="password" id="" name="password" required>
                                <label>Nhập lại mật khẩu</label>
                            </div>
                            <div class="myform-button">
                                <button class="myform-btn">Đăng Ký</button>
                            </div>
                            <div class="register fs14 text-center mt20">
                                <a href="#" class="d-block">Đăng nhập</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>

<?php
include "../view/footer.php";
?>