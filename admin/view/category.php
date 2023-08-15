<div class="row g-0 mx-0">
    <div class="col-2">
        <?php include "./view/sidebar.php"?>
    </div>
    <div class="col-10 p20">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Tuỳ chọn</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form action="POST">
                        <th scope="row">1</th>
                        <td>
                            <input type="text" class="form-control" value="Truyện kiếm hiệp">
                        </td>
                        <td>
                            <button class="btn btn-danger fs14">Xoá</button>
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="POST">
                        <th scope="row">2</th>
                        <td>
                            <input type="text" class="form-control text-black" placeholder="Thêm danh mục sản phẩm" value="">
                        </td>
                        <td>
                            <button class="btn btn-primary fs14">Thêm</button>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>

    </div>
</div>