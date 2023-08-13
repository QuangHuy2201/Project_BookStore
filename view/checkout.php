<div class="container">
    <div class="row g-5 mt20 fs14">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary txt-medium fs18">Lựa chọn của bạn</span>
                <span class="badge bg-primary rounded-pill">3</span>
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
            <h4 class="mb-3 fs18 txt-medium text-primary">Địa chỉ nhận hàng</h4>
            <form class="needs-validation" novalidate>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="lastName" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="">
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" placeholder="" required>
                    </div>
                    <div class="col-12">
                        <label for="phone-number" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone-number" placeholder="" required>
                    </div>

                </div>

                <hr class="my-4">

                <h4 class="mb-3">Phương thức thanh toán</h4>

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

                <button class="w-100 btn text-white btn-bg btn-lg fs16" type="submit">Đồng ý</button>
            </form>
        </div>
    </div>
</div>