<?php
include "../model/passwordBcrypt.php";
function login_admin($conn)
{
 

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $login_query =  "SELECT * FROM user WHERE email ='$email' "  ;
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

       
        $_SESSION['auth_user'] =[

          'name' => $user_name,
          'full_name' => $full_name,
          'email'=> $user_email,
          'address'=> $user_address,
          'phone'=> $user_phone,
          'image'=> $user_image,
          'birthday'=> $user_birthday,
          'role'=> $user_role,
          ];


        $_SESSION['message'] = "Đăng nhập thành công";
        header('Location: index.php?act=home');
      }
      else
      {
        $_SESSION['message_warning'] = "Sai password ";
      }

  }
  else{
    $_SESSION['message_warning'] = "Không tìm thấy Email ";
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
?>