				<?php
                if (isset($_SESSION['auth_user'])) 
				{	if($_SESSION['auth_user']['image'])
               			 echo '<img class="img-account-profile rounded-circle mb-2" width="150" 
				 	src="./static/images/user/'.$_SESSION['auth_user']['image'].'" alt="ảnh đại diện">
				 ';
				 	else 
						echo '<img class="img-account-profile rounded-circle mb-2" width="150" 
						src="./static/images/user/blank-profile-picture.png" alt="ảnh đại diện">';
				echo '<div class="text-end">
					<a type="button" role="button" data-bs-toggle="dropdown" class="text-white me-2 text-decoration-none fs14 dropdown-toggle">Xin chào, <?php echo $_SESSION['auth_user']['name'];?></a>
					<ul class="dropdown-menu fs14">
					<li><a class="dropdown-item" href="index.php?act=account">Thông tin cá nhân</a></li>
					<li><a class="dropdown-item" href="index.php?act=logout">Đăng xuất</a></li>
					</ul>
					</div>';}
               	else 
					echo'<div class="text-end">
					<a href="index.php?act=login" type="button" class="btn btn-outline-light me-2 fs14">Đăng nhập</a>
					</div>';
                ?>      