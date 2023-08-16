<section class="myform-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-area login-form">
                    <div class="form-content">
                        <img src="../static/images/logo/login_img.jpg" alt="logging" >
                    </div>
                    <div class="form-input">
                        <?php
                        if(isset($_SESSION['check_mail_error'])) {show_to_warning($_SESSION['check_mail_error']);unset($_SESSION['check_mail_error']);}
                        if(isset($_SESSION['check_mail_success'])) {show_to_message($_SESSION['check_mail_success']);unset($_SESSION['check_mail_success']);}
                        ?>
                        <h2>Quên mật khẩu</h2>
                        <form action="?act=forgot" method="POST">
                            <div class="form-group">
                                <input type="email" id="" name="email" required>
                                <label>Email</label>
                            </div>
                            <div class="forgot-password fs14 text-end mt10">
                                <a href="index.php?act=login">Đăng nhập?</a>
                            </div>
                            <!-- Dòng này sẽ hiện ra sau khi nấn xác nhận -->
                            <!-- <div class="text-danger mt10">
                                <p>Thư xác nhận đang được gửi vào email của bạn</p>
                            </div> -->

                            <div class="myform-button">
                                <button type="submit" name="btn-forgot" class="myform-btn">Xác nhận</button>
                            </div>
                         </form>
                            <div class="register fs14 text-center mt20">
                                Bạn chưa phải là thành viên?
                                <a href="index.php?act=register" class="d-block">Đăng ký</a>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>