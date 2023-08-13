<div class="container">
    <div class="row g-5 mt20 fs14">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="txt-blue txt-medium fs18">Lựa chọn của bạn</span>
                <span class="badge bg-blue rounded-pill">3</span>
            </h4>
            <ul class="list-group mb-3 fs16">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div class="p10">
                        <p class="mb-0">Brief description</p>
                    </div>
                    <span class="text-body-secondary">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div class="p10">
                        <p class="mb-0">Brief description</p>
                    </div>
                    <span class="text-body-secondary">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p10">
                    <span class="txt-medium ms-3">Tổng cộng</span>
                    <p class="txt-semiBold mb-0">$20</p>
                </li>
            </ul>
        </div>
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3 fs18 txt-medium txt-blue">Địa chỉ nhận hàng</h4>
            <form class="needs-validation" novalidate>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="lastName" class="form-label txt-medium">Họ tên</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $_SESSION['auth_user']['full_name'] ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label txt-medium">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="<?php echo $_SESSION['auth_user']['email'] ?>" require>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label txt-medium">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" placeholder="<?php echo $_SESSION['auth_user']['address'] ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="phone-number" class="form-label txt-medium">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone-number" placeholder="<?php echo $_SESSION['auth_user']['phone'] ?>" required>
                    </div>

                </div>

                <hr class="my-4">

                <h4 class="mb-3 txt-medium">Phương thức thanh toán</h4>

                <div class="my-3">
                    <div class="form-check">
                        <input id="cod" name="paymentMethod" type="radio" class="form-check-input" checked required>
                        <label class="form-check-label" for="cod">Thanh toán khi nhận hàng</label>
                    </div>
                    <div class="form-check">
                        <input id="momo" name="paymentMethod" type="radio" class="form-check-input" checked required>
                        <label class="form-check-label" for="momo">Ví điện tử Momo</label>
                    </div>
                    <div class="form-check">
                        <input id="vnpay" name="paymentMethod" type="radio" class="form-check-input" checked required>
                        <label class="form-check-label" for="vnpay">Ví điện tử Vnpay</label>
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn text-white btn-bg btn-lg fs16" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Đồng ý</button>
                
                <div class="modal-wrapper">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h3>Cám ơn bạn đã đặt hàng</h3>
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-primary txt-white fs16" id="continue">Tiếp tục mua sắm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let continueBtn = document.getElementById('continue');
    continueBtn.onclick = () => {
        window.location.href = "index.php"
    }
</script>