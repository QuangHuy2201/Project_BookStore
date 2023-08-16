<?php
include "../model/passwordBcrypt.php";
function login_admin($conn)
{
 

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $login_query =  "SELECT * FROM user WHERE email ='$email' and role_id=1 "  ;
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
        
        $user_name = $user_data['user_name'];
        $full_name = $user_data['full_name'];
        $user_email = $user_data['email'];
        $user_address = $user_data['address'];
        $user_phone = $user_data['phone'];
        $user_image = $user_data['image'];
        $user_birthday = $user_data['birthday'];
        $user_role = $user_data['role_id'];

       
        $_SESSION['auth_admin'] =[

          'name' => $user_name,
          'full_name' => $full_name,
          'email'=> $user_email,
          'address'=> $user_address,
          'phone'=> $user_phone,
          'image'=> $user_image,
          'birthday'=> $user_birthday,
          'role'=> $user_role,
          ];


        $_SESSION['message-ad'] = "Đăng nhập thành công";
        header('Location: index.php?act=user');
      }
      else
      {
        $_SESSION['message_warning-ad'] = "Sai password ";
      }

  }
  else{
    $_SESSION['message_warning-ad'] = "Không tìm thấy Email ";
    
  }
}

function show_to_warning($message)
{
 
      echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
          '.$message.'
  <button type="button" name="close_message"  class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
   
     
  
}
function show_to_message($message)
{
 
      echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
          '.$message.'
  <button type="button" name="close_message"  class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

function register($conn)
{

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  
  $email_query = " SELECT * FROM user WHERE email = '$email'  ";
  $email_query_run = mysqli_query($conn,$email_query);

    //Check email
    if(mysqli_num_rows($email_query_run)>0)
      $_SESSION['message_warning-ad'] = "Email đã được đăng kí, vui lòng thử với email khác !";
    else 
    {
      //Password hash
      $password = PasswordHash($password);
      //Insert user data
      $insert_query = "INSERT INTO user (email,password,role_id) VALUES ('$email','$password',$role)";
      $insert_query_run = mysqli_query($conn,$insert_query);
      if($insert_query_run)
       { 

        $_SESSION['message-ad'] = "Thêm người dùng thành công!";

       }
      else
      {  

        $_SESSION['message_warning-ad'] = "Đã xảy ra lỗi.";

      }
    }
  
}

?>