
<section class="myform-area">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-8">
            
<?php
if(isset($_SESSION['message_warning']))
{show_to_warning($_SESSION['message_warning']);unset($_SESSION['message_warning']);}
if(isset($_SESSION['message']))
{show_to_message($_SESSION['message']);unset($_SESSION['message']);}
?>
        </div>
            <div class="col-lg-8">
                <div class="form-area login-form">
                    <div class="form-content">
                        <img src="./static/images/logo/login_img.jpg" alt="logging" >
                    </div>
                    <div class="form-input">
                        <h2>Đăng Ký</h2>
                        <form action="index.php?act=register" method="POST">
                            <div class="form-group">
                                <input type="text" id="" name="user_name" required>
                                <label>Tên tài khoản</label>
                            </div>
                            <div class="form-group">
                                <input type="email" id="" name="email" required>
                                <label>Email</label>
                            </div>
                            <div class="form-group">
                                <input type="password" id="" name="password" required>
                                <label>Mật khẩu</label>
                            </div>
                            <div class="form-group">
                                <input type="password" id="" name="confirm_password" required>
                                <label>Nhập lại mật khẩu</label>
                            </div>
                            <div class="myform-button">
                                <input type="submit" name="btn-register"  class="myform-btn" value="Đăng Ký"></input>
                            </div>
                            <div class="register fs14 text-center mt20">
                                <a href="index.php?act=login" class="d-block">Đăng nhập</a>
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