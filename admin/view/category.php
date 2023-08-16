<div class="row g-0 mx-0">
    <div class="col-2">
        <?php include "./view/sidebar.php" ?>
    </div>
    <div class="col-10 p20">
        <h3 class="txt-semiBold fs24">Thêm danh mục mới</h3>
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
                        <td width="15%">
                            <input type="text" name="category" placeholder="Nhập tên danh mục" style="padding: 0.4rem;"  require>
                        </td>
                        <td>
                            <button class="btn btn-primary fs14 plr20" name="add">Thêm</button>
                        </td>
                    </tr>
                </form>
                    <tr>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>Thêm danh mục thành công!</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </tr>
            </tbody>
        </table>

        <h3 class="txt-semiBold mt45">Danh sách danh mục</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $category = getAll("category", connectdb());
                    foreach ($category as $category) {
                        echo '
                            <tr>
                                <th scope="row">'.$category['category_id'].'</th>
                                <td>'.$category['category_name'].'</td>
                                <td scope="col" style="width: 9rem;">
                                    <button class="btn btn-success fs14" 
                                    type="button" data-bs-toggle="modal" 
                                    data-bs-target="#modal'.$category['category_id'].'">Sửa</button>    
                                </td>
                                <td scope="col" style="width: 9.5rem;">
                                    <button class="btn btn-danger fs14"
                                    type="button" data-bs-toggle="modal" 
                                    data-bs-target="#del'.$category['category_id'].'">Xoá</button>    
                                </td>
                            </tr>

                            <div class="modal fade" id="modal'.$category['category_id'].'" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs26" id="modal'.$category['category_id'].'Label">Cập nhật</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form method="POST" action="index.php?act=category">
                                            <div>
                                                <label for="category_id">Mã danh mục</label>
                                                <input class="form-control grey02 grey_txt cursor-disabled" value="'.$category['category_id'].'" id="category_id" name="category_id" readonly/>
                                            </div>
                                            <div>
                                                <label for="category_name">Tên danh mục</label>
                                                <input class="form-control" value="'.$category['category_name'].'" id="category_name" name="category_name"></input>
                                            </div>
                                            <div class="mt10 text-end">
                                                <button type="button" class="btn btn-secondary fs14" data-bs-dismiss="modal">Huỷ</button>
                                                <button type="submit" class="btn btn-primary fs14" name="btn-edit-category">Cập nhật</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal" id="del'.$category['category_id'].'" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="index.php?act=category">
                                            <input class="form-control  grey02 grey_txt cursor-disabled" value="'.$category['category_id'].'" id="category_id" name="category_id" type="hidden"/>

                                            <p>Bạn có chắc chắn muốn xoá danh mục '.$category['category_name'].' với ID: '.$category['category_id'].' .</p>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-secondary fs14" data-bs-dismiss="modal">Huỷ</button>
                                                <button type="submit" class="btn btn-primary fs14" name="del-category">Đồng ý</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</div>