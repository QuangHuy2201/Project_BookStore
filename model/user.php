<?php 
include "./model/mail.php";
//*Register
function register()
{
  $conn =connectdb();

 
  $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
  
  if($password!=$confirm_password)
    $_SESSION['message_warning'] ="Mật khẩu và xác nhận không khớp.";
  else{
    
 
    $email_query = " SELECT * FROM user WHERE email = '$email' ";
    $email_query_run = mysqli_query($conn,$email_query);

    //Check email
    if(mysqli_num_rows($email_query_run)>0)
      $_SESSION['message_warning'] = "Email đã được đăng kí, vui lòng thử với email khác !";
    else 
    {
      //Password hash
      $password = PasswordHash($password);
      //Insert user data
      $insert_query = "INSERT INTO user (user_name,email,password,role_id) VALUES ('$user_name','$email','$password',2)";
      $insert_query_run = mysqli_query($conn,$insert_query);
      if($insert_query_run)
       { //Send mail
        //sendmail($user_name,$email);
        $_SESSION['message'] = "Vui lòng kiểm tra email và đăng nhập với thông tin vừa tạo !";
       }
      else
      {  
        $_SESSION['message_warning'] = "Đã xảy ra lỗi.";
      }
    }
  }
}
function login()
{
  $conn =connectdb();

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
        $user_email = $user_data['email'];
        $user_phone = $user_data['phone'];
        $user_role = $user_data['role_id'];

       
        $_SESSION['auth_user'] =[

          'name' => $user_name ,
          'email'=> $user_email,
          'phone'=> $user_phone,
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

function check_info()
{
  if(isset($_SESSION['auth_user']))
  {
    if($_SESSION['auth_user']['name']=="")
    $_SESSION['message_info'] = "Vui lòng cập nhật thông tin tài khoản.";
    else if ($_SESSION['auth_user']['phone']=="")
    $_SESSION['message_info'] = "Vui lòng cập nhật thông tin tài khoản.";
  }
  
}

function show_to_warning($message)
{
 
      echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
          '.$message.'
  <button type="button" name="close_message"  class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
     unset($message);
     
  
}
function show_to_message($message)
{
 
      echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
          '.$message.'
  <button type="button" name="close_message"  class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
     unset($message);
  
}




?>