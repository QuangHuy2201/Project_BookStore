<div class="row g-0 mx-0">
    <div class="col-2">
        <?php include "./view/sidebar.php" ?>
    </div>
    <div class="col-10 p20">
        <h3 class="txt-semiBold">Thêm sản phẩm</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Thêm</th>
                </tr>
            </thead>
            <tbody>
                <form method="post">
                    <tr>
                        <td>
                            <input type="text" name="email" placeholder="Email" require>
                        </td>
                        <td>
                            <input type="password" name="password" placeholder="Password" require>
                        </td>
                        <td>
                            <select name="rold" id="rold">
                                <option value="1">Quản trị viên</option>
                                <option value="2" selected="selected">Thành viên</option>
                            </select>
                        </td>
                        </td>
                        <td>
                            <button class="btn btn-primary fs14" name="add">Thêm</button>
                        </td>
                    </tr>
                </form>
                    <tr>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>Thêm người dùng thành công!</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </tr>
            </tbody>
        </table>

        <h3 class="txt-semiBold mt45">Danh sách thành viên</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $user = getAllUser("user", connectdb());
                    $count = 0;
                    foreach ($user as $user) {
                        $count++;
                        echo '
                            <tr>
                                <th scope="row">'.$count.'</th>
                                <td>'.$user['full_name'].'</td>
                                <td>'.$user['email'].'</td>
                                <td>'.$user['phone'].'</td>
                                <td>
                                    <a class="btn btn-success fs14" data-bs-toggle="dropdown" href="collapseEdit"  role="button" aria-expanded="false" aria-controls="collapseExample">Sửa</a>    
                                </td>
                                <td>
                                    <button class="btn btn-danger fs14">Xoá</button>    
                                </td>
                            </tr>
                        ';
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</div>