<?php
include "../view/header.php";
?>

<div class="container">
    <div class="row bg-white h-100">
        <div class="col-4">
            <img src="../static/images/logo/login_img.jpg" alt="logging">
        </div>
        <div class="col-8 my-auto plr50">
            <form action="">
                <!-- Email input -->
                <div class="mb-4">
                    <label class="d-block mb-2" for="email">Email address</label>
                    <input type="email" id="email" class="p10 w-100 text-start" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="d-block mb-2" for="password">Password</label>
                    <input type="password" id="password" class="p10 w-100 text-start" />
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                    </div>
                    <div class="col  d-flex justify-content-center">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                    </div>
                </div>
                <div class=" d-flex justify-content-center">
                    <button type="button" class="btn color-primary mb-4 text-white fs16 plr20 pt05 pb05">Sign in</button>
                </div>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="#!">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    </body>

    </html>

    <?php
    include "../view/footer.php";
    ?>