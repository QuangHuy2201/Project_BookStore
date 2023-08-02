<?php 
include "connectDB.php" ; 
include "passwordBcrypt.php";
include "mail.php";

session_start();

//*Register
if(isset($_POST['btn-register']))
{
  $conn =connectdb();

  $name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

  if($password ==$cpassword)
  {

    //Check email
    $email_query = " SELECT * FROM user WHERE email = '$email' ";
    $email_query_run = mysqli_query($conn,$email_query);
    if(mysqli_num_rows($email_query_run)>0)
    {
      $_SESSION['message_register'] = "Email Already in Use.";
      $_SESSION['form'] = true;
      header('Location: ../index.php?act=account') ;
    }
    else 
    {

      //Password hash
      $password = PasswordHash($password);
      //Insert user data
      
      $insert_query = "INSERT INTO user (fullname,email,password,role_id) VALUES ('$name','$email','$password',2)";
      $insert_query_run = mysqli_query($conn,$insert_query);
      if( $insert_query_run)

      { 
        //Send mail
        //sendmail($name,$email);
        
        $_SESSION['message_register'] = "Register Successfully.";
        $_SESSION['form'] = true;
        header('Location: ../index.php?act=account') ;
      }
      else
      {  
        $_SESSION['message_register'] = "Something went wrong";
        $_SESSION['form'] = true;
        header('Location: ../index.php?act=account') ;
      }
    }
   
  }
  else{
    $_SESSION['message_register'] = "Password and confirm password do not match.";
    $_SESSION['form'] = true;
    header('Location: ../index.php?act=account') ;
  }
}


//*login
if(isset($_POST['btn-login']))
{
  $conn =connectdb();

  $name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $login_query =  "SELECT * FROM user WHERE fullname ='$name' "  ;
  $login_query_run = mysqli_query($conn,$login_query);

  //Check user name true
  if (mysqli_num_rows($login_query_run)>0)
  {
      //*Get user data
      $user_data = mysqli_fetch_array($login_query_run);

      //Todo: check password_input vs hashed_password
      $hashed_password = $user_data['password'];
      $result=PasswordVerify($password,$hashed_password);
 
      if($result)
      {
        
        $user_name = $user_data['fullname'];
        $user_email = $user_data['email'];
        $_SESSION['auth'] = true ; 
        $_SESSION['auth_user'] =[

          'name' => $user_name ,
          'email' => $user_email,
          

        ];


        $_SESSION['message'] = "Login Successfully.";
        header('Location: ../index.php?act=account') ;

      }
      else
      {
        $_SESSION['message_login'] = "Password incorrect";
       
        header('Location: ../index.php?act=account') ;
      }

  }
  else{
    $_SESSION['message_login'] = "UserName incorrect";
 
    header('Location: ../index.php?act=account') ;
  }

}

?>