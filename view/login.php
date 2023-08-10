

<section class="myform-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
<?php
if(isset($_SESSION['message_warning']))
{show_to_warning($_SESSION['message_warning']);unset($_SESSION['message_warning']);}
if(isset($_SESSION['message']))
{show_to_message($_SESSION['message']);unset($_SESSION['message']);}
if(isset($_SESSION['message_info']))
{show_to_warning($_SESSION['message_info']);unset($_SESSION['message_info']);}
?>
                <div class="form-area login-form">
                    <div class="form-content">
                        <img src="./static/images/logo/login_img.jpg" alt="logging" >
                    </div>
                    <div class="form-input form-input2">
                        <h2>Đăng Nhập</h2>
                        <form action="index.php?act=login" method="POST">
                            <div class="form-group">
                                <input type="email" id="" name="email" required>
                                <label>Email</label>
                            </div>
                            <div class="form-group">
                                <input type="password" id="" name="password" required>
                                <label>Mật khẩu</label>
                            </div>
                            <div class="forgot-password fs14 text-end mt10">
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                            <div class="myform-button">
                                <input type="submit" name="btn-login" class="myform-btn" value="Đăng nhập"></input>
                            </div>
                            <div class="register fs14 text-center mt20">
                                Bạn chưa phải là thành viên?
                                <a href="index.php?act=register" class="d-block">Đăng ký</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
