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
                        <h2>Quên mật khẩu</h2>
                        <form>
                            <div class="form-group">
                                <input type="password" id="" name="password1" required>
                                <label>Mật khẩu mới</label>
                            </div>
                            <div class="form-group">
                                <input type="password" id="" name="password2" required>
                                <label>Nhập lại mật khẩu mới</label>
                            </div>
                            <div class="forgot-password fs14 text-end mt10">
                                <a href="#">Đăng nhập?</a>
                            </div>

                            <div class="myform-button">
                                <button class="myform-btn">Xác nhận</button>
                            </div>
                            <div class="register fs14 text-center mt20">
                                Bạn chưa phải là thành viên?
                                <a href="#" class="d-block">Đăng ký</a>
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