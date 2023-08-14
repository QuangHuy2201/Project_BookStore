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
        echo'<script> window.location.href="index.php?act=home";</script>';
        //header('Location: index.php?act=home');
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
    if($_SESSION['auth_user']['full_name']=="")
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

function update_user_info( $table,$user_email,$user_name, $user_full_name, $user_address, $user_phone,$user_birthday,$conn)
{
  $sql = "UPDATE  $table 
  SET user_name = '$user_name', full_name='$user_full_name' ,address = '$user_address', phone = '$user_phone', birthday= '$user_birthday' 
  WHERE (email = '$user_email')";
  mysqli_query($conn,$sql);

}
function update_user_img( $table,$user_email,$image,$conn)
{
  $sql = "UPDATE  $table SET image = '$image' WHERE (email = '$user_email')";
  mysqli_query($conn,$sql);

}
function Update_user_data($email,$conn){

    //Load user data update
    $login_query =  "SELECT * FROM user WHERE email ='$email' "  ;
    $login_query_run = mysqli_query($conn,$login_query);
    $user_data = mysqli_fetch_array($login_query_run);
  
    if (mysqli_num_rows($login_query_run)>0)
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
    }
    else echo"aaa";
}

function upload_img($filename,$tempname){

	$folder = "./static/images/user/" . $filename;
  //move_uploaded_file($tempname, $folder)
	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		return true;
	} else {
		return false;
	}

}
function delete_file($file_pointer){

  // PHP program to delete a file named gfg.txt
// using unlink() function

// Use unlink() function to delete a file
if (!unlink($file_pointer)) {
    echo ("$file_pointer cannot be deleted due to an error");
}
else {
   // echo ("$file_pointer has been deleted");
}
}
function update_img_1()
{
$msg="";
$target_dir = "./static/images/user/";
$target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Check if file already exists
if (file_exists($target_file)) {
  $msg ="Ảnh đã tồn tại.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["uploadfile"]["size"] > 500000) {
  $msg ="Ảnh có dung lượng quá lớn.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "PNG" ) {
  $msg ="Xin lỗi, chỉ chấp nhận file JPG,PNG.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $msg .=" Xin lỗi, ảnh của bạn chưa dược cập nhật.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)) {
    $msg .= "Ảnh ". htmlspecialchars( basename( $_FILES["uploadfile"]["name"])). " đã được tải lên.";
  } else {
    $msg .= " Xin lỗi, ảnh của bạn không được tải lên.";
  }
}
return array ($msg,$uploadOk) ;
}
?>