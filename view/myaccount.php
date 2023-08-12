<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="#" target="__blank">Thông tin cá nhân</a>
        <a class="nav-link" href="#" target="__blank">Thanh toán</a>
        <a class="nav-link" href="#"  target="__blank">Thông báo</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Ảnh đại diện</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <?php 
                        if($_SESSION['auth_user']['image']) echo '<img class="img-account-profile rounded-circle mb-2" src="./static/images/logo/'.$_SESSION['auth_user']['image'].'" alt="ảnh đại diện">';
                        else echo '<img class="img-account-profile rounded-circle mb-2" src="./static/images/logo/blank-profile-picture.png" alt="ảnh đại diện">';
                        // echo '<img class="img-account-profile rounded-circle mb-2" src="./static/images/logo/blank-profile-picture.png" alt="ảnh đại diện">';
                    ?>
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">Ảnh JPG hoặc PNG và không được lớn hơn 5 MB</div>
                    <!-- Profile picture upload button-->
                    <input type="file" id="upload" hidden/>
                    <label class="btn btn-primary label_for_upload fs14" for="upload">Tải ảnh lên</label>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Thông tin chi tiết</div>
                <div class="card-body">
                    <form action="?act=account" method="POST">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Tên tài khoản</label>
                            <?php
                                echo '
                                    <input name="user_name" class="form-control" id="inputUsername" type="text" placeholder="Nhập tên tài khoản" value="'.$_SESSION['auth_user']['name'].'">
                                ';
                            ?>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="inputFullName">Họ và tên</label>
                                <?php
                                    echo '
                                        <input name="full_name" class="form-control" id="inputFullName" type="text" placeholder="Họ tên của bạn" value="'.$_SESSION['auth_user']['full_name'].'">
                                    ';
                                ?>
                            </div>                            
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (location)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="inputLocation">Địa chỉ</label>
                                <?php
                                    echo '
                                        <input name="address" class="form-control" id="inputLocation" type="text" placeholder="Địa chỉ của bạn" value="'.$_SESSION['auth_user']['address'].'">
                                    ';
                                ?>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                            <?php
                                echo '
                                <input class="form-control" disabled id="inputEmailAddress" type="email" placeholder="Địa chỉ email của bạn" value="'.$_SESSION['auth_user']['email'].'">
                                ';
                            ?>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                                <?php
                                    echo '
                                        <input name="phone" class="form-control" id="inputPhone" type="tel" pattern="[0-9]{10}" placeholder="Số điện thoại của bạn" value="'.$_SESSION['auth_user']['phone'].'">
                                    ';
                                ?>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Ngày sinh</label>
                                <?php
                                    echo '
                                        <input name="birthday" class="form-control" id="inputBirthday" type="date" name="birthday" placeholder="Ngày sinh của bạn" value="'.$_SESSION['auth_user']['birthday'].'">
                                    ';
                                ?>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button  class="btn btn-danger fs16" type="reset">Huỷ</button>
                        <button type="submit" name ="save_change" class="btn btn-primary fs16" type="button">Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

