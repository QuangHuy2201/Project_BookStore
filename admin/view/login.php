<section class="myform-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
<?php
if(isset($_SESSION['message_warning-ad']))
{show_to_warning($_SESSION['message_warning-ad']);unset($_SESSION['message_warning-ad']);}
?>
                <div class="form-area form-area2 login-form">
                    <div class="form-content">
                        <img src="../static/images/logo/Security.jpg" alt="logging" >
                    </div>
                    <div class="form-input">
                        <h2 class="login-admin">Đăng Nhập</h2>
                        <form action="index.php?act=login"  method="POST">
                            <div class="form-group">
                                <input type="email" id="" name="email" required>
                                <label>Email</label>
                            </div>
                            <div class="form-group">
                                <input type="password" id="" name="password" required>
                                <label>Mật khẩu</label>
                            </div>
                            <div class="myform-button">
                                <button class="myform-btn" type="submit" name="btn-login">Đăng nhập</button >
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