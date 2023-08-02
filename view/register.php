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