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


                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var Indicator = document.getElementById("Indicator");
       
        function login() {
            
            LoginForm.style.transform = "translatex(0px)";
            Indicator.style.transform = "translate(0px)";

        }
      
</script>