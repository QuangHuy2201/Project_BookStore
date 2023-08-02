 <!-- Account Page -->
<?php   

session_start();

?>

 <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/image1.png" width="100%">
                </div>
                <div class="col-2">
             
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>
                        <form id="LoginForm" action="model/user.php" method="POST">

                        <?php 
                        
                        if(isset($_SESSION['message_login'])) 
                        {
                           
                            ?> 
                            
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Oh!</strong>  <?= $_SESSION['message_login']; ?> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                            unset($_SESSION['message_login']);

                        }

                        ?>

                            <input type="text" placeholder="Username" name="user_name">
                            <input type="password" placeholder="Password" name="password">
                            <button type="submit" class="btn" name="btn-login">Login</button>
                            <a href="">Forget Password</a>
                        </form>


                        <form id="RegForm" action="model/user.php" method="POST">

                        <?php 
                        
                            if(isset($_SESSION['message_register'])) 
                            {
                               
                                ?> 
                                
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Oh!</strong>  <?= $_SESSION['message_register']; ?> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                                unset($_SESSION['message_register']);

                            }

                            ?>
                            <input type="text"  name="user_name" placeholder="Username">
                            <input type="email" name="email" placeholder="Email">
                            <input type="password" name="password" placeholder="Password">
                            <input type="password" name="cpassword" placeholder="Confirm Password">
                            <button type="submit" name="btn-register" class="btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- Toggle Form -->
 <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");
        function register() {
            RegForm.style.transform = "translatex(0px)";
            LoginForm.style.transform = "translatex(0px)";
            Indicator.style.transform = "translateX(100px)";

        }
        function login() {
            RegForm.style.transform = "translatex(300px)";
            LoginForm.style.transform = "translatex(300px)";
            Indicator.style.transform = "translate(0px)";

        }
        <?php
            
            
           
        ?>
</script>