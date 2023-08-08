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
                        <form id="LoginForm" action="index.php?act=login" method="POST">
                            <input type="text" placeholder="Username" name="user_name">
                            <input type="password" placeholder="Password" name="password">
                            <input type="submit" class="btn" name="btn-login" value="Login"></input>
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