<?php 
// include "./model/cart.php";
include "../model/connectDB.php";
// include "./model/product.php";
// include "./model/page.php";
 include "./model/login.php";
// include "./model/passwordBcrypt.php";

//Header

include "./view/header.php";

if(isset($_GET['act']))
    {   
        switch($_GET['act'])
        {   
            case'home':
                include "./view/home.php";
                break;
            case 'login':
                if (isset($_POST['btn-login']))
                {   
                    login_admin(connectdb());
                }
                include "./view/login.php";
                break;
            default:
                include "./view/login.php";
                break;
        }
    }
else {
    
    include "./view/login.php";
   
}
